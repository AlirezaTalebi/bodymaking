<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property string $name
 * @property string $email
 * @property string $gender
 * @property int $age
 * @method array getGender()
 */

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'gender',
        'age',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    /**
     * @return array
     */
    public static function getGender(): array
    {
        return [
            'male',
            'female',
            'non-binary',
            'transgender',
            'genderqueer',
            'agender',
            'prefer not to say',
            'other'
        ];
    }

    public function profile(): hasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function workoutSessions(): hasMany
    {
        return $this->hasMany(WorkoutSession::class);
    }

    public function calories(): hasMany
    {
        return $this->hasMany(Calory::class);
    }

    public function meals(): HasMany
    {
        return $this->hasMany(Meal::class);
    }

    public function bodyMetrics(): HasMany
    {
        return $this->hasMany(Meal::class);
    }
}
