<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Request_writer extends Model
{
    protected $fillable = [
        'note',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
