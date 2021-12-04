<?php

use App\Main_dish as AppMain_dish;
use Illuminate\Database\Seeder;

class main_dish extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppMain_dish::truncate();

        $main_dish =  [
        [
          'main_dish' => 'Rice',
          'price' => '100',

        ],
        [
            'main_dish' => 'Rotty',
            'price' => '20',
        ],
        [
            'main_dish' => 'Noodless',
            'price' => '150',
        ]
      ];

      AppMain_dish::insert($main_dish);
    }
}
