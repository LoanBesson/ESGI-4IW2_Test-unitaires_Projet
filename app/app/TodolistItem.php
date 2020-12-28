<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodolistItem extends Model
{
    public function user(){
        return $this->hasOne('user');
    }
}
