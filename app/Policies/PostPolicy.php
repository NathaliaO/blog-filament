<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->papel == 'admin' || $user->papel == 'autor';
    }

    public function view(User $user, Post $post): bool
    {
        return $user->papel == 'admin' || ($user->papel == 'autor' && $post->author == $user->name);
    }

    public function create(User $user): bool
    {
        return $user->papel == 'admin' || $user->papel == 'autor';
    }

    public function update(User $user, Post $post): bool
    {
        return $user->papel == 'admin' || ($user->papel == 'autor' && $post->author == $user->name);
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->papel == 'admin' || ($user->papel == 'autor' && $post->author == $user->name && $post->isRascunho());
    }

    public function restore(User $user, Post $post): bool
    {
        return $user->papel == 'admin';
    }

    public function forceDelete(User $user, Post $post): bool
    {
        return $user->papel == 'admin';
    }
}
