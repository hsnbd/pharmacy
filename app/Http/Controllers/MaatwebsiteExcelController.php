<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicines;
use DB;
use Excel;

class MaatwebsiteExcelController extends Controller
{
    public function medNew()
    {
        return view('medNew');
    }
    public function importExcel(Request $request)
    {
        if(!empty($request->medicinesExcel)){
			$path = $request->medicinesExcel->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();

			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = [
                                    'name' => $value->name,
                                    'description' => $value->description,
                                    'price' => $value->price,
                                    'sub_categoriesid' => $value->sub_categoriesid,
                                    'unitsid' => $value->unitsid,
                                    'genericsid' => $value->genericsid,
                                    'powersid' => $value->powersid,
                                    'discount' => $value->discount,
                                    'stock' => $value->stock,
                                    'least_order' => $value->least_order,
                                ];
				}
				if(!empty($insert)){
					DB::table('medicines')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
    }
}
