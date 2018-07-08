<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a user's profile.
     *
     * @param User $user
     * @return \Illuminate\Http\Responsevoid
     */
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }
}
