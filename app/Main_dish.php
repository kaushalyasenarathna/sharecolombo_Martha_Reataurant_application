<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main_dish extends Model
{
    protected $fillable = [
    'main_dish',
    'price',

      ];
      protected $table='main_dishes';
}
