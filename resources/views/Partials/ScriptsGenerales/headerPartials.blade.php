
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div style="color: #F1108C" class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>

    <!--logo start-->
    <a href="{{route('funciones')}}" class="logo"><img align="middle" style="width:180px;position:absolute" src="{{ asset('assets/img/DQ2.png') }}"></a>
    <!--logo end-->

    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">

        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>

    <!-- FILE INPUT  -->

    <link href="{{ asset('assets/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/fileinput_locale_es.js') }}" type="text/javascript"></script>



</header>

