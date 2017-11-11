<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generics extends Model
{
    public function medicines()
    {
        return $this->hasMany('App\Medicines', 'genericsid');
    }
}
