<?php

namespace App\Policies;

use App\Models\Template;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TemplatePolicy{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Template $template): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Template $template): bool
    {
    }

    public function delete(User $user, Template $template): bool
    {
    }

    public function restore(User $user, Template $template): bool
    {
    }

    public function forceDelete(User $user, Template $template): bool
    {
    }
}
