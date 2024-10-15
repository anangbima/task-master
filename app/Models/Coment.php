<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'content',
    ];

    // Relasi dengan tasks
    public function task() {
        return $this->belongsTo(Task::class);
    }
}
