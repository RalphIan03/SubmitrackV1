<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    protected $fillable = ['sub_code','sub_name','sub_dept'];
    /** @use HasFactory<\Database\Factories\SubjectsFactory> */
    use HasFactory;
}
