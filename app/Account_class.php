<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_class extends Model
{
    protected $primaryKey = 'no';
    protected $fillable = [
        'subclass1_no',
        'subclass2_no',
        'class',
    ];
    public function Account()
    {
        return $this->hasMany('App\Account');
    }
    public function sub1class()
    {
        return $this->belongsTo('App\Sub1class','subclass1_no','no');
    }
    public function sub2class()
    {
        return $this->belongsTo('App\Sub2class','subclass2_no','no');
    }
}
