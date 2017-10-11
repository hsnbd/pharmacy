<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Companies;

class CompaniesController extends Controller
{
    public function view()
    {
    	$allCmp = DB::table('companies')->get();
    	return view('backend.all_company')->with('allCmp', $allCmp);
    }

    public function show($id)
    {
    	$cmp = DB::table('companies')->where('id', $id)->get();

    	$allMed = DB::table('medicines')
    				->where('companiesid', $id)
    				->get();
    	return view('backend.company_med')->with('cmp', $cmp)->with('allMed', $allMed);
    }
}
