<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'no';
    protected $fillable = [
        'church_no',
        'credit_card_no',
        'devotee_name',
        'title',
        'delivery',
        'gender',
        'birthday',
        'uid',
        'member_tel',
        'mobile',
        'add2_zipcode',
        'add2_city',
        'add2_dist',
        'add2_street',
        'add1_zipcode',
        'add1_city',
        'add1_dist',
        'add1_street',
        'email',
        'date_in',
        'date_out',
        'member_type',
    ];
    public function church()
    {
        return $this->belongsTo('App\Church','church_no','no');
    }
    public function course()
    {
        return $this->hasMany('App\Course');
    }
    public function credit_card()
    {
        return $this->belongsTo('App\Credit_card','credit_card_no','no');
    }
    public function product_order()
    {
        return $this->hasMany('App\Product_order');
    }
    public function account()
    {
        return $this->hasMany('App\account');
    }
    public function course_registration()
    {
        return $this->hasMany('App\registration');
    }
    public static function pdf_person($no)/*Ajax*/ {
        return Account::where('member_no','=',$no)->get();
    }
}
