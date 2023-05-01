<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function index()
    {
        $auth = Auth::user();
        $id = $auth->school_id;
        $articles = DB::table('articles')->where('school_id', $id)->orderBy('id', 'desc')->get();
        $school = DB::table('schools')->find($id);
        $slug = $school->slug;
        $data = compact('auth', 'slug', 'articles');

        return view('dashboard')->with($data);
    }

    public function create()
    {
        return view('user.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'profile_pic' => 'required|mimes:jpg,png,jpeg|max:2048',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'gender' => 'required',
                'dob' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'password' => [
                    'required',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                ],
                'confirm_password' => 'required|same:password',
            ]
        );

        DB::transaction(function () use ($request) {

            // save data into uploads folder
            $fileName = time() . '.' . $request->profile_pic->extension();
            $request->profile_pic->move(public_path('assets/img/uploads'), $fileName);

            // Insert data into the 'users' table
            Staff::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        });

        return redirect()->route('login');
    }
}
