<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends BaseController
{   
    public function home(Request $request) {
        $posts = $this->pageService->home($request);

        return view('/home', ['posts' => $posts]);
    }

    public function profile($id) {
        $data = $this->pageService->profile($id);

        return view('profile', ['user' => $data['user'], 'posts' => $data['posts']]);
    }

    public function profileupdate() {
        $user = $this->pageService->toupdateprofile();

        return view('profileupdate', ['user' => $user]);
    }

    public function servises() {
        return view('servises');
    }

    public function topost() {
        return view('topost');
    }

    public function toupdate($id) {
        $post = $this->pageService->toupdate($id);

        return view('toupdate', ['post' => $post]);
    }

    public function single(Request $request, $id) {
        $data = $this->pageService->single($request, $id);

        return view('single', ['post' => $data['post'], 'popularPosts' => $data['popularPosts'], 'latestPosts' => $data['latestPosts'], 'comments' => $data['comments'], 'nextPage' => $data['nextPage'], 'prevPage' => $data['prevPage']]);
    }

    public function posts($id) {
        $data = $this->pageService->posts($id);

        return view('allPosts', ['user' => $data['user'], 'posts' => $data['posts']]);
    }

    public function tag($tag) {
        $data = $this->pageService->tag($tag);

        return view('tag', ['tag' => $data['tag'], 'posts' => $data['posts']]);
    }

    public function category($category) {
        $data = $this->pageService->category($category);

        return view('category', ['category' => $data['category'], 'posts' => $data['posts']]);
    }

    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function admin() {
        return view('admin');
    }
}
