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

    //view medicine for all users maybe
    public function medShow($id, $name)
    {
        $sMed = Medicines::where('id', $id)->first();
    	return view('medSingle')->with('sMed', $sMed);
    }

    //medicine List By category
    public function medByCat($cat, $sub_cat)
    {
        $Vcat = Categories::with('subCategories')->where('url_slug', $cat)->get();
        $scname = Sub_categories::where('url_slug', $sub_cat)->select("id", "name")->get();

        foreach ($scname as $scname) {$sid = $scname->id; $scname = $scname->name;}

        if (request()->exists('q')) {
            $q = request()->get('q');
            $medList = Medicines::where('sub_categoriesid', $sid)->where('name', 'like', ''. $q . '%')->paginate(4);
        }else {
            $medList = Medicines::where('sub_categoriesid', $sid)->paginate(4);
        }

        // dd($medList);
        return view('medByCat', compact('Vcat', 'medList','scname'));
    }

    //Live Search
    public function liveSearch(Request $request)
    {
        ($request->search)? $search = $request->search : $search = 0;
        $pdt = DB::table('medicines')
               ->where('name', 'like', '%'.$search.'%')
               ->take(10)
               ->get();

        $html = "";
        foreach ($pdt as $pdt) {
        $html .= "<li class='rItem'>{$pdt->name}</li>";
        }

        echo $html;
    }

    //Search Results
    public function searchResult(Request $request)
    {
        if(!$request->s){
            return redirect()->back();
        }
        $s = $request->s;

        $sResults = DB::table('medicines')
                   ->where("name", "like", "%{$s}%")
                   ->paginate(10)
                   ->setPath(route('search'))
                   ->appends('s', $s);

        return view("search", compact("sResults"));
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
