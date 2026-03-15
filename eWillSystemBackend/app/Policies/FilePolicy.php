<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ImageDocument;

class FilePolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, User $owner)
{
    return $user->id === $owner->id || $user->isAdmin();
}

public function delete(User $user, ImageDocument $file)
{
    return $user->id === $file->user_id || $user->isAdmin();
}

}
