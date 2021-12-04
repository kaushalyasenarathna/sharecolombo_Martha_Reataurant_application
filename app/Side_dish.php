<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Side_dish extends Model
{
    protected $fillable = [
        'side_dish',
        'price',

          ];
          protected $table='side_dishes';
}
