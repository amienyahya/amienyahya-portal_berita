<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('home.pages.blog', [
            "title" => "All Post",
            'active' => 'posts',
            'posts' => Post::latest()->get()
        ]);
    }
    public function show(Post $post)
    {
        return view('home.pages.post', [
            "title" => "Single post",
            'active' => 'posts',
            "post"  => $post
        ]);
    }
    public function author(User $author)
    {
        return view('home.pages.blog', [
            'title' => "Post By Author : $author->name",
            'active' => 'posts',
            'posts' => $author->posts->load('category', 'author'),
        ]);
    }
    public function category(Category $category)
    {
        return view('home.pages.blog', [
            'title' => "Post By Category : $category->name",
            'active' => 'posts',
            'posts' => $category->posts->load('category', 'author')
        ]);
    }
    public function categories()
    {
        return view('home.pages.categories', [
            'title' => 'Categories',
            'active' => 'categories',
            'categories' => Category::all()
        ]);
    }
}
