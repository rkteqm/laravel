<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
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
                'email' => 'required|email|unique:customers',
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
        // $fileName = time() . '.' . $request->profile_pic->extension();
        // $request->profile_pic->move(public_path('assets/img/uploads'), $fileName);

        // $customer = new User;
        // $customer->profile_pic = $fileName;
        // $customer->name = $request['name'];
        // $customer->email = $request['email'];
        // $customer->gender = $request['gender'];
        // $customer->dob = $request['dob'];
        // $customer->address = $request['address'];
        // $customer->city = $request['city'];
        // $customer->state = $request['state'];
        // $customer->country = $request['country'];
        // $customer->password = md5($request['password']);
        // if ($customer->save()) {
        //     return redirect()->action([CustomerController::class, 'index'])->with('success', 'Customer has been saved');
        // }

        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // return redirect()->route('login');
    }
}
