<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Retrieve the currently authenticated user...
        $user = Auth::user();
        $user = $user->toArray();

        // Retrieve the currently authenticated user's ID...
        $id = Auth::id();

        $data = compact('user', 'id');
        return view('home')->with($data);
    }
}
