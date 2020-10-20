<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['user_id','title','description','is_complete'];

    public function getUserName(){

    	return $this->hasOne('App\UserList','id','user_id');
    }
}
