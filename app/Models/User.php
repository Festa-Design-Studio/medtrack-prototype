<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
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
        'phone',
        'is_caregiver',
        'high_contrast_mode',
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
            'is_caregiver' => 'boolean',
            'high_contrast_mode' => 'boolean',
        ];
    }

    /**
     * Get the medications for the user.
     */
    public function medications()
    {
        return $this->hasMany(\App\Models\Medication::class);
    }

    /**
     * Get the vitals for the user.
     */
    public function vitals()
    {
        return $this->hasMany(\App\Models\Vital::class);
    }

    /**
     * Get the appointments for the user.
     */
    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class);
    }
}
