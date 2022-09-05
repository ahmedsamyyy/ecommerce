<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(20);
        return view('dashboard.products.general.index', compact('product'));
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $brand = Brand::all();
        $category = Category::all();
        $tags = Tag::all();
        return view('dashboard.products.general.edit', compact('product', 'brand', 'category', 'tags'));
    }
    public function store(Request $request)
    {
        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'slug' => $request->slug,
            'brand_id' => $request->brand_id,
        ]);
        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);
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
        $brand = Brand::get();
        $tags = Tag::get();
        $category = Category::active()->get();
        return view('dashboard.products.general.create', compact('brand', 'tags', 'category'));
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
    public function createphoto($id)
    {
        return view('dashboard.products.image.create',compact('id'));
    }
    public function updatephoto(Request $request)
    {

        if($request->hasFile('photo')){
            foreach( $request->file('photo') as $photo) {

            $photo_name=$photo->getClientOriginalName();
            $path_file=public_path('product_images');
            $photo->move($path_file,$photo_name);
            Image::create([
                'product_id'=>$request->id,
                'photo'=>$photo_name,

            ]);
            }


        }


    }
    public function images($id){
        $product=Product::find($id);
        return view('front.productImageDetails',compact('product'));


    }
    public function productdetailstwo($id){
        $product=Product::find($id);
        return view('front.productdetailstwo',compact('product'));


    }

    public function productall(){
       $product=Product::all();
       return view('dashboard.products.general.index', compact('product'));

    }

}
