<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SessionUser extends Model
{
    protected $table = 'session_users';
    protected $fillable = [
        'token', 'refresh_token', 'token_expried', 'refresh_token_expried', 'user_id'
    ];
}
