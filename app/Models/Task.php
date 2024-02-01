<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "end_date",
        "start_date",
        "status",
        "description",
        "category_id",
        "user_id"
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
