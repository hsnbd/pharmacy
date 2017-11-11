<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Categories','categories_id','id');
    }

    public function medicines()
    {
        // NOTE: In Future You should define sub category id as sub_categories_id
        return $this->hasMany('App\Medicines', 'sub_categoriesid');
    }
}
