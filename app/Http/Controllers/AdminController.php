<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('admin', '!=', 1)->get();
        return view('admin.index', compact('users'));
    }

    public function import()
    {

    }
}
