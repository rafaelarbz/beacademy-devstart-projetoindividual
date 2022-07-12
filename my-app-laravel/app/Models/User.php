<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\This;
use App\Models\Post;
use App\Models\Team;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'is_admin',
        'password',
        'remember_token',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsers(string $search = null)
    {
        $users = $this->where(function ($query) use ($search){
            if($search){
                $query->where('email', $search);
                $query->orwhere('name', 'LIKE', "%$search%");
            }
        })->paginate(5);

        return $users;
    }
}