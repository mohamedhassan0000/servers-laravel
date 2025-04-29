<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'user_id',
        'server_ip',
        'server_name',
        'server_details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function note()
    {
        return $this->hasMany(Note::class);
    }
}
