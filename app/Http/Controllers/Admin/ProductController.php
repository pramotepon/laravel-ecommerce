<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);
        return view('admin.product', compact('products'));
    }

    public function addProduct(){
        return view('admin.addProduct');
    }

    public function store(Request $request){
        $request->validate([
            'product_name'  =>  'required|unique:products,name|string',
            'product_img'  =>  'required|image',
            'product_price'  =>  'required|min:0',
            'product_detail'  =>  'required',
        ]);

        $file = $request->file('product_img');
        $ext = $file->extension();
        $fileName = date('dmYHis').'.'.$ext;
        $path = public_path().'/images/products';

        $file->move($path,$fileName);

        $product = new Product();
        $product->name = $request->input('product_name');
        $product->price = $request->input('product_price');
        $product->detail = $request->input('product_detail');
        $product->image = $fileName;

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product create Successfully.');
    }

    public function show(Product $product){
        return view('admin.showProduct', compact('product'));
    }

    public function edit(Product $product){
        return view('admin.editProduct', compact('product'));
    }

    public function update(Request $request, Product $product){
        $request->validate([
            'product_price'  =>  'required|min:0',
            'product_detail'  =>  'required',
        ]);

        if($request->input('product_name') != $product->name){
            $request->validate([
                'product_name'  =>  'required|unique:products,name|string',
            ]);
        }

        if($request->file('product_img')){
            $request->validate([
                'product_img'  =>  'required|image',
            ]);
            $file = $request->file('product_img');
            $ext = $file->extension();
            $fileName = date('dmYHis').'.'.$ext;
            $path = public_path().'/images/products';

            $absolutePath = public_path('images/products/'.$product->image);
            File::delete($absolutePath);

            $file->move($path,$fileName);

            $product->image = $fileName;
        }

        $product->name = $request->input('product_name');
        $product->price = $request->input('product_price');
        $product->detail = $request->input('product_detail');

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product updated Successfully');
    }

    public function destroy(Product $product){
        $absolutePath = public_path('images/products/'.$product->image);
        File::delete($absolutePath);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
