<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ministry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_path',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public static function generateUniqueSlug(string $name): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!empty($this->image_path)) {
            if (Str::startsWith($this->image_path, ['http://', 'https://', '/'])) {
                return $this->image_path;
            }

            return asset($this->image_path);
        }

        $fallback = self::resolveImageFileFromName($this->name);

        return $fallback ? asset('images/' . $fallback) : null;
    }

    public static function resolveImageFileFromName(?string $name): ?string
    {
        if (blank($name)) {
            return null;
        }

        $normalized = strtolower(trim($name));
        $normalized = str_replace(['&', ' and ', '/', '  '], ['and', ' ', ' ', ' '], $normalized);
        $normalized = preg_replace('/[^a-z0-9\s]/', '', $normalized);
        $normalized = preg_replace('/\s+/', ' ', trim($normalized));

        $map = [
            'family ministry' => 'family ministry.jpg',
            'womens ministry' => 'women ministry.jpg',
            "women's ministry" => 'women ministry.jpg',
            'mens ministry' => "Men's ministry.jpg",
            "men's ministry" => "Men's ministry.jpg",
            'youth ministry' => 'youth ministry.jpg',
            'childrens ministry' => 'children ministry.jpg',
            "children's ministry" => 'children ministry.jpg',
            'worship and music ministry' => 'Worship & Music Ministry.jpg',
            'prayer ministry' => 'Prayer Ministry.jpg',
            'evangelism and outreach' => 'Evangelism & Outreach.jpg',
        ];

        return $map[$normalized] ?? null;
    }
}
