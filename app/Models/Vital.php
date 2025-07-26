<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'blood_pressure',
        'blood_sugar',
        'weight',
        'mood',
        'note',
        'recorded_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'recorded_at' => 'datetime',
            'weight' => 'decimal:2',
        ];
    }

    /**
     * Get the user that owns the vital.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
