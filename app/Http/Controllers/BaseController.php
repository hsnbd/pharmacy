<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categories;
use App\Sub_categories;
use App\Medicines;
use App\Rating;
use App\Comment;


class BaseController extends Controller
{
    //Home View
    public function index()
    {
    	return view('index');
    }
    //view medicine for all users maybe
    public function medShow($id, $name)
    {
        $watchlist = null;
        $rating = round(Rating::where('medicinesid', $id)->avg("rating")) ?? null;
        $comments = DB::table('comments as c')->where('medicinesid', $id)
                        ->select('c.*', 'u.name as uname')
                        ->join('users as u', 'u.id', '=', 'c.usersid')
                        ->get() ?? null;

        if (\Auth::check()) {
            $watchlist = DB::table("watch_lists")->where(['medicinesid' => $id, 'usersid' => \Auth::id()])->first();
        }
        $sMed = Medicines::find($id);
    	return view('medSingle', compact('sMed', 'watchlist', 'rating', 'comments'));
    }

    //medicine List By category
    public function medByCat($cat, $sub_cat)
    {
        $scat = Sub_categories::where('url_slug', $sub_cat)->first();
        $scatAll = Sub_categories::where('categories_id', $scat->category->id)->get();
        $sid = $scat->id;
        if (request()->exists('q')) {
            $q = request()->get('q');
            $medList = Medicines::where('sub_categoriesid', $sid)->where('name', 'like', ''. $q . '%')->paginate(4);
        }else {
            $medList = Medicines::where('sub_categoriesid', $sid)->paginate(4);
        }
        return view('medByCat', compact('scat', 'medList', 'scatAll'));
    }
    //live search
    public function liveSearch(Request $request)
    {
        $search = $request->search ?? null;
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
}
