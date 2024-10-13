<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    // Get data user
    public function index () {
        $data = [
            'title'     => 'User',
            'users'     => User::get(),
        ];

        return view('admin.user.index', $data);
    }
}
