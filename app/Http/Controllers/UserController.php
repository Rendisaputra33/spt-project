<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index()
    {
        return view('login');
    }

    public function viewIndex()
    {
        return view('tampil-data-user');
    }
}
