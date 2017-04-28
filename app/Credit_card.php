<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit_card extends Model
{
    protected $primaryKey = 'no';
    protected $fillable = [
        'card_id',
        'issue_bank',
        'exp',
        'type',
        'donate_start',
        'donate_end',
        'donate_times',
        'donate_way',
        'promise_amount',
    ];
    public function member()
    {
        return $this->hasOne('App\Member');
    }
    public function course_registration()
    {
        return $this->hasMany('App\Course_registration');
    }
}
