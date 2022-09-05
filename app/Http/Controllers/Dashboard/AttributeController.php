<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(){
        $attribute= Attribute::paginate(15);
        return view('dashboard.attribute.index',compact('attribute'));
    }
    public function edit($id){
        $attribute=Attribute::find($id);
        return view('dashboard.attribute.edit',compact('attribute'));

    }
    public function store(Request $request){
        $attribute=Attribute::create($request->all());
        return redirect()->route('index.attribute');

    }
    public function update(Request $request, $id){
    $attribute=Attribute::find($id);
    $attribute->update($request->all());
    return redirect()->route('index.attribute');
    }
    public function destroy($id){
    $attribute=Attribute::find($id);
    $attribute->delete();
    return redirect()->route('index.attribute');
    }
    public function create(){
        return view('dashboard.attribute.create');

    }
}

