<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends BaseController
{
    public function topost(CreatePostRequest $request) {
        $request->validated();
        
        $this->postService->topost($request);

        return redirect(route('home'));
    }

    public function toupdate(UpdatePostRequest $request, $id) {
        $request->validated();

        $this->postService->toupdate($request, $id);

        return redirect(route('single', $id));
    }

    public function todelete($id) {
        $this->postService->todelete($id);

        return redirect(route('home'));
    }
}
