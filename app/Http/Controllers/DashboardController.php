<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserInfoRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function store(UpdateUserInfoRequest $request)
    {
        Auth::user()->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
        ]);
        
        return back();
    }
}
