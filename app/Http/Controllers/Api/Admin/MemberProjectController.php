<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberProjectRequest;
use App\Models\MemberProject;
use Illuminate\Http\Request;

class MemberProjectController extends Controller
{
    // Store data to member project
    public function store(StoreMemberProjectRequest $request) {
        $data = $request->validated();

        foreach($data['user_id'] as $value) {
            // pindah modal
            MemberProject::create([
                'user_id'       => $value,
                'project_id'    => $request->project_id,
                'role'          => 'test role'
            ]);
        }

        return response()->json([
            'status'        => true,
            'message'       => 'Success add data',
        ], 200);
    }

    // Remove specific member in project
    public function destroy(MemberProject $memberProject) {
        $memberProject->delete();

        return response()->json([
            'status'        => true,
            'message'       => 'Success delete data',
        ], 200);
    }
}
