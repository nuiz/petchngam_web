<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nuiz
 * Date: 7/4/2557
 * Time: 21:43 น.
 * To change this template use File | Settings | File Templates.
 */
$page = isset($_GET['page'])? $_GET['page']: 'index';
$path = 'page/'.$page.'.php';
if(!file_exists($path)){
    header('HTTP/1.0 404 Not Found');
    exit();
}

include_once 'Manager.php';

$lang = 'th';
if(isset($_COOKIE['lang'])) $lang = $_COOKIE['lang'];
$textTP = include("lang/{$lang}/index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $textTP['title'];?></title>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js?ver=3.6'></script>

    <script type='text/javascript' src='js/scripts.js'></script>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/main-slide.css">
    <link rel="stylesheet" href="css/main2.css">

    <script type="text/javascript"></script>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <div class="topbar">
            <div class="text-right">
                <span class="contact">
                    <i class="glyphicon glyphicon-earphone"></i>
                    +669 3048 0569, 053 646 765
                </span>
                <span class="contact">
                    <i class="glyphicon glyphicon-envelope"></i>
                    phetngamhotel@hotmail.com
                </span>
                <a href="swaplang.php?lang=th"><img src="images/icon_th.png"></a>
                <a href="swaplang.php?lang=en"><img src="images/icon_en_o.jpg"></a>
            </div>
        </div>
        <div class="header">
            <div class="content-wrapper clearfix">
                <div class="logo">
                    <h1><?php echo $textTP['title'];?></h1>
                    <small><?php echo $textTP['small'];?></small>
                </div>
                <ul class="main-nav">
                    <li><a href="index.php"><strong><?php echo $textTP['welcome'];?></strong></a></li>
                    <li><a href="index.php?page=gallery"><strong><?php echo $textTP['gallery'];?></strong></a></li>
                    <li><a href="index.php?page=room"><strong><?php echo $textTP['room'];?></strong></a></li>
                    <li><a href="index.php?page=contact"><strong><?php echo $textTP['contact'];?></strong></a></li>
                </ul>
            </div>
        </div>
        <div class="body">
            <?php
            include($path);
            ?>
        </div>
        <div class="footer">
            <div class="content-wrapper clearfix">
                <div class="pull-right" style="width: 218px;">
                    <h4 class="title-style2">Social Media<span class="title-block"></span></h4>
                    <ul class="social-icons clearfix" style="list-style: none; padding: 0;">
                        <li><a target="_blank" href="https://www.facebook.com/pages/%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B9%81%E0%B8%A3%E0%B8%A1%E0%B9%80%E0%B8%9E%E0%B8%8A%E0%B8%A3%E0%B8%87%E0%B8%B2%E0%B8%A1-%E0%B8%AD%E0%B9%81%E0%B8%A1%E0%B9%88%E0%B8%AA%E0%B8%B2%E0%B8%A2/1443888639157679"><span class="facebook-icon"></span></a></li>
                        <li><a target="_blank"><span class="twitter-icon"></span></a></li>
                        <li><a target="_blank"><span class="pinterest-icon"></span></a></li>
                        <li><a target="_blank"><span class="gplus-icon"></span></a></li>
                        <li><a target="_blank"><span class="linkedin-icon"></span></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div id="footer-bottom" class="clearfix">

                    <p class="fl">© 2014 Ispin.</p>

                    <!--
                    <nav class="secondary-navigation">
                        <ul class="fr">
                            <li><a href="accommodation.html">Accommodation</a><span>/</span></li>
                            <li><a href="booking1.html">Book Now</a><span>/</span></li>
                            <li><a href="contact.html">Directions &amp; Map</a><span>/</span></li>
                        </ul>
                    </nav>
                    -->

                    <!-- END #footer-bottom -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    var wrapper = $('.slider');
    $('.slider .flex-next').click(function(e){
        e.preventDefault();
        var now = $('.slide-item.fade-in', wrapper);
        var next = now.next();
        if(next.size()==0){
            next = $('.slide-item:first', wrapper);
        }
        now.removeClass('fade-in');
        next.addClass('fade-in');
    });

    $('.slider .flex-prev').click(function(e){
        e.preventDefault();
        var now = $('.slide-item.fade-in', wrapper);
        var prev = now.prev();
        if(prev.size()==0){
            prev = $('.slide-item:last', wrapper);
        }
        now.removeClass('fade-in');
        prev.addClass('fade-in');
    });
});
</script>
</body>
</html>