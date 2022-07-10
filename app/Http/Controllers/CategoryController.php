<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Category',
            'category' => Category::all(),

        ];
        return view('admin.pages.category', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "title" => "create",
        ];

        return view('admin.pages.createcategory', $data);
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            "name" => "required ",

        ]);
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');
        Category::create($validatedData);

        return redirect('/admin/category')->with('success', 'New Category has been added!');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [
            "title" => "update",
            'category' => $category
        ];

        return view('admin.pages.editcategory', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            "name" => "required ",
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|';
        }
        $validatedData =  $request->validate($rules);
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');

        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/admin/category')->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $post = Post::where('category_id', $category->id)->get();
        if ($post->count() > 0) {
            return back()->with('gagal', 'Ada produk terkait category ini');
        }
        Category::destroy($category->id);

        return redirect('/admin/category')->with('success', 'Category has been deleted!');
    }
}
