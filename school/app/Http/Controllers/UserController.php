<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function index()
    {

        $id = Auth::user()->id;
        // $user = DB::table('users')->find(3);
        $user = User::with('userDetail')
            // ->where('id', $id)
            // ->whereMonth('created_at', '04')
            // ->whereDate('created_at', '2023-04-24')
            // ->whereNotNull('updated_at')
            ->get();
        $user = $user->toArray();
        $user = compact('user');

        return view('dashboard')->with($user);
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
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Insert data into the 'addresses' table
            $userDetail = UserDetail::create([
                'user_id' => $user->id,
                'profile_pic' => $fileName,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
            ]);
        });

        return redirect()->route('login');
    }
}
