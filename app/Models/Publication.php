<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Publication extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'file_path',
        'file_name',
        'file_size',
        'file_type',
        'category',
        'author',
        'published_date',
        'is_active',
        'downloads'
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_active' => 'boolean',
        'downloads' => 'integer'
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // Accessors
    public function getFileSizeFormattedAttribute()
    {
        if (!$this->file_size) return null;
        
        $bytes = (int) $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function getFileUrlAttribute()
    {
        if (!$this->file_path) return null;
        return Storage::disk('public')->url($this->file_path);
    }

    public function getTypeIconAttribute()
    {
        switch ($this->type) {
            case 'dokumen':
                return 'fas fa-file-pdf';
            case 'video':
                return 'fas fa-video';
            case 'audio':
                return 'fas fa-music';
            case 'gambar':
                return 'fas fa-image';
            default:
                return 'fas fa-file';
        }
    }

    public function getTypeColorAttribute()
    {
        switch ($this->type) {
            case 'dokumen':
                return 'text-danger';
            case 'video':
                return 'text-primary';
            case 'audio':
                return 'text-success';
            case 'gambar':
                return 'text-info';
            default:
                return 'text-muted';
        }
    }

    // Methods
    public function incrementDownloads()
    {
        $this->increment('downloads');
    }
}
