<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categories;
use App\Sub_categories;
use App\Medicines;
class BaseController extends Controller
{
    public function index()
    {
    	return view('index');
    }
    //medicine List By category
    public function medByCat($cat, $sub_cat)
    {
        $Vcat = Categories::with('subCategories')->where('url_slug', $cat)->get();
        $scname = Sub_categories::where('url_slug', $sub_cat)->select("id", "name")->get();
        foreach ($scname as $scname) {
            $sid = $scname->id;
            $scname = $scname->name;
        }
        $medList = Medicines::where('sub_categoriesid', $sid)->paginate(4);
        // dd($medList);
    	return view('medByCat', compact('Vcat', 'medList','scname'));
    }
    //view medicine for all users maybe
    public function medShow($id, $name)
    {
        $sMed = Medicines::where('id', $id)->first();
    	return view('medSingle')->with('sMed', $sMed);
    }
    //whole saler medicine is stored ot retailer medicine table
    public function moveToStock(Request $request)
    {
        $ids = $request->ids;
        $qty = $request->qty;

        for($i=0; $i<count($ids); $i++){
          if($qty[$i] > 0){
            $data = array(
                "medicinesid"=>$ids[$i],
                "retail_marketersid" => 1,
                "quantity" => $qty[$i]
            );

            Stock_medicines::create($data)->id;
          }
        }

        return redirect("/wholesale/medicine")->with("msg", "Buy Successful");
    }



}
