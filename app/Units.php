<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    public function medicines()
    {
        return $this->hasMany('App\Medicines', 'unitsid');
    }
}
