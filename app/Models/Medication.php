<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'dosage',
        'schedule_time',
        'frequency',
        'notes',
    ];

    /**
     * Get the user that owns the medication.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
