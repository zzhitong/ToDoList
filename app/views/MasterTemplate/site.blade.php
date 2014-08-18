<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <script type="text/javascript" src="bootstrap/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/Validator.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="bootstrap/datepicker/css/datepicker.css" />
</head>
<body>
<div class="navbar navbar-inverse navbar-static-right">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="/todolist/public">ToDo List</a>
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav-collapse collapse">
                <ul class="nav" id="NavApp">
                    <li id="li_Home"><a href="/todolist/public">Home</a></li>
                    <li id="li_About"><a href="/todolist/public/About">About</a></li>
                    <li id="li_Contact"><a href="/todolist/public/Contact">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container">
    @yield('mainContent')
</div>
<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <p class="navbar-text pull-left">Site is updated by ZZ</p>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var url = window.location.href;
        if(url.indexOf('/todolist/public/Contact') > 1)
            $('#li_Contact').addClass('active');
        else if(url.indexOf('/todolist/public/About') > 1)
            $('#li_About').addClass('active');
        else
            $('#li_Home').addClass('active');

    });

</script>
</body>
</html>