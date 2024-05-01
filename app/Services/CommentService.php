<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    public function tocomment($request) {
        $user = Auth::user();

        Comment::create([
            'userId' => $user['id'],
            'postId' => $request->postId,
            'name' => $user['name'],
            'avatar' => $user['avatar'],
            'comment' => $request->comment
        ]);
    }

    public function toupdatecomment($request, $id) {
        $comment = Comment::query()->find($id);

        $comment->update([
            'comment' => $request->comment
        ]);
    }

    public function todeletecomment($id) {
        Comment::query()->find($id)->delete();
    }
}

?>