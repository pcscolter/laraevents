<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [

        'name',
        'email',
        'cpf',
        'password',
        'role'
    ];

    //mutators
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    protected $hidden= [
        'password'
    ];

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function phones(){
        return $this->hasMany(Phone::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
