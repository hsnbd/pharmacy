<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Medicines
 *
 * @mixin \Eloquent
 */
class Medicines extends Model
{
    protected $table = 'medicines';
    protected $fillable = ['name', 'description', 'price', 'sub_categoriesid', 'unitsid', 'genericsid', 'powersid', 'discount', 'stock', 'least_order'];

}
