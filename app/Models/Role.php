<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static firstOrFail($id)
 * @method belongsTo(string $class)
 */
class Role  extends Model
{
    use HasFactory;

    public const ADMIN_ID = 1;
    public const HUNTER_ID = 2;
    public const SOCIETY_ID = 3;

}
