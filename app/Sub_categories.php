<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
    public function medicines()
    {
        return $this->belongsTo(Medicines::class);
    }
}
