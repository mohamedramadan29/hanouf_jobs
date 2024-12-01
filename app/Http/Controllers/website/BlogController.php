<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Blog::paginate(10);
        return view ('website.blog',compact('posts'));
    }

    public function blog_details($slug){
        $blog = Blog::whereSlug($slug)->first();
       // dd($blog);
       return view ('website.blog-details',compact('blog'));
    }
}
