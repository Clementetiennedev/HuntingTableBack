<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static firstOrFail($id)
 * @method static where(string $string, mixed $id)
 * @method static create(array $data)
 * @method static findOrFail(mixed $input)
 */
class Society extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'statut',
        'user_id',
        'federation_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    /**
     * Relations
     */
    public function user(): HasOne{
        return $this->hasOne(User::class);
    }

    public function hunt(): HasMany{
        return $this->hasMany(Hunt::class);
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}
