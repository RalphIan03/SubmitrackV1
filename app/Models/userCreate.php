<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userCreate extends Model
{
    protected $fillable = ['sys_username','sys_name','sys_dept', 'sys_password', 'sys_role'];
    /** @use HasFactory<\Database\Factories\UserCreateFactory> */
    use HasFactory;
}
