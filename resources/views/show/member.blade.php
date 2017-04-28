@extends('tcrm.show')
@section('showData')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>會員名稱:&nbsp{{$member->devotee_name}}</strong></h3>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pills {{--nav-justified--}}" role="tablist">
                <li role="presentation" class="active"><a href="#member" aria-controls="member" role="tab"
                                                          data-toggle="tab">基本資料</a></li>
                @if($member->credit_card!=null)
                    <li role="presentation"><a href="#credit_card" aria-controls="credit_card" role="tab"
                                               data-toggle="tab">信用卡資料</a>
                    </li>
                @endif
            </ul>
            <div class="tab-content">
                <br>
                <div role="tabpanel" class="tab-pane fade in active list-group" id="member">
                    <a class="list-group-item"><strong>所屬教會:</strong>&nbsp{{$member->church->church_name}}</a>
                    <a class="list-group-item"><strong>身分類型:</strong>&nbsp{{$member->member_type}}</a>
                    <a class="list-group-item"><strong>奉獻抬頭:</strong>&nbsp{{$member->title}}</a>
                    <a class="list-group-item"><strong>奉獻收據寄發方式:</strong>&nbsp{{$member->delivery}}</a>
                    <a class="list-group-item"><strong>性別:</strong>&nbsp{{$member->gender}}</a>
                    <a class="list-group-item"><strong>出生年月日:</strong>&nbsp{{$member->birthday}}</a>
                    <a class="list-group-item"><strong>身分證字號:</strong>&nbsp{{$member->uid}}</a>
                    <a class="list-group-item"><strong>手機號碼:</strong>&nbsp{{$member->mobile}}</a>
                    <a class="list-group-item"><strong>電話號碼:</strong>&nbsp{{$member->member_tel}}</a>
                    <a class="list-group-item"><strong>通訊郵遞區號:</strong>&nbsp{{$member->add2_zipcode}}</a>
                    <a class="list-group-item"><strong>通訊縣市:</strong>&nbsp{{$member->add2_city}}</a>
                    <a class="list-group-item"><strong>通訊鄉鎮市區:</strong>&nbsp{{preg_replace('/([0-9])/i','',$member->add2_dist)}}
                    </a>
                    <a class="list-group-item"><strong>通訊地址:</strong>&nbsp{{$member->add2_street}}</a>
                    <a class="list-group-item"><strong>戶籍郵遞區號:</strong>&nbsp{{$member->add1_zipcode}}</a>
                    <a class="list-group-item"><strong>戶籍縣市:</strong>&nbsp{{$member->add1_city}}</a>
                    <a class="list-group-item"><strong>戶籍鄉鎮市區:</strong>&nbsp{{preg_replace('/([0-9])/i','',$member->add1_dist)}}
                    </a>
                    <a class="list-group-item"><strong>戶籍地址:</strong>&nbsp{{$member->add1_street}}</a>
                    <a class="list-group-item"><strong>電子郵件:</strong>&nbsp{{$member->email}}</a>
                    <a class="list-group-item"><strong>入會/到職日期:</strong>&nbsp{{$member->date_in}}</a>
                    <a class="list-group-item"><strong>離會/離職日期:</strong>&nbsp{{$member->date_out}}</a>
                </div>
                @if($member->credit_card!=null)
                    <div role="tabpanel" class="tab-pane fade list-group" id="credit_card">
                        <a class="list-group-item"><strong>信用卡發卡銀行:</strong>&nbsp{{$member->credit_card->issue_bank}}
                        </a>
                        <a class="list-group-item"><strong>信用卡卡別:</strong>&nbsp{{$member->credit_card->type}}</a>
                        <a class="list-group-item"><strong>信用卡卡號:</strong>&nbsp{{$member->credit_card->card_id}}</a>
                        <a class="list-group-item"><strong>有效期限:</strong>&nbsp{{$member->credit_card->exp}}</a>
                        <a class="list-group-item"><strong>捐款日期-起:</strong>&nbsp{{$member->credit_card->donate_start}}
                        </a>
                        <a class="list-group-item"><strong>捐款日期-迄</strong>&nbsp{{$member->credit_card->donate_end}}</a>
                        <a class="list-group-item"><strong>捐款期間-次數:</strong>&nbsp{{$member->credit_card->donate_times}}
                        </a>
                        <a class="list-group-item"><strong>捐款方式:</strong>&nbsp{{$member->credit_card->donate_way}}</a>
                        <a class="list-group-item"><strong>承諾總金額:</strong>&nbsp{{$member->credit_card->promise_amount}}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop