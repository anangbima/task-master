<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 
        'slug', 
        'description', 
    ];

    // Manage slug projects
    public function sluggable(): array
    {
        return [
            'slug'  => [
                'source'    => 'name',
                'onUpdate'  => true
            ]
        ];
    }

    // Store data to table project
    public function store(array $data) {
        return $this->create([
            'name'          => $data['name'],
            'description'   => $data['description'],
        ]);
    }
    
    // Mendapatkan percent dari total task selesai
    public function statusTasks($status) {
        $totalTasks = $this->task()->count();
        $countStatusTasks = $this->task()->where('status', $status)->count();

        if ($totalTasks === 0) {
            return [
                'count'  => $countStatusTasks,
                'percent' => 0
            ];
        }

        return [
            'count'  => $countStatusTasks,
            'percent' => ($countStatusTasks / $totalTasks) * 100
        ];
    }

    // Mengambil data project by user
    public function scopeHasMember($query, $key) {
        // return $query->where('user_id', $key);
        return $query->whereHas('member', function ($query) use ($key) {
            $query->where('user_id', $key);
        });
    }

    // Relasi dengan tabel task
    public function task () {
        return $this->hasMany(Task::class);
    }

    // Relasi dengan tabel member project
    public function member () {
        return $this->hasMany(MemberProject::class);
    }
}
