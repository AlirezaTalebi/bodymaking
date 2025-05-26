<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calory extends Model
{
    /** @use HasFactory<\Database\Factories\CaloryFactory> */
    use HasFactory;

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
