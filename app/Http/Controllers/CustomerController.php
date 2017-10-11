<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;

class CustomerController extends Controller
{
    public function view()
    {
    	$allMed = DB::table('stock_medicines as stmed')
    				->select('med.name as medname','rm.name as rmname', 'stmed.id','stmed.price', 'stmed.discount', 'stmed.least_order' )
    				->join('medicines as med', 'med.id', '=', 'stmed.medicinesid')
    				->join('retail_marketers as rm', 'rm.id', '=', 'stmed.retail_marketersid')
    				->get();
    	return view('backend.medicine_list')->with('allMed', $allMed);
    }

    public function watchList($value='')
    {

    }

    public function show($id)
    {
        $med = DB::table('stock_medicines as stmed')
                    ->select('med.name as name', 'stmed.id','stmed.price', 'stmed.discount', 'stmed.least_order' )
                    ->join('medicines as med', 'med.id', '=', 'stmed.medicinesid')
                    ->where('stmed.id', $id)
                    ->get();

        foreach ($med as $medicine) {
            $medicine->name;
        }

        $stock = DB::table('stock_medicines as stmed')
                    ->select('rm.name as rmname', 'rm.id', 'rm.address as rmaddress', 'stmed.id' )
                    ->join('medicines as med', 'med.id', '=', 'stmed.medicinesid')
                    ->join('retail_marketers as rm', 'rm.id', '=', 'stmed.retail_marketersid')
                    ->where('med.name', $medicine->name)
                    ->get();
        // dd($med, $stock);
        return view('medicine_details')->with('med', $med)->with('stock', $stock);
    }
}
