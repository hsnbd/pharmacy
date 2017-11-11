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


    public function subCategory()
    {
        return $this->belongsTo('App\Sub_categories','sub_categoriesid','id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Units','unitsid','id');
    }

    public function generic()
    {
        return $this->belongsTo('App\Generics','genericsid','id');
    }
    
    public function power()
    {
        return $this->belongsTo('App\Powers','powersid','id');
    }

    // NOTE: It Dosen't Need.. Try to Get Using SubCategory Property
    // public function category()
    // {
    //     return \DB::table('categories as cat') ->select('cat.name as cname') ->join('sub_categories as scat', 'scat.categories_id', '=', 'cat.id') ->where('scat.id', $this->sub_categoriesid) ->first()->cname;
    // }
    // NOTE: Be More Smart to Use Eloquent
    // public function power()
    // {
    //     return Powers::where('id', $this->powersid)->first()->name;
    // }
}
