<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['first_name', 'last_name', 'role_id', 'id_number', 'email', 'password'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        $full_name = $this->first_name . ' ' . $this->last_name;
        return $full_name;
    }

    public function role():HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function leave_tracker():HasOne
    {
        return $this->hasOne(LeaveTracker::class, 'user_id', 'id')->where('year', now()->year)->latest();
    }

    public function messages() :HasMany
    {
        return $this->hasMany(Messages::class, 'receiver_id','id');
    }
}
