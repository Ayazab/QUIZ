<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'firstname', 'lastname', 'username', 'email_id', 'password', 'class', 'profile_pic'];

}
