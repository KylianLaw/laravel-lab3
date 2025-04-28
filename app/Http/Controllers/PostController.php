<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // List all posts with authors (eager loading)
    public function index()
    {
        $posts = Post::with('author')->get(); // Eager load authors
        return view('posts.index', compact('posts'));
    }

    // Show a single post with comments
    public function show($id)
    {
        $post = Post::with(['author', 'comments'])->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
