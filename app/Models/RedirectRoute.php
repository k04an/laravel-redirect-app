<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedirectRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'fromUrl',
        'toUrl',
        'trackable',
        'user_id'
    ];

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function logEntries() {
        return $this->hasMany(RouteLogEntry::class);
    }
}
