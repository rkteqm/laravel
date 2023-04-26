<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('admin')->user();
        $auth = compact('auth');
        return view('admin.dashboard')->with($auth);
    }

    public function create()
    {
        return view('admin.school.addschool');
    }

    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
        die;
        return redirect()->route('admin.school.school');
    }

    public function school()
    {
        return view('admin.school.school');
    }

    public function test()
    {
        if (Auth::guard('admin')) {
            echo "auth check True";
            $id = Auth::guard('admin')->id();
            $user = Auth::guard('admin')->user();
            // $user = DB::table('users')->find($id);
            echo "<pre>";
            print_r($user);
        }
        echo "auth check False";
        die;
        // return view('admin.auth.login');
    }
}
