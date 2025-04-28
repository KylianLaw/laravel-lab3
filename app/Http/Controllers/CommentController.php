<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Store a new comment
    public function store(Request $request, $postId)
    {
        // Validate the request
        $validated = $request->validate([
            'commenter_name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        // Find the post
        $post = Post::findOrFail($postId);

        // Create the comment
        $post->comments()->create([
            'commenter_name' => $validated['commenter_name'],
            'comment' => $validated['comment'],
        ]);

        // Redirect back to the post with success message
        return redirect()->route('posts.show', $postId)
                         ->with('success', 'Comment added successfully!');
    }
}
