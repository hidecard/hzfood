<head>
    <!-- Existing CSS and JS includes -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
    @include('admin.part.header')
    @include('admin.part.top_nav')

    <div id="layoutSidenav">
        @include('admin.part.side_nav')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('admin.part.footer')
        </div>
    </div>

    <!-- Existing JS includes -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</body>
