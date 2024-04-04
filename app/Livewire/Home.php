<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'posts' => \App\Models\Post::where('status', 'publicado')->get(),
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    public function incrementLikes(int $postId): void
    {
        $likedPosts = Session::get('posts-liked', []);

        if (in_array($postId, $likedPosts)) {
            return;
        }

        $post = Post::find($postId);

        Session::put('posts-liked', [...$likedPosts, $postId]);
        $post->increment('likes');
    }
}
