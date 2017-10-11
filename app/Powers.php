<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Powers extends Model
{
    public function medicines()
    {
        return $this->belongsTo(Medicines::class);
    }
}
