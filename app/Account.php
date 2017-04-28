<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{	
	protected $primaryKey = 'no';
    protected $fillable = [
        'account_class_no',
        'member_no',
        'account_date',
        'account_memo',
        'account_amount',
        'cert_type',
        'cert',
    ];
    public function member()
    {
        return $this->belongsTo('App\member', 'member_no', 'no');
    }
    public function account_class()
    {
        return $this->belongsTo('App\account_class');
    }
    public function sub1class()
    {
        return $this->belongsTo('App\sub1class');
    }
    public function sub2class()
    {
        return $this->belongsTo('App\sub2class');
    }

//    public static function pdf_person($no)/*Ajax*/ {
//        return Account::where('member_no','=',$no)->get();
//    }

}
