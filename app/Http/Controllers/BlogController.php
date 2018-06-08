<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //
    protected $limit = 3;

    public function index()
    {
      // $posts = Post::with('author')->latestFirst()->paginate(3);
      $posts = Post::with('author')->latestFirst()->simplepaginate($this->limit);
      return view("blog.index",compact('posts'));
    }
}
