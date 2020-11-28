<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="utf-8" />
        <META NAME="robots" CONTENT="index, follow">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="keywords" content="@yield('keywords')">
		<meta name="description" content="@yield('metaDescription')">
		
		<link rel="icon" href="/logo.png" type="image/png">
        <!-- css -->
        <!-- font-awesome icons -->
        <link rel="stylesheet" href="/theme-one/css/font-awesome.min.css" />
        <!-- //font-awesome icons -->
        <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700" rel="stylesheet" />
        <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
        <link rel="stylesheet" href="/theme-one/css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="/theme-one/css/bootstrap.min.css" type="text/css" media="all" />
        <!-- Default-JavaScript-File -->
        <script type="text/javascript" src="/theme-one/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="/theme-one/js/bootstrap.min.js"></script>
        <!-- //Default-JavaScript-File -->
    </head>
    <body>
        
        @yield('content')
        
        <!-- footer -->
        @yield('footer')
        <!-- //footer -->
        
        <script src="/theme-one/js/bars.js"></script>
        <!-- start-smoth-scrolling -->
        <script src="/theme-one/js/SmoothScroll.min.js"></script>
        <!-- text-effect -->
        <script type="text/javascript" src="/theme-one/js/jquery.transit.js"></script>
        <script type="text/javascript" src="/theme-one/js/jquery.textFx.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".test").textFx({
                    type: "fadeIn",
                    iChar: 100,
                    iAnim: 1000,
                });
            });
        </script>
        <!-- //text-effect -->
        <!-- menu-js -->
        <script src="/theme-one/js/modernizr.js"></script>
        <script src="/theme-one/js/menu.js"></script>
        <!-- //menu-js -->

        <script type="text/javascript" src="/theme-one/js/move-top.js"></script>

        <script type="text/javascript" src="/theme-one/js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $("html,body").animate({ scrollTop: $(this.hash).offset().top }, 1000);
                });
            });
        </script>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript">
            $(document).ready(function () {
                /*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

                $().UItoTop({ easingType: "easeOutQuart" });
            });
        </script>
        @yield('pageScripts')
    </body>
</html>
