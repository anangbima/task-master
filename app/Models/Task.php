<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'deadline', 
        'status', 
        'project_id'
    ];

    // Relasi dengan tabel project
    public function project () {
        return $this->belongsTo(Project::class);
    }

    // Relasi dengan tabel member task
    public function member () {
        return $this->hasMany(MemberTask::class);
    }
}
