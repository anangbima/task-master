<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Akses ke halaman index user
    public function index () {
        $data = [
            'title'     => 'Home'
        ];

        return view('user.index', $data);
    }

    // Akses halaman profile user
    public function profile () {
        return view('user.profile');
    }
}
