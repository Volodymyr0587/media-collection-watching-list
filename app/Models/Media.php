<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'type', 'user_id'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_media');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
