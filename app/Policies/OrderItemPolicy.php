<?php

namespace App\Policies;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderItemPolicy
{
    use HandlesAuthorization;

    public function updateShipped(User $user, OrderItem $orderItem)
    {
        return $user->id === $orderItem->book_owner->id;
    }
    
    public function updateDone(User $user, OrderItem $orderItem)
    {
        return $user->id === $orderItem->order->user_id;
    }
}
