<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index')->with([  
            'users' => User::all()
        ]);
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit')->with('user', $user);
    }

    public function storeUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
            'firstname' => ['required', 'alpha', 'max:100'],
            'lastname' => ['required', 'alpha', 'max:100'],
            'email' => ['required', 'email']
        ]);

        $user->update($validated);
        
        return back();
    }

    public function destroyUser(User $user)
    {
        $user->delete();

        return back();
    }
}
