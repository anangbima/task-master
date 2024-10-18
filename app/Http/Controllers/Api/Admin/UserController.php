<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display listing of the resource
    public function index() {
        return response()->json([
            'status'    => true,
            'tasks'     => User::all()
        ], 200);
    }
}
