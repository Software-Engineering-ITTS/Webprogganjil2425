<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'original_filename',
        'user_id',
        'status',
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at'
    ];

    protected $dates = [
        'approved_at',
        'rejected_at'
    ];

    /**
     * Get the user that owns the document
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that approved the document
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Get the user that rejected the document
     */
    public function rejector()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }
}
