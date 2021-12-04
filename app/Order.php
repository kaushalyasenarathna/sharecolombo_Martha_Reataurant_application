<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'main_dish',
        'side_dish',
        'desert',
        'tot',
        'date'

          ];
          protected $table='order';
}
