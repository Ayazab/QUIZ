<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'firstname', 'lastname', 'username', 'email_id', 'password', 'subject_names', 'profile_pic'];

}
