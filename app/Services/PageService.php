<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageService
{
    public function home($request) {
        $postsQuery = Post::query();

        if ($request->category == 'popular' || $request->category == '') {
            $posts = $postsQuery->orderBy('quantityViews', 'desc')->paginate(9)->withPath("?" . $request->getQueryString());
        } else if ($request->category == 'latest') {
            $posts = $postsQuery->orderBy('created_at', 'desc')->paginate(9)->withPath("?" . $request->getQueryString());
        } else {
            $posts = $postsQuery->orderBy('created_at', 'asc')->paginate(9)->withPath("?" . $request->getQueryString());
        }

        return $posts;
    }

    public function profile($id) {
        $user = User::query()->find($id);
        $posts = Post::query()->where('userId', $user['id'])->orderBy('quantityViews', 'desc')->limit(8)->get();

        return ['user' => $user, 'posts' => $posts];
    }

    public function toupdateprofile() {
        $user = Auth::user();

        return $user;
    }

    public function toupdate($id) {
        $userId = Auth::id();
        $post = Post::query()->find($id);

        if (Auth::user()?->role == 'admin') {
            return $post;
        } else if ($post['userId'] != $userId) {
            abort(404);
        }

        return $post;
    }

    public function single($request, $id) {
        $post = Post::query()->findOrFail($id);
        $post->increment('quantityViews');

        $next = Post::where('id', '>', $id)->oldest('id')->first();
        $prev = Post::where('id', '<', $id)->latest('id')->first();

        $popularPosts = Post::query()->where('name', 'LIKE', "%{$request->search}%")->orderBy('quantityViews', 'desc')->limit(3)->get();
        $latestPosts = Post::query()->where('name', 'LIKE', "%{$request->search}%")->orderBy('created_at', 'desc')->limit(3)->get();

        $comments = Comment::query()->where('postId', $id)->get();   
        
        return ['post' => $post, 'popularPosts' => $popularPosts, 'latestPosts' => $latestPosts, 'comments' => $comments, 'nextPage' => $next, 'prevPage' => $prev];
    }

    public function posts($id) {
        $user = Auth::user();
        $posts = Post::query()->where('userId', $id)->orderBy('quantityViews', 'desc')->get();

        if ($user['id'] != $posts[0]['userId']) {
            abort(404);
        }

        return ['user' => $user, 'posts' => $posts];
    }

    public function tag($tag) {
        $posts = Post::query()->whereJsonContains('tags', $tag)->orderBy('created_at', 'desc')->get();

        if (count($posts) == 0) {
            abort(404);
        }

        return  ['tag' => $tag, 'posts' => $posts];
    }

    public function category($category) {
        $posts = Post::query()->where('category', $category)->orderBy('created_at', 'desc')->get();

        if (count($posts) == 0) {
            return abort(404);
        }

        return ['category' => $category, 'posts' => $posts];
    }
}

?>