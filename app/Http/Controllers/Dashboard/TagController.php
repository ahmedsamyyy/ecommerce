<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags=Tag::paginate(30);
        return view('dashboard.tags.index',compact('tags'));
    }
    public function edit($id){
        $tags=Tag::find($id);
        return view('dashboard.tags.edit',compact('tags'));

    }
    public function store(TagRequest $request){
        if(!$request->has('is_active'))
        $request->request->add(['is_active'=>0]);
        else
        $request->request->add(['is_active'=>1]);
        $tags=Tag::create($request->all());
        return redirect()->route('index.tags')->with(['success'=>'تمت الإضافة بنجاح']);

    }
    public function update(Request $request, $id){
        if(!$request->has('is_active'))
        $request->request->add(['is_active'=>0]);
        else
        $request->request->add(['is_active'=>1]);
    $tags=Tag::find($id);
    $tags->update($request->all());
    return redirect()->route('index.tags');



    }
    public function destroy($id){
    $tags=Tag::find($id);
    $tags->delete();
    return redirect()->route('index.tags');
    }
    public function create(){
        return view('dashboard.tags.create');

    }
}

