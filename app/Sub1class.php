<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub1class extends Model
{
    protected $primaryKey = 'no';
    protected $fillable = [
        'subclass1_name',
    ];
    public function account_class()
    {
        return $this->hasMany('App\Account_class');
    }
    public function account()
    {
        return $this->hasMany('App\Account');
    }
}
