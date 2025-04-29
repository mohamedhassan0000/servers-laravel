<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'server_id',
        'note',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
