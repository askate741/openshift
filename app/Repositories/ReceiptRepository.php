<?php

namespace App\Repositories;

use App\Account;
use App\Member;

/**
 * Created by PhpStorm.
 * User: asd755045
 * Date: 2017/4/23
 * Time: 下午 11:07
 */
class ReceiptRepository  /*資料邏輯*/
{

    protected $member,$account;

    public function __construct(Member $member,Account $account)
    {
        $this->member = $member;
        $this->account = $account;
    }

    /*會員所需相關資料*/
    public function getPersonDetail($no)
    {
        return $this->member->findOrFail($no);
    }
    /*奉獻收據所需相關資料*/
    public function getReceiptDetail($no)
    {
        return json_decode($this->account->where('member_no', $no)
            ->join('account_classes', 'accounts.account_class_no', '=', 'account_classes.no')/*Join 兩張表進行篩選*/
            ->where('account_classes.class', "0")
            ->join('sub1classes', 'account_classes.subclass1_no', '=', 'sub1classes.no')
            ->join('sub2classes', 'account_classes.subclass2_no', '=', 'sub2classes.no')
            ->get());

    }
    /*奉獻收據明細編號*/
    public function getReceiptNo($no)
    {
        return $this->account->where('member_no', $no)
            -> get() ;
    }
}