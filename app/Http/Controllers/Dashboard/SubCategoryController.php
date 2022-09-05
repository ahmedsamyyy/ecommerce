<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){

        $cat=Category::child()->paginate(15);
        return view('dashboard.subcategory.index',compact('cat'));
    }
    public function edit($id){
        $father=Category::parent()->get();
        $category=Category::find($id);
        return view('dashboard.subcategory.edit',compact('category','father'));

    }
    public function store(StoreCategoryRequest $request){
        $category=Category::create($request->all());
        return redirect()->route('indexsubcategory')->with(['success'=>'تمت الاضافة بنجاح']);

    }
    public function update(UpdateCategoryRequest $request, $id){
        if(!$request->has('is_active'))
        $request->request->add(['is_active'=>0]);
        else
        $request->request->add(['is_active'=>1]);
    $category=Category::find($id);
    $category->update($request->all());
    return redirect()->back();


    }
    public function destroy($id){
    $category=Category::find($id);
    $category->delete();
    return redirect()->route('indexcategory');
    }
    public function create(){
        $cat=Category::parent()->paginate(10);
        return view('dashboard.subcategory.create',compact('cat'));

    }
}
