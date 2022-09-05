<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands=Brand::paginate(30);
        return view('dashboard.brand.index',compact('brands'));
    }
    public function edit($id){
        $brands=Brand::find($id);
        return view('dashboard.brand.edit',compact('brands'));

    }
    public function store(Request $request){
        #####################how to upload photo#################################################
        if($request->hasFile('photo')){
            $photo=$request->file('photo');
            $photo_name=$photo->getClientOriginalName();
            $path_file=public_path('brands_images');
            $photo->move($path_file,$photo_name);
        }
        if(!$request->has('is_active'))
        $request->request->add(['is_active'=>0]);
        else
        $request->request->add(['is_active'=>1]);
        $brands=Brand::create($request->all());
        $brands->photo=$photo_name;
        $brands->save();
        return redirect()->route('index.brands');

    }
    public function update(Request $request, $id){
        if($request->hasFile('photo')){
            $photo=$request->file('photo');
            $photo_name=$photo->getClientOriginalName();
            $path_file=public_path('brands_images');
            $photo->move($path_file,$photo_name);
        }
        if(!$request->has('is_active'))
        $request->request->add(['is_active'=>0]);
        else
        $request->request->add(['is_active'=>1]);
    $brands=Brand::find($id);
    $brands->update($request->all());
    $brands->photo=$photo_name;
    $brands->save();
    return redirect()->route('index.brands');
    


    }
    public function destroy($id){
    $brands=Brand::find($id);
    $brands->delete();
    return redirect()->route('indexcategory');
    }
    public function create(){
        return view('dashboard.brand.create');

    }
}
