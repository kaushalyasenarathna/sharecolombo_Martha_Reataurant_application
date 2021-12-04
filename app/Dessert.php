<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dessert extends Model
{
    protected $fillable = [

        'desert',
        'price',

          ];
          protected $table='deserts';
}
