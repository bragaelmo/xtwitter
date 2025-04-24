<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Post;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        Log::info('REQUISICAO ' . $post);
        $like = $post->likes()->where('user_id', auth()->id())->first();

        if ($like) {
            $like->delete(); // descurtir
        } else {
            $post->likes()->create(['user_id' => auth()->id()]); // curtir
        }

        return redirect()->back();
    }
}
