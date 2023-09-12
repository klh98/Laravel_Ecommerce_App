<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image'))
        {
            $img_file= $request->file('image');
            $img_file_name= uniqid().'-'.time().'.'.$img_file->getClientOriginalExtension();
            Storage::disk('public')->put('img/' .$img_file_name, file_get_contents($img_file));
        }

        $product = new Product();
        $product->name= $request->name;
        $product->category_id = $request->category_id;
        $product->slug= $request->slug;
        $product->description= $request->desc;
        $product->original_price= $request->original_price;
        $product->selling_price= $request->selling_price;
        $product->qty= $request->qty;
        $product->tax= $request->tax;
        $product->status= $request->status == TRUE ? '1' : '0';
        $product->trending= $request->trending == TRUE ? '1' : '0';
        $product->meta_title= $request->meta_title;
        $product->meta_desc= $request->meta_desc;
        $product->meta_keywords= $request->meta_keywords;
        $product->image= $img_file_name;

        $product->save();

        return redirect('/product')->with('message', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product= Product::findOrFail($id);
        $categories= Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product= Product::findOrFail($id);

        //get old photo
        $img_file_name = $product->image;

        //check if new photo insert or not
        if($request->hasFile('image'))
        {
            Storage::disk('public')->delete('img/' . $product->image); //Delete Old photo

            //Insert new photo
            $img_file= $request->file('image');
            $img_file_name= uniqid().'-'.time().'.'.$img_file->getClientOriginalExtension();
            Storage::disk('public')->put('img/' .$img_file_name, file_get_contents($img_file));
        }

       $product->name= $request->name;
       $product->slug= $request->slug;
       $product->category_id= $request->category_id;
       $product->description= $request->desc;
       $product->original_price= $request->original_price;
       $product->selling_price= $request->selling_price;
       $product->qty= $request->qty;
       $product->tax= $request->tax;
       $product->status= $request->status == TRUE ? '1' : '0';
       $product->trending= $request->trending == TRUE ? '1' : '0';
       $product->meta_title= $request->meta_title;
       $product->meta_keywords= $request->meta_keywords;
       $product->meta_desc= $request->meta_desc;
       $product->image= $img_file_name;

       $product->update();

       return redirect('/product')->with('message', 'Product Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Product was deleted successfully');
    }

}
