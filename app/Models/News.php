<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'status',
        'featured_image',
        'author',
        'published_at',
        'views'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $appends = ['formatted_published_at'];

    public function getFormattedPublishedAtAttribute()
    {
        if ($this->published_at) {
            return Carbon::parse($this->published_at)->locale('id')->isoFormat('DD MMMM YYYY, HH:mm');
        }
        return null;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}