<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ImageGalleryApp -2K18</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">

    <link rel="stylesheet" href="<?php echo e(URL::asset('fluid-gallery.css')); ?>">
    <link href="<?php echo e(URL::asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('/js/favImages.js')); ?>"></script>

    <!-- Custom styles  -->
    <style>
        body {
            padding-top: 54px;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }

        #navbarResponsive {
            background-color: #343a40 !important;
            overflow: hidden;
        }

        #navbarResponsive li {
            float: left;
            display: block;
            color: #ffffff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        #navbarResponsive li:hover {
            background-color: #21272d;
            color: #343a40;
        }

        .active {
            background-color: #4CAF50;
            color: white;
        }

        #myButtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #ff93a8;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 10px;
            font-size: 18px;
        }

        #myButtn:hover {
            background-color: #555;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #21272d;
            color: white;
            text-align: center;
        }

        .footerText {
            text-align: center;
            color: white;
            padding: 10px;
            font-size: 12px;
        }

    </style>
</head>
<body>

<div class="container gallery-container">
    <!-- Navigation -->
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container" id="navbarResponsive">
                <h1 style="color: white">Image Gallery App</h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo e(url('/home')); ?>"><h3> Home </h3></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><h3> About </h3></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo e(url('/favImages')); ?>"><h3> Favourite Images </h3></a>
                            <span class="sr-only">(current)</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><h3> Contact </h3></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12" style="padding-top: 5%;">
            <hr>
        </div>
    </div>
    <div class="tz-gallery" style=" padding-bottom: 10%">
        <div class="row">
            <div class="col-sm-12 col-md-12" id="tumbnails">
            </div>
        </div>
    </div>
    <button onclick="topFunction()" id="myButtn" title="Go to top">Top</button>
    <div class="tz-gallery" style="margin-top: 10px">
        <div class="row">
            <div class="footer">
                <p class="footerText">Designed By: Supun Ishara Weerasekara - 2018</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
<script>
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myButtn").style.display = "block";
        } else {
            document.getElementById("myButtn").style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
</body>
</html>