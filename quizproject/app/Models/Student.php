<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'lastname', 'username', 'email_id', 'password', 'subject_name', 'profile_pic'];

}
