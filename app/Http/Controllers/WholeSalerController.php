<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Medicines;

class WholeSalerController extends Controller
{
    public function view()
    {
    	$allMed = DB::table('medicines')->where('companiesid', 1)->get();
    	return view('backend.medicines_view')->with('allMed', $allMed);
    }

    public function new()
    {
    	
    	return view('backend.medicines_new');
    }
    public function store(Request $request)
    {
    	$this->validate($request, [
            "name" => "required|min:2|max:100",
            "description" => "required",
            "price" => "required",
        ]);

    	$data = [
    		'name' => $request->name,
    		'description' => $request->description,
    		'price' => $request->price
    	];
    	
    	Medicines::create($data);
    	return redirect("/ws/medicine/new")->with("msg", "Save Successful");
    }
}
