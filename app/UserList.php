<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table = 'users_list';
    protected $fillable = ['name','email','mobile'];
}
