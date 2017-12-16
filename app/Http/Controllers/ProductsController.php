<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Rating;
use App\Comment;

class ProductsController extends Controller
{
    public function addWatchList(Request $request)
    {
        $id = $request->id;
        if(!(int)$id){
            $jdata['msg'] = "Please Try Again";
            return response()->json($jdata);
        }
        if (!\Auth::check()) {
            $jdata['msg'] = 'Please SignIn Before Add Watch List';
            $jdata['auth'] = false;
            return response()->json($jdata);
        }
        $old = DB::table("watch_lists")->where(['medicinesid' => $id, 'usersid' => \Auth::id()])->first();
        if ($old) {
            $jdata['msg'] = "Already Added!!";
            return response()->json($jdata);
        }
        $res = DB::table("watch_lists")->insert([
            'usersid' => \Auth::id(),
            'medicinesid' => $request->id,
        ]);
        if (!$res) {
            $jdata['msg'] = "Please Try Again";
            return response()->json($jdata);
        }
        $jdata['msg'] = "Item Added To Watch List";
        $jdata['status'] = true;
        return response()->json($jdata);
    }

    public function addRating(Request $request)
    {
        $id = $request->id;
        $rating = $request->rating;
        if(!(int)$id || !(int)$rating){
            $jdata['msg'] = "Please Try Again";
            return response()->json($jdata);
        }
        if (!\Auth::check()) {
            $jdata['msg'] = 'Please SignIn Before Rating';
            $jdata['auth'] = false;
            return response()->json($jdata);
        }
        $old = Rating::where(['usersid' => \Auth::id(), 'medicinesid' => $id])->first();
        if ($old) {
            if ($old->rating != $rating) {
                $res = Rating::whereId($old->id)->update([
                    'rating' => $rating
                ]);
            }
            $jdata['msg'] = "Thanks For Rating!";
            return response()->json($jdata);
        }
        $res = Rating::create([
            'usersid' => \Auth::id(),
            'medicinesid' => $id,
            'rating' => $rating
        ]);
        if (!$res) {
            $jdata['msg'] = "Please Try Again";
            return response()->json($jdata);
        }
        $jdata['msg'] = "Thanks For Rating!";
        return response()->json($jdata);
    }
    public function storeComment(Request $request)
    {
        if (!\Auth::check()) {
            return redirect()->back()->with('msg', 'Please Log In  for comment');
        }
        $this->validate($request,
        [
          "comment" => "required"
        ]);
        $res = Comment::create([
            'usersid' => \Auth::id(),
            'medicinesid' => $request->id,
            'comment' => $request->comment
        ]);
        return redirect()->back();
   }
}
