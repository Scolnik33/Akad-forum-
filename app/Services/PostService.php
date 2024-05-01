<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function topost($request) {
        if ($request->image) {
            $image = $request->file('image')->store('uploadsPosts', 'public');
        } else {
            $image = null;
        }
        
        $userId = Auth::id();
        $tags = explode(', ', mb_strtolower($request->tags));

        Post::create([
            'userId' => $userId,
            'name' => $request->name,
            'tags' => $tags,
            'category' => $request->category,
            'text' => $request->text,
            'image' => $image,
            'quantityViews' => 0
        ]);

        session()->flash('success', 'Пост был успешно создан.');
    }

    public function toupdate($request, $id) {
        if ($request->imageFile) {
            $image = $request->file('imageFile')->store('uploadsPosts', 'public');
        } else {
            $image = $request->imageString;
        }

        $post = Post::query()->find($id);
        $tags = explode(', ', mb_strtolower($request->tags));

        $post->update([
            'name' => $request->name,
            'tags' => $tags,
            'category' => $request->category,
            'text' => $request->text,
            'image' => $image,
            'quantityViews' => 0
        ]);

        session()->flash('success', 'Пост был успешно обновлен.');
    }

    public function todelete($id) {
        $post = Post::query()->find($id);
        $post->delete();
        
        session()->flash('success', 'Пост был успешно удален.');
    }
}
?>