@extends('template')
@section('css2')
    <script type='text/javascript' src={{ '../../js/step.js' }}></script>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="wizard">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="會員資料">
                              <span class="round-tab">
                                  <i class="glyphicon glyphicon-user"></i>
                              </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="教會名錄">
                             <span class="round-tab">
                                <i class="glyphicon glyphicon-home"></i>
                             </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="信用卡資料">
                            <span class="round-tab">
                                  <i class="glyphicon glyphicon-credit-card"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                {!! Form::open(['url'=>'member']) !!}
                <form role="form">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="step33">
                                <h5><strong>會員資料</strong></h5>
                                <hr>
                                @include('test.member')
                            </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-primary next-step">下一步</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                            <div class="step33">
                                <h5><strong>教會名錄</strong></h5>
                                <hr>
                                @include('test.church')
                            </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step">上一步</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary next-step">下一步</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">
                            <div class="step33">
                                <h5><strong>信用卡資料</strong></h5>
                                <hr>
                                @include('test.credit_card')
                            </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step">上一步</button>
                                </li>
                                <li>
                                    {!! Form::submit($where,['class'=>'btn btn-primary btn-info-full']) !!}
                                </li>

                            </ul>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
