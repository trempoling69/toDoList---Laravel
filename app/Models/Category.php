<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable =  [
        "name",
        "color"
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
