<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function updateItem(Request $request, OrderItem $orderItem)
    {
        $validated = $request->validate([
            'status' => 'required|in:shipped,done'
        ]);

        $orderItem->update($validated);

        // Notify user.

        return redirect()->back();
    }
}
