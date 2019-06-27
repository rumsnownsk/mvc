<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    public function allUsers(){
        return User::all();
    }

    public function findUser($like){
        return User::where('name', 'like', '%'.$like.'%')->get();
    }


}