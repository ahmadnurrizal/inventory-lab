<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    @yield('assets_css')
</head>

<body style="min-height:100vh">
    @include('sweetalert::alert')
    <img src="{{asset('img/bg/Group 38.png')}}" alt="" style="position:absolute;right:0;z-index:-1">
    <div id="mySidebar" class="sidebar">
        <a class="text-center p-0" style="margin-bottom:50px;border:none;">
            <h1 style="color:white">Inventory</h1>
            <h1 style="color:white">Lab</h1>
        </a>
        <ul style="padding-left:0px">
            <li><a href="{{route('admin.dashboard')}}"
                    class="{{ (request()->is('admin/dashboard*')) ? 'active' : '' }}"><i
                        class="bi bi-house"></i>&nbsp;&nbsp;&nbsp;Dashboard</a></li>
            <li><a href="#">General</a></li>
            <ul>
                <li><a href="{{route('item.index')}}" class="{{ (request()->is('item*')) ? 'active' : '' }}"><i
                            class="bi bi-box-seam"></i>&nbsp;&nbsp;&nbsp;Items</a></li>
                <li><a href="{{route('borrowing.index')}}"
                        class="{{ (request()->is('borrowing*')) ? 'active' : '' }}"><i
                            class="bi bi-box-arrow-down"></i>&nbsp;&nbsp;&nbsp;Borrowing</a></li>
                <li><a href="{{route('returning.index')}}"
                        class="{{ (request()->is('returning*')) ? 'active' : '' }}"><i
                            class="bi bi-box-arrow-in-up"></i>&nbsp;&nbsp;&nbsp;Returning</a></li>
            </ul>
            <li><a href="#">Administrator</a></li>
            <ul>
                <li><a href="{{route('backendUser.index')}}"
                        class="{{ (request()->is('backendUser*')) ? 'active' : '' }}"><i
                            class="bi bi-person-badge"></i>&nbsp;&nbsp;&nbsp;Backend User</a></li>
                <li><a href="{{route('borrower.index')}}" class="{{ (request()->is('borrower*')) ? 'active' : '' }}"><i
                            class="bi bi-person-circle"></i>&nbsp;&nbsp;&nbsp;Borrower</a></li>
                <li><a href="#"><i class="bi bi-receipt"></i>&nbsp;&nbsp;&nbsp;Report</a></li>
            </ul>
        </ul>
        <button href="#" class="logout-btn">Logout&nbsp;&nbsp;&nbsp;<i class="bi bi-door-closed"></i></button>
    </div>

    <div id="main">
        <button class="sidebar-toggle" onclick="closeNav()" id="sidebar-btn">&#9776;</button>
        <div class="main-title">
            <p>Home</p>
        </div>
        <div class="main-container">
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="{{asset('js/global.js')}}" charset="utf-8"></script>
    @yield('assets_js')
</body>

</html>
