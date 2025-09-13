<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceRequest extends Model
{
    protected $fillable = [
        'service_id',
        'request_number',
        'full_name',
        'nik',
        'birth_place',
        'birth_date',
        'gender',
        'address',
        'phone',
        'email',
        'job',
        'purpose',
        'additional_info',
        'attachments',
        'status',
        'admin_notes',
        'processed_at',
        'completed_at'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'attachments' => 'array',
        'processed_at' => 'datetime',
        'completed_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($request) {
            if (empty($request->request_number)) {
                $request->request_number = 'SR' . date('Ymd') . Str::random(6);
            }
        });
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeProcessing($query)
    {
        return $query->where('status', 'processing');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-yellow',
            'processing' => 'bg-blue',
            'completed' => 'bg-green',
            'rejected' => 'bg-red'
        ];

        return $badges[$this->status] ?? 'bg-secondary';
    }

    public function getStatusTextAttribute()
    {
        $texts = [
            'pending' => 'Menunggu',
            'processing' => 'Diproses',
            'completed' => 'Selesai',
            'rejected' => 'Ditolak'
        ];

        return $texts[$this->status] ?? 'Unknown';
    }
}
