<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users'; 
    public $timestamps = false; 
    protected $fillable = ['email', 'password', 'role']; 
}
