<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // User Has one detail only
        $data1 = User::with('getDetail')->get();
        $data1 = $data1->toArray();
        echo "Has One";
        p($data1);
        
        echo "<br>";
        
        // User Has many posts
        $data = User::with('getPost')->get();
        $data = $data->toArray();
        echo "Has Many";
        p($data);

        die;
        // return Detail::with('getUser')->get();
    }
}
