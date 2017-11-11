<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Medicines;
use DB;
use Excel;
// use Carbon\Carbon;

class AdminController extends Controller
{
    public function newMed()
    {
        $categories = Categories::with('subCategories')->get();
        $units = DB::table('units')->get();
        $powers = DB::table('powers')->get();
        $generics = DB::table('generics')->get();

        return view('admin/newMedicine', compact('categories', 'units', 'powers', 'generics'));
    }

    public function storeMed(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:5|max:255',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',
            'stock'=>'required|numeric',
            'lorder'=>'required|numeric',
            'scat'=>'required',
            'unit'=>'required',
            'generic'=>'required',
            'power'=>'required',
            'image' => 'mimes:jpeg,jpg|max:5000',
        ]);
        // NOTE: In Future You Should give proper name for easy task to store data like request()->all() not $data array
        $data = array (
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'discount'=> $request->discount,
            'stock'=> $request->stock,
            'least_order'=> $request->lorder,
            'sub_categoriesid'=> $request->scat,
            'unitsid'=> $request->unit,
            'genericsid'=> $request->generic,
            'powersid'=> $request->power,
        );

        $mId = Medicines::create($data)->id;

        \Image::make($request->image)->resize(300, 200)->save("images/product/med-{$mId}.jpg");

        return back()->with("msg", "Medicine Added successfully");
    }

    public function importNew()
    {
        return view("admin/importMedicine");
    }

    // NOTE: Import CSV Medicine List-------------------------
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
                }
            }
        }
        return back()->with("msg", "Medicine List Added successfully");
    }

    public function showMed($id)
    {
        $med = Medicines::find($id);

        return view('admin/medSingle', compact('med'));
    }

    public function deleteMed($id)
    {
        DB::table('medicines')->where('id', $id)->delete();

        if (file_exists(public_path("/images/product/med-{$id}.jpg"))){
            chmod("images/product/med-{$id}.jpg", 0644);
            unlink("images/product/med-{$id}.jpg");
        }

        return  redirect()->route('med.view')->with("msg", "successfully Deleted" );
    }

    public function editMed($id)
    {
        $med = Medicines::where('id', $id)->first();

        $categories = Categories::with('subCategories')->get();
        $units = DB::table('units')->get();
        $powers = DB::table('powers')->get();
        $generics = DB::table('generics')->get();

        return view('admin/editMedicine', compact('med', 'categories', 'units', 'powers', 'generics'));
    }

    public function updateMed(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:5|max:255',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',
            'stock'=>'required|numeric',
            'lorder'=>'required|numeric',
            'scat'=>'required',
            'unit'=>'required',
            'generic'=>'required',
            'power'=>'required',
            'image' => 'mimes:jpeg,jpg|max:5000',
        ]);

        $data = array (
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'discount'=> $request->discount,
            'stock'=> $request->stock,
            'least_order'=> $request->lorder,
            'sub_categoriesid'=> $request->scat,
            'unitsid'=> $request->unit,
            'genericsid'=> $request->generic,
            'powersid'=> $request->power,
        );

        Medicines::find($id)->update($data);

        if ($request->hasFile('image')) {
            if (file_exists(public_path("/images/product/med-{$id}.jpg"))){
                chmod("images/product/med-{$id}.jpg", 0644);
                unlink("images/product/med-{$id}.jpg");
            }
            \Image::make($request->image)->resize(300, 200)->save("images/product/med-{$id}.jpg");
        }

        return redirect(route('med.show', $id))
                ->with("med", Medicines::find($id))
                ->with("msg", "Medicine Updated successfully");
    }
}
