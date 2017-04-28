<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $primaryKey = 'no';
    protected $fillable = [
        'church_name',
        'add_zipcode',
        'add_city',
        'add_dist',
        'add_street',
        'church_tel',
        'ext',
        'web_or_mail',
        'contact',
    ];
    public function member()
    {
        return $this->hasMany('App\Member');
    }
    public function account()
    {
        return $this->hasMany('App\account');
    }
    public function course_registration()
    {
        return $this->hasMany('App\Course_registration');
    }
    public function course()
    {
        return $this->hasMany('App\Course');
    }
}
