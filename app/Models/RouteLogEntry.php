<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteLogEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'redirect_route_id'
    ];

    public function route() {
        return $this->belongsTo(RedirectRoute::class);
    }
}
