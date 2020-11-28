<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>
        <META NAME="robots" CONTENT="index, follow">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="keywords" content="@yield('keywords')">
		<meta name="description" content="@yield('metaDescription')">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
        <link href="/theme-two/css/aos.css" rel="stylesheet" />
        <link href="/theme-two/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/theme-two/styles/main.css" rel="stylesheet" />
    </head>
    <body id="top">
        <header>
            <div class="profile-page sidebar-collapse">
                <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
                    <div class="container">
                        <div class="navbar-translate">
                            <a class="navbar-brand" href="/home" rel="tooltip">Theme Two</a>
                            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#skill">Skills</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">Experience</a></li>
                                <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        @yield('content')
        <footer class="footer">
            <div class="container text-center">
                <a class="cc-facebook btn btn-link" href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a><a class="cc-twitter btn btn-link" href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                <a class="cc-google-plus btn btn-link" href="#"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a><a class="cc-instagram btn btn-link" href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
            </div>
            <div class="h4 title text-center">@yield('name')</div>
            <div class="text-center text-muted">
                <p>
                    &copy; Creative CV. All rights reserved.<br />
                    Design - <a class="credit" href="https://templateflip.com" target="_blank">TemplateFlip</a>
                </p>
            </div>
        </footer>
        <script src="/theme-two/js/core/jquery.3.2.1.min.js"></script>
        <script src="/theme-two/js/core/popper.min.js"></script>
        <script src="/theme-two/js/core/bootstrap.min.js"></script>
        <script src="/theme-two/js/now-ui-kit.js?v=1.1.0"></script>
        <script src="/theme-two/js/aos.js"></script>
        <script src="scripts/main.js"></script>
        @yield('pageScripts')
    </body>
</html>
