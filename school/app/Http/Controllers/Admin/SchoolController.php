<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use Illuminate\Support\Facades\Mail;
use App\Mail\SchoolMail;
use Illuminate\Support\Str;

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
        $request->validate(
            [
                'logo' => 'required|mimes:png|max:2048',
                'name' => 'required',
                'email' => 'required|email|unique:schools',
                'password' => [
                    'required',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                ],
                'type' => 'required',
                'city' => 'required',
                'description' => 'required',
            ]
        );

        DB::transaction(function () use ($request) {

            // save data into uploads folder
            $fileName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('assets/img/uploads/logo'), $fileName);

            $email = $request->email;
            $slug = Str::slug($request->name);

            // Insert data into the 'schools' table
            School::create([
                'user_id' => Auth::guard('admin')->id(),
                'logo' => $fileName,
                'name' => $request->name,
                'slug' => $slug,
                'email' => $email,
                'password' => Hash::make($request->password),
                'type' => $request->type,
                'city' => $request->city,
                'description' => $request->description,
            ]);

            // sending mail to school admin
            $mailData = [
                'title' => 'Mail from SchoolWeb',
                'body' => 'Congrats your school is ready for use',
                'username' => $email,
                'password' => $request->password,
                'link' => route('school.login'),
            ];
            Mail::to($email)->send(new SchoolMail($mailData));
        });
        return redirect()->route('admin.school');
    }

    public function school()
    {
        $schools = School::orderBy('id', 'desc')->get();
        $schools = compact('schools');
        return view('admin.school.school')->with($schools);
    }

    public function test()
    {
        // if (Auth::guard('admin')) {
        //     echo "auth check True";
        //     $id = Auth::guard('admin')->id();
        //     $user = Auth::guard('admin')->user();
        //     // $user = DB::table('users')->find($id);
        //     echo "<pre>";
        //     print_r($user);
        // }
        // echo "auth check False";
        // die;
        // return view('admin.auth.login');

        // ***********test for sending email*********
        // $mailData = [
        //     'title' => 'Mail from SchoolWeb',
        //     'body' => 'Congrats your school is ready for use',
        //     'username' => 'abc@abc.com',
        //     'password' => 'abcd@123',
        //     'link' => route('login'),
        // ];
        // Mail::to('rkteqm@gmail.com')->send(new SchoolMail($mailData));
        // dd('Email send successfully');
        // *****************end**********************
        die('for testing purpose only');
    }
}
