<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'origin_title', 'year', 'country', 'description', 'season', 'series', 'image', 'user_id', 'watched', 'watched_episodes'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_media');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(MediaImage::class);
    }

    // Define scope for filtering by category
    public function scopeFilterByCategory(Builder $query, $category_id): Builder
    {
        if ($category_id) {
            return $query->whereHas('categories', function ($q) use ($category_id) {
                $q->where('categories.id', $category_id);
            });
        }

        return $query;
    }

    public function isSeries()
    {
        // return $this->categories()->where('name', 'Serials')->exists();
        return $this->season || $this->series;
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($media) {
            if ($media->image && Storage::disk('public')->exists($media->image)) {
                Storage::disk('public')->delete($media->image);
            }
        });
    }

    protected $casts = [
        'watched_episodes' => 'array',
    ];

}
