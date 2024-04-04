<?php

namespace App\Livewire;

use App\Models\Post as ModelsPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Post extends Home
{
    public $post;

    public function render()
    {
        return view('livewire.post', [
            'post' => $this->post
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function mount($id)
    {
        $this->post = ModelsPost::find($id);
    }
}
