<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use App\Models\Staff;
use App\Models\Article;
use Illuminate\Support\Facades\Mail;
use App\Mail\SchoolMail;

class ArticleController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('school')->user();
        $auth = compact('auth');
        return view('school.dashboard')->with($auth);
    }

    public function create()
    {
        $auth = Auth::guard('school')->user();
        $data = compact('auth');
        return view('school.article.create')->with($data);
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
                'image' => 'required|mimes:jpg,png,jpeg|max:2048',
                'title' => 'required',
                'body' => 'required',
            ]
        );

        DB::transaction(function () use ($request) {

            // save data into uploads folder
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/uploads/article'), $fileName);


            // Insert data into the 'users' table
            Article::create([
                'school_id' => Auth::guard('school')->id(),
                'image' => $fileName,
                'title' => $request->title,
                'body' => $request->body,
            ]);
        });

        return redirect()->route('school.articles');
    }

    public function show()
    {
        $auth = Auth::guard('school')->user();
        $articles = DB::table('articles')->where('school_id', $auth->id)->orderBy('id', 'desc')->get();
        $data = compact('auth', 'articles');
        return view('school.article.show')->with($data);
    }

    public function staff()
    {
        $auth = Auth::guard('school')->user();
        $staffs = DB::table('staffs')->where('school_id', $auth->id)->orderBy('id', 'desc')->get();
        $data = compact('auth', 'staffs');
        return view('school.staff')->with($data);
    }
}
