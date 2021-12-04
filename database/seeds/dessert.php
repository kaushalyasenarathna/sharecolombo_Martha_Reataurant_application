<?php

use App\Dessert as AppDessert;
use Illuminate\Database\Seeder;


class dessert extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppDessert::truncate();

            $desert =  [
            [
              'desert' => 'Wadai',
              'price' => '45',

            ],
            [
                'desert' => 'Dhal Curry',
                'price' => '75',
            ],
            [
                'desert' => 'Flsh Curry',
                'price' => '120',
            ]
          ];

          AppDessert::insert($desert);

    }
    }
