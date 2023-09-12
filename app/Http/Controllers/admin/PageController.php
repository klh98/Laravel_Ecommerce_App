<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function home()
    {
        return view('user.home');
    }

    public function categories()
    {
        $categories= Category::all();
        return view('user.category', compact('categories'));
    }

    public function  view_category($slug)
    {
         if(Category::where('slug', $slug)->exists())
         {
             $category = Category::where('slug', $slug)->first();
             $products = Product::where('category_id', $category->id)->get();
             return view('user.product.index', compact('category', 'products'));
         }
         else
         {
             return redirect('/')->with('status', 'Slug does not exists');
         }
    }

    public function product_view($cate_slug, $prod_slug)
    {
         if(Category::where('slug', $cate_slug)->exists())
         {
             if(Product::where('slug', $prod_slug)->exists())
             {
                 $products= Product::where('slug', $prod_slug)->first();
                 return view('user.product.show', compact('products'));
             }
             else

             {
                 return redirect('/')->with('status',' The link was Broken');
             }
         }
         else
         {
             return redirect('/')->with('status', 'No such category found');
         }

         $products= Product::where('slug', $prod_slug)->first();

         return view('user.product.show', compact('reviews'));
    }

    public function product_list_Ajax()
    {
         $products= Product::all();
         $data= [];

         foreach($products as $item)
         {
             $data[] = $item['name'];
         }

         return $data;
    }

    public function search_product(Request $request)
    {
         $search_product= $request->product_name;

         if($search_product != '')
         {
             $product= Product::where('name', 'LIKE', "%$search_product%")->first();
             if($product)
             {
                 return redirect('category/'.$product->category->slug.'/'.$product->slug);
             }
             else
             {
                 return redirect('status', 'No products matched your search');
             }

         }
         else
         {
             return redirect()->back();
         }

    }
}
