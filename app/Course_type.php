<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_type extends Model
{
    protected $primaryKey = 'no';
    protected $fillable = [
        'course_type_name'
    ];
    public function course_registration()
    {
        return $this->hasMany('App\Course_registration');
    }
    public function course()
    {
        return $this->hasMany('App\Course');
    }
}
