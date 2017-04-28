<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $primaryKey = 'no';
    protected $fillable = [
        'course_type_no',
        'church_no',
        'member_no',
        'course_name',
        'date_start',
        'date_end',
        'section_count',
        'course_memo',
    ];
    public function church()
    {
        return $this->belongsTo('App\Church','church_no','no');
    }
    public function member()
    {
        return $this->belongsTo('App\Member','member_no','no');
    }
    public function course_type()
    {
        return $this->belongsTo('App\Course_type','course_type_no','no');
    }
    public function course_registration()
    {
        return $this->hasOne('App\Course_registration');
    }
    public static function course_name($no)/*Ajax從course撈課程名稱*/ {
        return Course::where('course_type_no','=',$no)->get();
    }
}
