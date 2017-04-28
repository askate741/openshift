<nav class="navbar navbar-default navbar-static-top " id="header_background">
    <div class="container">
        <div class="navbar-header div_shadow">{{--圖片區--}}

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse" style="margin:13px;">
                <span class="sr-only">切換導航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a id="header_img" class="navbar-brand" href="{{ url('/') }}">
                {{--{{ config('app.name', 'Laravel') }}--}}
                <img src="{{ '../../img/tcrm.png' }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
        {{--<ul class="nav navbar-nav">--}}
        {{--&nbsp;--}}
        {{--</ul>--}}

        <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right div_word" style="margin-top: 3px;">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登入</a></li>
                    <li><a href="{{ url('/register') }}">註冊</a></li>
                @else
                    <li class="dropdown header_word" {{--style="margin-top: 1px;"--}}>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <span class="glyphicon glyphicon-th"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" style="right:-87px">
                            {{--九宮格--}}
                            <div id="jiugongge_menu" class="clear_bl_black">
                                <table>
                                    <tr>
                                        <td><a href="{{url("/account")}}"> <img src="{{ '../../img/account.png' }}"
                                                ><span>帳務表</span></a>
                                        </td>
                                        <td><a href="{{url("/course")}}"><img src="{{ '../../img/course.png' }}"
                                                ><span>課程表</span></a>
                                        </td>
                                        <td><a href="{{url("/course_registration")}}"><img
                                                        src="{{ '../../img/course_registration.png' }}"
                                                ><span>修課紀錄</span></a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{url("/account_class")}}"><img
                                                        src="{{ '../../img/account_class.png' }}"
                                                ><span>會計科目</span></a>
                                        </td>
                                        <td><a href="{{url("/product_order")}}"><img
                                                        src="{{ '../../img/product_order.png' }}"
                                                ><span>產品項目</span></a>
                                        </td>
                                        <td><a href="{{url("/church")}}"><img src="{{ '../../img/church.png' }}"
                                                ><span>教會名錄</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href={{url("/member")}}><img src="{{ '../../img/members.png' }}"
                                                ><span>會員資料</span></a>
                                        </td>
                                        <td><a href={{url("/pdf/create")}}><img src="{{ '../../img/pdf.png' }}"
                                                ><span>奉獻收據</span></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="popup-triangl-back" style="left: 200px"></div>
                            <div class="popup-triangl-frent" style="left: 200px"></div>
                            <li id="list_menu" class="clear_bl_black">
                                <a href="{{url("/account")}}"><span>帳務表</span></a>
                                <a href="{{url("/course")}}"><span>課程表</span></a>
                                <a href="{{url("/course_registration")}}"><span>修課紀錄</span></a>
                                <a href="{{url("/account_class")}}"><span>會計科目</span></a>
                                <a href="{{url("/product_order")}}"><span>產品項目</span></a>
                                <a href="{{url("/church")}}"><span>教會名錄</span></a>
                                <a href={{url("/member")}}><span>會員資料</span></a>
                                <a href={{url("/pdf/create")}}><span>奉獻收據</span></a>
                            </li>{{--一開始隱藏，此列為RWD選單--}}
                        </ul>
                    </li>
                    <li class="dropdown header_word">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" style="right:9px">
                            <li>
                                <div id="RWD_padding_user" class="clear_bl_black">
                                    <a> {{ Auth::user()->name }} </a>
                                    <a> {{ Auth::user()->email }} </a>
                                </div>
                                <a  id="RWD_a_sign_out" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    登出
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <div class="popup-triangl-back" style="left: 165px"></div>
                                <div class="popup-triangl-frent" style="left: 165px"></div>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>