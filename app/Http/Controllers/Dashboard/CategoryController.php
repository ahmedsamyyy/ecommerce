<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $cat=Category::Parent()->paginate(30);
        return view('dashboard.category.index',compact('cat'));
    }
    public function edit($id){
        $category=Category::find($id);
        return view('dashboard.category.edit',compact('category'));

    }
    public function store(StoreCategoryRequest $request){
        $category=Category::create($request->all());
        return redirect()->route('indexcategory');

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
        return view('dashboard.category.create');

    }
}
