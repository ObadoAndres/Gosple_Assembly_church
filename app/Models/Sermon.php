<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sermon extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'scripture_reference',
        'description',
        'preacher',
        'category',
        'sermon_date',
        'video_url',
        'audio_url',
        'thumbnail_path',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'sermon_date' => 'date',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    public static function generateUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    public function getSafeVideoUrlAttribute(): ?string
    {
        return $this->isSafeUrl($this->video_url) ? $this->video_url : null;
    }

    public function getSafeAudioUrlAttribute(): ?string
    {
        return $this->isSafeUrl($this->audio_url) ? $this->audio_url : null;
    }

    protected function isSafeUrl(?string $url): bool
    {
        if (empty($url)) {
            return false;
        }

        $parsed = parse_url($url);
        if (!isset($parsed['scheme'])) {
            return false;
        }

        $scheme = strtolower($parsed['scheme']);
        if (!in_array($scheme, ['http', 'https'])) {
            return false;
        }

        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
