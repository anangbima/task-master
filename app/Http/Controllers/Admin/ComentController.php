<?php

namespace App\Http\Controllers\Admin;

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

        session()->flash('success', 'Successfully add coment to task');
        return back();
    }
}
