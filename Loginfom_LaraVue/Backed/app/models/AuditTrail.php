<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'menu_accessed',
        'method',
        'timestamp',
    ];

    /**
     * Relationship: An audit trail is associated with one user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get formatted timestamp.
     */
    public function getFormattedTimestamp()
    {
        return $this->timestamp->format('Y-m-d H:i:s');
    }
}
