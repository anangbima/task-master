<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
    ];

    // Relasi dengan tabel user
    public function user () {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan tabel project
    public function project () {
        return $this->belongsTo(Project::class);
    }
}
