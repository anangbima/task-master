<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Akses ke halaman index user
    public function index () {
        $user = Auth::user();
        
        $data = [
            'title'     => 'Home',
            'projects'  => Project::with('member', 'task')->isMember($user->id)->get()
        ];

        return view('user.index', $data);
    }

    // Akses halaman profile user
    public function profile () {
        $data = [
            'title'     => 'Profile',
        ];

        return view('user.profile', $data);
    }
}
