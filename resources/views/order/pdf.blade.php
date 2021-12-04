<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 </head>
 <body style=" border-top: 1px solid #000;border-bottom: 1px solid rgb(63, 54, 117); padding: 3px 0px 3px 0px; font-color:black;font-family: Arial, Helvetica, sans-serif; " >
    <h1 class="brand-text  ">

        <p align="center"><b>  Date Vise Summary Report Martha Restuarant</b> </p>
         <table>
            <thead>
                <th style="font-size:10px;font-weight:bold;">

                    Date : {{ $date }}

                 </th>
             </thead>
        </table>
        <hr style="border: 1px solid black; ">
         <table class="table" style="align-content: center; width:100% ;text-align:center;">
            <thead>
                <tr style="font-size:12px">
                    <th  style="width:50%"><b>ID</b></th>
                    <th  style="width:50%"> <b>Main Dish</b></th>
                    <th  style="width:50%"><b>Side Dish</b></th>
                    <th  style="width:50%"><b>Dessert</b></th>
                    <th  style="width:50%"><b>Order price</b></th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>

                @foreach ($data as $order)
                   <tr style="font-size:12px" scope="row">
                       <?php $i++ ?>
                       <td style="width:50%">{{ $i }}</td>
                        <td style="width:50%">{{ $order->main_dish }}</td>
                        <td style="width:50%">{{ $order->side_dish }}</td>
                        <td style="width:50%">{{ $order->desert }}</td>
                        <td style="width:50%">{{number_format( $order->tot,2) }}</td>
                     </tr>

                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="font-size:12px">TOTAL PRICE</td>
                    <td style="font-size:12px"><b>{{number_format( $total,2) }}</b></td>
                </tr>
            </tbody>
        </table>

 </body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </html>
