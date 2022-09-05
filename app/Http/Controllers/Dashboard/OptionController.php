<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        $options = Option::with('Attributes','products')->paginate(20);
        return view('dashboard.options.index',compact('options'));
    }
    public function edit($id)
    {
        $options = Option::find($id);
        return view('dashboard.options.edit',compact('options'));
    }
    public function store(Request $request)
    {
        $options = Option::create([
            'name' => $request->name,
            'price' => $request->price,
            'product_id' => $request->product_id,
            'attribute_id' => $request->attribute_id,
        ]);
    }
    public function update(ProductRequest $request, $id)
    {
        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);
        $product = Product::find($id);
        $product->update($request->all());
        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);
        return redirect()->route('indexgeneral.products')->with(['success' => 'تمت الإضافة بنجاح']);
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('indexgeneral.products')->with(['success' => 'تم الحذف بنجاح']);
    }
    public function create()
    {
        $product = Product::get();
        $atrribute = Attribute::get();
        return view('dashboard.options.create',compact('product','atrribute'));
    }
    public function createprice($id)
    {
        return view('dashboard.products.price.create', compact('id'));
    }
    public function updateprice(Request $request)
    {
        Product::where('id', $request->id)->update($request->only([
            'price',
            'special_price',
            'special_price_type	',
            'special_price_start	',
            'special_price_end',

        ]));
    }
    public function createstock($id)
    {
        return view('dashboard.products.stock.create', compact('id'));
    }
    public function updatestock(Request $request)
    {
        Product::where('id', $request->id)->update($request->only([
            'sku',
            'manage_stock',
            'qty',
            'in_stock',

        ]));
        return redirect()->back();
    }

}
