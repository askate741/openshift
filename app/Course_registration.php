<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_registration extends Model
{
    protected $primaryKey = 'no';
    protected $fillable = [
        'member_no',
        'course_type_no',
        'course_no',
        'people_count',
    ];
    public function member()
    {
        return $this->belongsTo('App\Member','member_no','no');
    }
    public function church()
    {
        return $this->belongsTo('App\Church');
    }
    public function credit_card()
    {
        return $this->belongsTo('App\Credit_card');
    }
    public function course_type()
    {
        return $this->belongsTo('App\Course_type','course_type_no','no');
    }
    public function course()
    {
        return $this->belongsTo('App\Course','course_no','no');
    }
}
