<?php

namespace App\Policies;

use App\User;
use App\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Item $item)
    {
        return $user->ownsItem($item);
    }

    public function delete(User $user, Item $item)
    {
        return $user->ownsItem($item);
    }    
}
