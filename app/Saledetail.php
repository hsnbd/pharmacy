<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saledetail extends Model
{
    protected $table = 'saledetails';
    protected $fillable = ['medicinesid', 'quantity', 'discount', 'shippingid',	'date',	'done'];
}
