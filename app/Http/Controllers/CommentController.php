<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    public function tocomment(CommentRequest $request) {
        $request->validated();

        $this->commentService->tocomment($request);

        return back();
    }

    public function toupdatecomment(CommentRequest $request, $id) {
        $request->validated();

        $this->commentService->toupdatecomment($request, $id);

        return back();
    }

    public function todeletecomment($id) {
        $this->commentService->todeletecomment($id);

        return back();
    }
}
