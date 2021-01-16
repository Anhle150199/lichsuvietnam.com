<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post as Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function SinglePost($id)
    {
        $update = Post::where('id', $id)
            ->increment('views', 1);

        $post = Post::find($id);
        $user = User::find($post->user_id);
        $category = Category::find($post->category_id);
        $subpost = Post::join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.category_id', $post->category_id)
            ->where('posts.id', '!=', $post->id)
            ->inRandomOrder()->limit(2)->get(['posts.*', 'categories.name']);
        $comments = Comment::where('post_id', '=', $id)
            ->where('hidden', 0)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->get(['comments.*', 'users.name', 'users.avatar']);
        $replies = Reply::where('post_id', $id)
            ->where('hidden', 0)
            ->join('users', 'replies.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->get(['replies.*', 'users.name', 'users.avatar']);

        $postcount = Post::where('user_id', '=', $user->id)->count();
        return view('single-post', compact('post', 'subpost', 'postcount', 'user', 'category', 'comments', 'replies'));
    }
}
