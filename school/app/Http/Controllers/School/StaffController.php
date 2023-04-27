<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use Illuminate\Support\Facades\Mail;
use App\Mail\SchoolMail;

class StaffController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('school')->user();
        $auth = compact('auth');
        return view('school.dashboard')->with($auth);
    }

    public function test()
    {
        return "test";
    }

    // public function create()
    // {
    //     return view('school.school.addschool');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'logo' => 'required|mimes:png|max:2048',
    //             'name' => 'required',
    //             'email' => 'required|email|unique:schools',
    //             'password' => [
    //                 'required',
    //                 Password::min(8)
    //                     ->letters()
    //                     ->mixedCase()
    //                     ->numbers()
    //                     ->symbols()
    //             ],
    //             'type' => 'required',
    //             'city' => 'required',
    //             'description' => 'required',
    //         ]
    //     );

    //     DB::transaction(function () use ($request) {

    //         // save data into uploads folder
    //         $fileName = time() . '.' . $request->logo->extension();
    //         $request->logo->move(public_path('assets/img/uploads/logo'), $fileName);
    //         $email = $request->email;
    //         // Insert data into the 'schools' table
    //         School::create([
    //             'user_id' => Auth::guard('school')->id(),
    //             'logo' => $fileName,
    //             'name' => $request->name,
    //             'email' => $email,
    //             'password' => Hash::make($request->password),
    //             'type' => $request->type,
    //             'city' => $request->city,
    //             'description' => $request->description,
    //         ]);

    //         // send mail to school honour
    //         $mailData = [
    //             'title' => 'Mail from SchoolWeb',
    //             'body' => 'Congrats your school is ready for use',
    //             'username' => $email,
    //             'password' => $request->password,
    //             'link' => route('login'),
    //         ];
    //         Mail::to($email)->send(new SchoolMail($mailData));
    //     });
    //     return redirect()->route('school.school');
    // }
}
