<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 5/18/14
 * Time: 3:34 PM
 */
$lang = 'th';
if(isset($_COOKIE['lang'])) $lang = $_COOKIE['lang'];
$text = include("lang/{$lang}/home.php");
?>
<div class="slider" style="height: 520px;">
    <a class="flex-prev"></a>
    <a class="flex-next"></a>
    <div class="slide-wrapper">
        <div class="slide-item fade-in">
            <img src="images/slide/1.jpg">
        </div>
        <div class="slide-item">
            <img src="images/slide/2.jpg">
        </div>
        <div class="slide-item">
            <img src="images/slide/3.jpg">
        </div>
    </div>
</div>
<div class="content-wrapper clearfix" style="margin-top: 30px;">
    <div>
        <div class="third-block pull-left">
            <h3 class="title-style1">
                <?php echo $text['title1'];?>
<span class="title-block"></span>
            </h3>
            <ul class="list-style1">
                <li><?php echo $text['description1'];?></li>
                <li><?php echo $text['description2'];?></li>
<!--                <li>Air conditioner</li>-->
                <li><?php echo $text['description3'];?></li>
                <li><?php echo $text['description4'];?></li>
            </ul>
        </div>
        <div class="third-block pull-left">
            <h3 class="title-style1">
                <?php echo $text['hvv_title'];?>
                <span class="title-block"></span>
            </h3>
            <ul class="list-style1">
                <li><?php echo $text['hvv1'];?></li>
                <li><?php echo $text['hvv2'];?></li>
                <li><?php echo $text['hvv3'];?></li>
                <li><?php echo $text['hvv4'];?></li>
                <li><?php echo $text['hvv5'];?></li>
                <li><?php echo $text['hvv6'];?></li>
                <li><?php echo $text['hvv7'];?></li>
                <li><?php echo $text['hvv8'];?></li>
                <li><?php echo $text['hvv9'];?></li>
                <li><?php echo $text['hvv10'];?></li>
            </ul>
        </div>
        <div class="third-block pull-left">
            <div class="widget clearfix">
                <h3 class="title-style1">
                    <?php echo $text['reservations'];?>
                    <span class="title-block"></span>
                </h3>
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
</div>
<div class="content-wrapper clearfix" style="margin-top: 30px;">
    <h3 class="title-style1">
        <?php echo $text['location'];?>
        <span class="title-block"></span>
    </h3>
    <div id="google-map" style="width: 960px; height: 340px; border: 1px solid #bf9958;"></div>
</div>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&language=th"></script>
<script type="text/javascript">
    var latlng = new google.maps.LatLng(20.404304, 99.886389);
    var myOptions = {
        zoom: 16,
        center: latlng,
        scrollwheel: true,
        scaleControl: false,
        disableDefaultUI: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    mapContent = new google.maps.Map(document.getElementById("google-map"),myOptions);
    var contentStringContent = '<div class="gmap-content"><h2>Petch Ngam Hotel</h2><p>address example</p></div>';
    var infowindowContent = new google.maps.InfoWindow({
        content: contentStringContent
    });

    var markerContent = new google.maps.Marker({
        position: latlng,
        map: mapContent
    });

    google.maps.event.addListener(markerContent, 'click', function() {
        infowindowContent.open(mapContent,markerContent);
    });
</script>