<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $data)
 * @method static findOrFail($id)
 */
class Hunt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'title',
        'description',
        'statut',
        'hunter_id',
        'society_id'
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
    public function hunter(): HasOne{
        return $this->hasOne(Hunter::class);
    }

    public function society(): HasOne{
        return $this->hasOne(Society::class);
    }

    public function kills()
    {
        return $this->hasMany(Kill::class);
    }
}
