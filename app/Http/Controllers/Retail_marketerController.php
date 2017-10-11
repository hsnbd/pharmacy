<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Medicines;
use App\Stock_medicines;

class Retail_marketerController extends Controller
{
    public function view()
    {
    	$allMed = DB::table('stock_medicines as stmed')
    				->select('stmed.price', 'stmed.discount', 'stmed.least_order', 'stmed.quantity', 'med.name' )
    				->join('medicines as med', 'med.id', '=', 'stmed.medicinesid')
    				->where('stmed.retail_marketersid', 1)
    				->get();

    	return view('backend.rt_medicines')->with('allMed', $allMed);
    }
}
