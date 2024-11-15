<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relationship: A permission can be assigned to many users.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'permission_user');
    }

    /**
     * Relationship: A permission can belong to many roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
