<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComentRequest;
use App\Models\Coment;
use Illuminate\Http\Request;

class ComentController extends Controller
{
    // Create data coment for task
    public function store(StoreComentRequest $request) {
        $data = $request->validated();
        
        Coment::create([
            'task_id'       => $request->task_id,
            'content'       => $data['content'],
        ]);

        return response()->json([
            'status'        => true,
            'message'       => 'Success add data',
        ], 200);
    }
}
