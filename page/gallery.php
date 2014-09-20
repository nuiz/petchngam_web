<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 5/18/14
 * Time: 3:34 PM
 */
$lang = 'th';
if(isset($_COOKIE['lang'])) $lang = $_COOKIE['lang'];
$text = include("lang/{$lang}/gallery.php");
?>
<script type="text/javascript" src="fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="fancyBox/source/jquery.fancybox.js"></script>
<link type="text/css" rel="stylesheet" href="fancyBox/source/jquery.fancybox.css">
<style type="text/css">
.fancybox {
    display: block;
    float: left;
    width: 120px;
    height: 120px;
    margin: 20px 40px 0 0;
}
.fancybox:nth-child(4n){
    margin-right: 0;
}
.fancybox img {
    display: block;
    width: 100%;
}
</style>
<script type="text/javascript">
$(function(){
    $(".fancybox").fancybox({
        openEffect	: 'none',
        closeEffect	: 'none'
    });
});
</script>
<div id="page-header">
    <h2><?php echo $text['header'];?></h2>
</div>
<div class="content-wrapper clearfix">
    <div class="main-content left-main-content page-content pull-left">
        <h3 class="title-style1">
            <?php echo $text['header1'];?>
            <span class="title-block"></span>
        </h3>
        <div>
            <?php
            $pictures = Manager::getPictures('gallery_out');
            foreach($pictures as $key => $picture){
            ?>
            <a class="fancybox" rel="gallery1" href="pictures/<?php echo $picture['path'];?>" alt="">
                <img src="thumb.php?url=pictures/<?php echo $picture['path'];?>" alt=""/>
            </a>
            <?php }?>
        </div>

        <div class="clearfix"></div>
        <h3 class="title-style1">
            <?php echo $text['header2'];?>
            <span class="title-block"></span>
        </h3>
        <div>
            <?php
            $pictures = Manager::getPictures('gallery_in');
            foreach($pictures as $key => $picture){
                ?>
                <a class="fancybox" rel="gallery2" href="pictures/<?php echo $picture['path'];?>" alt="">
                    <img src="thumb.php?url=pictures/<?php echo $picture['path'];?>" alt=""/>
                </a>
            <?php }?>
        </div>

        <div class="clearfix"></div>
        <h3 class="title-style1">
            <?php echo $text['header3'];?>
            <span class="title-block"></span>
        </h3>

        <div>
            <?php
            $pictures = Manager::getPictures('gallery_room');
            foreach($pictures as $key => $picture){
                ?>
                <a class="fancybox" rel="gallery3" href="pictures/<?php echo $picture['path'];?>" alt="">
                    <img src="thumb.php?url=pictures/<?php echo $picture['path'];?>" alt=""/>
                </a>
            <?php }?>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="sidebar right-sidebar pull-right">
        <div class="widget clearfix"><h4 class="title-style3"><?php echo $text['reservations'];?><span class="title-block"></span></h4>
            <!-- BEGIN .widget-reservation-box -->
            <div class="widget-reservation-box">

                <form class="booking-form" name="bookroom"
                      action="index.php?page=reservation&step=2" method="post">

                    <input type="text" id="datefrom" name="book_date_from" value="Check In"
                           class="datepicker" readonly="readonly">
                    <input type="text" id="dateto" name="book_date_to" value="Check Out"
                           class="datepicker" readonly="readonly">

                    <div class="select-wrapper">
                        <select id="adults" name="book_room_adults">
                            <option value="0">Adults</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="select-wrapper">
                        <select id="children" class="styled" name="book_room_children">
                            <option value="0">Children</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <input class="bookbutton" type="submit" value="Check Availability">

                </form>

                <!-- END .widget-reservation-box -->
            </div>

        </div>
    </div>
</div>