<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class CoffeeBrand extends Model
{

    protected $table = 'coffee_brands';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image','path'
    ];


}
