<?php

use App\Side_dish as AppSide_dish;
use Illuminate\Database\Seeder;

class side_dish extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppSide_dish::truncate();

        $side =  [
        [
          'side_dish' => 'Watalappam',
          'price' => '40',

        ],
        [
            'side_dish' => 'Jelly',
            'price' => '20',
        ],
        [
            'side_dish' => 'Pudding',
            'price' => '25',
        ]
      ];

      AppSide_dish::insert($side);
    }
}
