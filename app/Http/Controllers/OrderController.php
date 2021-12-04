<?php

namespace App\Http\Controllers;

use App\Dessert;
use App\Main_dish;
use App\Order;
use App\Side_dish;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;


class OrderController extends Controller
{
 public function order(){
    $side_dish = Side_dish::get();
    $main_dish = Main_dish::get();
    $dessert = Dessert::get();
    $order=Order::select
    (
        'order.id',
        'order.main_dish',
        'order.side_dish',
        'main_dishes.main_dish as main_dish',
        'side_dishes.side_dish as side_dish',
        'deserts.desert as desert'
    )
    ->join('main_dishes','main_dishes.id','=','order.main_dish')
    ->join('side_dishes','side_dishes.id','=','order.side_dish')
    ->join('deserts','deserts.id','=','order.desert')

        ->get();


    return view('order.index',compact('side_dish','main_dish','dessert','order'));
 }
 public function add_order(){
    $side_dish = Side_dish::get();
    $main_dish = Main_dish::get();
    $dessert = Dessert::get();


    return view('order.add_order',compact('side_dish','main_dish','dessert'));




 }
 public function order_form(Request $request){
    $now = Carbon::now()->toDateString();

    //Total price calculation  types of selected foods
    $main_dish_price=$request->main_dish_price;
    $side_dish_price=$request->side_dish_price;
    $desert_price=$request->desert_price;
    $tot=($main_dish_price+$side_dish_price+$desert_price);
    $data['main_dish'] = $request->main_dish;
    $data['side_dish'] = $request->side_dish ;
    $data['desert'] = $request->desert ;
    $data['date'] = $now ;
    $data['tot']=$tot;
    order::create($data);
    return back();

 }
 public function revenue(){

    $data = Order::select(
        'order.id',
        'order.main_dish',
        'order.side_dish',
        'order.tot',
        'main_dishes.main_dish as main_dish',
        'side_dishes.side_dish as side_dishes',
        'deserts.desert as desert'
    )
    ->join('main_dishes','main_dishes.id','=','order.main_dish')
    ->join('side_dishes','side_dishes.id','=','order.side_dish')
    ->join('deserts','deserts.id','=','order.desert')
    ->get();
     $order=Order::select('date')->selectRaw('sum(order.tot) as tot')
     ->groupBy('date')
     ->get();

    $main = DB::table('order')
    ->select('main_dish', DB::raw('count(main_dish) as main'))
    ->groupBy('main_dish')
    ->get();
    $max_main_dish=$main[0];
     $side = DB::table('order')
     ->select('side_dish', DB::raw('count(side_dish) as side'))
     ->groupBy('side_dish')
     ->get();
     $max_side_dish=$side[0];


     $dessert=Order::select('desert')->selectRaw('count(order.desert) as desserts')
     ->groupBy('desert')
     ->orderby('desserts','desc')
     ->get();



    return view('order.revenue' ,compact('order','main','data','max_main_dish','max_side_dish','side'));
 }
 public function main_dish_price($id){
    $main_dish =  Main_dish::select
    (
    'main_dishes.id',
    'main_dishes.price',
    )
    -> where('main_dishes.id','=',$id )
    ->get();

    return response()->json($main_dish);
 }

 public function side_dish_price($id){
    $side_dish =  Side_dish::select
    (
    'side_dishes.id',
    'side_dishes.price',
    )
    -> where('side_dishes.id','=',$id )
    ->get();

    return response()->json($side_dish);
 }

 public function desert_price($id){
    $dessert =  Dessert::select
    (
    'deserts.id',
    'deserts.price',
    )
    -> where('deserts.id','=',$id )
    ->get();

    return response()->json($dessert);
 }
 public function pdf(Request $request){
$total=$request->tot;
$date=$request->date;
    $data = Order::select(
        'order.id',
        'order.main_dish',
        'order.side_dish',
        'order.tot',
        'main_dishes.main_dish as main_dish',
        'side_dishes.side_dish as side_dish',
        'deserts.desert as desert'
    )
    ->join('main_dishes','main_dishes.id','=','order.main_dish')
    ->join('side_dishes','side_dishes.id','=','order.side_dish')
    ->join('deserts','deserts.id','=','order.desert')
   ->where('order.date','=',$request->date)


   ->get();
    view()->share('data',$data);
    $pdf = PDF::loadView('order.pdf',$data,compact('date','total'));
    $pdf->setPaper('A4' );
    // download PDF file with download method
    return $pdf->download('date_vise_report.pdf');

 }

}
