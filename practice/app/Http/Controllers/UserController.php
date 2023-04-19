<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function index()
    {
        // User Has one detail only
        $data1 = User::with('detail')->get();
        $data1 = $data1->toArray();
        echo "User Has one detail only";
        p($data1);

        echo "<br>";

        // User Has many posts
        $data = User::with('post')->get();
        $data = $data->toArray();
        echo "User Has many posts";
        p($data);

        echo "<br>";

        // Detail Has one User only
        $data1 = Detail::with('user')->get();
        $data1 = $data1->toArray();
        echo "Detail Has one User only";
        p($data1);

        echo "<br>";

        // Post Has one User
        $data = Post::with('user')->get();
        $data = $data->toArray();
        echo "Post Has one User";
        p($data);

        die;
        // return Detail::with('getUser')->get();
    }
}
