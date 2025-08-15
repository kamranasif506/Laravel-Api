<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return Post::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        $this->authorizeOwner($post);
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $this->authorizeOwner($post);

        $post->update($request->only(['title', 'content']));
        return $post;
    }

    public function destroy(Post $post)
    {
        $this->authorizeOwner($post);

        $post->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }

    private function authorizeOwner(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}

