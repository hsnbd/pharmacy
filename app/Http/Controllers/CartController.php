<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Saledetail;
class CartController extends Controller
{
    public function view()
    {
        return view("medCart");
    }

    public function checkout()
    {
        return view("checkout");
    }
    //addFullCart
    public function addFullCart(Request $request)
    {
        if ($request->aid == 0) {
            $this->validate($request, [
                'name'=>'required|min:4|max:20',
                'address'=>'required|min:5|max:100',
                'contact'=>'required|min:8|max:17'
            ]);
            $shippingId = DB::table("shipping")->insertGetId([
                'name' => $request->name,
                'address' => $request->address,
                'contact' => $request->contact,
                'usersid' => \Auth::id()
            ]);

        } else { $shippingId = $request->aid; }

        $ids = $request->ids;
        $qtys = $request->qtys;
        foreach ($ids as $key => $id) {
            $results[] = Saledetail::create([
                "medicinesid" => $id,
                "quantity" => $qtys[$key],
                "discount" => 0,
                "date" => \Carbon\Carbon::now(),
                "done" => 0,
                "shippingid" => $shippingId
            ])->id;
        }
        return (count($ids) == count($results))? "true": "false";
    }
    //getAddress
    public function getAddress(Request $request)
    {
        $address = DB::table("shipping")->where('usersid', \Auth::id())->get();
        $rs = "";
        foreach ($address as $ad) {
            $rs .= "<li data-id='{$ad->id}' class='list-inline-item'>
                    <b>Name:</b> {$ad->name} <br /> <b>Address:</b> {$ad->address}  <br />
                    <b>Contact:</b> {$ad->contact}</li>";
        }
        return $rs;
    }
    //congratulation
    public function congratulation()
    {
        return view('congratulation');
    }
}
