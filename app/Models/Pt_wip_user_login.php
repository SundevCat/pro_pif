<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pt_wip_user_login extends Model
{
    use HasFactory;

    
    protected $table = 'ptweb.pt_wip_user_login';
    public $timestamps = false;
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'username',
        'password',
        'department',
        'maxaddress',
        'status',
        'created_at',
        'updated_at',
        'last_login',
    ];
}
