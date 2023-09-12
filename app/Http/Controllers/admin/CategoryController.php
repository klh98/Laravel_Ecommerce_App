<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
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

        $category = new Category();
        $category->name= $request->name;
        $category->slug= $request->slug;
        $category->description= $request->desc;
        $category->status= $request->status == TRUE ? '1' : '0';
        $category->popular= $request->popular == TRUE ? '1' : '0';
        $category->meta_title= $request->meta_title;
        $category->meta_desc= $request->meta_desc;
        $category->meta_keywords= $request->meta_keywords;
        $category->image= $img_file_name;

        $category->save();

        return redirect('/category')->with('message', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category= Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category= Category::findOrFail($id);

         //get old photo
         $img_file_name = $category->image;

         //check if new photo insert or not
         if($request->hasFile('image'))
         {
             Storage::disk('public')->delete('img/' . $category->image); //Delete Old photo

             //Insert new photo
             $img_file= $request->file('image');
             $img_file_name= uniqid().'-'.time().'.'.$img_file->getClientOriginalExtension();
             Storage::disk('public')->put('img/' .$img_file_name, file_get_contents($img_file));
         }

        $category->name= $request->name;
        $category->slug= $request->slug;
        $category->description= $request->desc;
        $category->status= $request->status == TRUE ? '1' : '0';
        $category->popular= $request->popular == TRUE ? '1' : '0';
        $category->meta_title= $request->meta_title;
        $category->meta_keywords= $request->meta_keywords;
        $category->meta_desc= $request->meta_desc;
        $category->image= $img_file_name;

        $category->update();

        return redirect('/category')->with('message', 'Category Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with('message', 'Category was deleted successfully');
    }
}
