<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Initial dari nama untuk avatar
    public function getInitialsAttribute() {
        $words = explode(' ', $this->name);
        $initials = '';

        foreach ($words as $word ) {
            $initials .= strtoupper(substr($word, 0, 1)); 
        }

        return $initials;
    }

    

    // relasi dengan tabel member project
    public function memberProject () {
        return $this->hasMany(MemberProject::class);
    }

    // relasi dengan tabel member project
    public function memberTask () {
        return $this->hasMany(MemberTask::class);
    }
}
