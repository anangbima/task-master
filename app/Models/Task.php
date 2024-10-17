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
        'priority',
        'due_date',
        'due_hour',
        'project_id'
    ];

    public function scopeTaskStatus($query, $key){
        return $query->where('status', $key);
    }

    // Relasi dengan tabel project
    public function project () {
        return $this->belongsTo(Project::class);
    }

    // Relasi dengan tabel member task
    public function member () {
        return $this->hasMany(MemberTask::class);
    }

    // Relasi dengan tabel coment
    public function coment () {
        return $this->hasMany(Coment::class);
    }
}
