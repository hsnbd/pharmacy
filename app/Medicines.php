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


    public function subCategories()
    {
        return $this->hasMany(Sub_categories::class);
    }
    public function units()
    {
        return $this->hasMany(Units::class);
    }
    public function generics()
    {
        return $this->hasMany(Generics::class);
    }
    public function powers()
    {
        return $this->hasMany(Powers::class);
    }
}
