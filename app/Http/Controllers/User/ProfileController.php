<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
//    public function edit()
//    {
//        return view('user.profile');
//    }

    // Refactor above code
    public function __invoke()
    {
        return view('user.profile');
    }
}
