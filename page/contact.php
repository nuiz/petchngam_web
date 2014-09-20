<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 5/18/14
 * Time: 5:21 PM
 */
$lang = 'th';
if(isset($_COOKIE['lang'])) $lang = $_COOKIE['lang'];
$text = include("lang/{$lang}/contact.php");
?>
<style type="text/css">
#google-map {
    height: 275px;
    width: 100%;
    margin: 20px 0;
}
</style>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&language=th"></script>
<script type="text/javascript">
$(function(){
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
    var contentStringContent = "";
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
});
</script>

<div id="page-header">
    <h2><?php echo $text['header'];?></h2>
</div>
<div class="content-wrapper clearfix">

    <!-- BEGIN .main-content -->
    <div class="main-content left-main-content page-content pull-left">

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="http://maps.gstatic.com/intl/en_us/mapfiles/api-3/16/12/main.js" type="text/javascript"></script>

        <h3 class="title-style1"><?php echo $text['location'];?>
            <div class="title-block"></div>
        </h3>

        <div id="google-map">
        </div>
        <script type="text/javascript">

            var latlng = new google.maps.LatLng(51.523728, -0.079336);
            var myOptions = {
                zoom: 14,
                center: latlng,
                scrollwheel: true,
                scaleControl: false,
                disableDefaultUI: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            mapContent = new google.maps.Map(document.getElementById("google-map"), myOptions);
            var contentStringContent = "";
            var infowindowContent = new google.maps.InfoWindow({
                content: contentStringContent
            });

            var markerContent = new google.maps.Marker({
                position: latlng,
                map: mapContent
            });

            google.maps.event.addListener(markerContent, 'click', function () {
                infowindowContent.open(mapContent, markerContent);
            });

        </script>

        <hr class="space4">
        <h3 class="title-style1"><?php echo $text['email_us'];?>
            <div class="title-block"></div>
        </h3>
        <div class="wpcf7" id="wpcf7-f152-p38-o1">
            <form action="" method="post" class="wpcf7-form"
                  novalidate="novalidate">
                <div style="display: none;">
                    <input type="hidden" name="_wpcf7" value="152">
                    <input type="hidden" name="_wpcf7_version" value="3.5.2">
                    <input type="hidden" name="_wpcf7_locale" value="en_US">
                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f152-p38-o1">
                    <input type="hidden" name="_wpnonce" value="f246ec6feb">
                </div>
                <p><?php echo $text['your_name'];?><br>
                    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value=""
                                                                           size="40"
                                                                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                           aria-required="true"></span></p>

                <p><?php echo $text['your_email'];?><br>
                    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value=""
                                                                            size="40"
                                                                            class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                                            aria-required="true"></span></p>

                <p><?php echo $text['subject'];?><br>
                    <span class="wpcf7-form-control-wrap your-subject"><input type="text" name="your-subject" value=""
                                                                              size="40"
                                                                              class="wpcf7-form-control wpcf7-text"></span>
                </p>

                <p><?php echo $text['your_message'];?><br>
                    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10"
                                                                                 class="wpcf7-form-control wpcf7-textarea"></textarea></span>
                </p>

                <p><input type="submit" value="<?php echo $text['send'];?>" class="wpcf7-form-control wpcf7-submit btn"><img class="ajax-loader"
                                                                                                  src="http://themes.quitenicestuff.com/sohohotelwp/wp-content/plugins/contact-form-7/images/ajax-loader.gif"
                                                                                                  alt="Sending ..."
                                                                                                  style="visibility: hidden;">
                </p>

                <div class="wpcf7-response-output wpcf7-display-none"></div>
            </form>
        </div>


        <!-- END .main-content -->
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
    <!-- END .content-wrapper -->
</div>
<script type="text/javascript">
$(function(){
    //jQuery(".datepicker").datepicker();
});
</script>