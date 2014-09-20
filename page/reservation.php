<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 5/25/14
 * Time: 5:26 PM
 */
Class ReservationForm {
    public $step = 1;
    protected $attributes = array();
    public function __construct($attributes, $step){
        $this->attributes = array_merge($this->attributes, $attributes);
        $this->setStep($step);
    }

    public function getAll(){
        return $this->attributes;
    }

    public function get($name){
        return $this->attributes[$name];
    }

    /**
     * @param int $step
     */
    public function setStep($step)
    {
        $this->step = $step;
    }

    /**
     * @return int
     */
    public function getStep()
    {
        return $this->step;
    }
}

$step = isset($_GET['step'])? $_GET['step']: 1;
$form = new ReservationForm($_POST, $step);

if($_SERVER['REQUEST_METHOD']=='POST' && $form->getStep()==4){
    $params = $_POST;
    $params['book_date_from'] = Manager::convertDate($_POST['book_date_from']);
    $params['book_date_to'] = Manager::convertDate($_POST['book_date_to']);
    $result = Manager::booking($params);
    if(!isset($result['error'])){
        echo <<<HTML
<script type="text/javascript">
window.location = window.location.href+'&success=1';
</script>
HTML;
        exit();
    }
}
?>
<style type="text/css">
    .page-content .booking-side .title-style4, .page-content .booking-main .title-style4 {
        margin: 0 0 30px 0;
        font-size: 14px;
    }
    .page-content h4 {
        font-size: 16px;
        margin: 0 0 15px 0;
    }
    .title-style4 {
        position: relative;
        padding: 0 0 12px 0;
        margin: 0 0 30px 0;
        font-size: 14px;
        color: #fff;
    }

    .title-block, .button1:hover, .button4:hover, .button5:hover, .button2, .wpcf7-submit, #submit, .button3, .button6, #footer .button1, .page-content table th, .event-month, .key-selected-icon, .dark-notice, .booking-main input[type="submit"], .home-reservation-box input[type="submit"], .widget-reservation-box input[type="submit"], .booking-side input[type="submit"], .ui-datepicker-calendar tbody tr td a:hover, #open_datepicker .ui-datepicker-calendar .dp-highlight .ui-state-default, .step-icon-current, .pagination-wrapper .selected, .pagination-wrapper a:hover, .wp-pagenavi .current, .wp-pagenavi a:hover, .tagcloud a:hover, a.button0, .more-link, .nsu-submit:hover, #footer .nsu-submit, .nsu-submit:hover, #footer .nsu-submit {
        background: #bf9958;
    }

    .title-block {
        width: 48px;
        height: 3px;
        display: block;
        position: absolute;
        left: 0;
        bottom: -3px;
    }

    .booking-side li, .booking-main li {
        list-style: none;
    }

    .dark-wrapper .blog-entry-inner h4 span, .dark-wrapper .event-entry-inner h4 span, .room-list-wrapper .room-item, .price-breakdown-open, .dark-wrapper .title-style1, .space7, .space8, .booking-side ul li, .price-details, .ui-datepicker-calendar thead tr th, #language-selection li li a, .price-details .price-breakdown, #open_datepicker .ui-datepicker-group-first, .contact_details_list_dark li, .room-price-widget, .dark-wrapper .testimonial-wrapper, #footer-bottom {
        border-color: #424242;
    }

    .page-content ul li {
        border-bottom: 1px solid;
        font-size: 14px;
        padding: 0 0 14px 0;
        margin: 0 0 14px 0;
        line-height: 130%;
    }

    .list-style2 li, .sidebar li, .page-content li {
        /* list-style-image: url(images/list2.png); */
        list-style-position: outside;
    }

    .page-content ul {
        padding: 0;
    }

    .room-list-wrapper .room-item {
        margin: 0 0 20px 0;
        padding: 20px 0 0 0;
        border-top: 1px solid;
        border-bottom: none;
    }

    .room-list-wrapper h5 {
        color: #fff;
        font-size: 14px;
        margin: 0 0 20px 0;
        text-transform: none;
    }

    .room-list-left img {
        width: 100%;
    }

    .dark-wrapper .blog-entry-inner h4 span, .dark-wrapper .event-entry-inner h4 span, .booking-side ul li span, .room-list-right .room-meta li span, .room-price .price, .price-breakdown-display span, .dark-wrapper .testimonial-author, .price-details .deposit, .price-details .total, .price-details .total-only, .contact_details_list_dark li strong, .room-price-widget .from, .room-price-widget .price-detail, #footer .tweets li span, #footer .tweets li a {
        color: #8b8b8b;
    }

    .room-price {
        color: #fff;
    }

    .room-price {
        float: right;
    }

    .room-list-left {
        float: left;
        width: 24%;
    }

    .room-list-right {
        float: right;
        width: 72%;
    }

    .room-list-right .room-meta {
        float: left;
    }

    .booking-main input[type="submit"] {
        color: #fff;
        font-size: 14px;
        border: none;
        text-align: center;
        cursor: pointer;
    }

    .room-list-wrapper .room-item {
        margin: 0 0 20px 0;
        padding: 20px 0 0 0;
        border-top: 1px solid;
    }

    .input-left {
        float: left;
        width: 48%;
    }

    .input-right {
        float: right;
        width: 48%;
    }

    .booking-main label {
        color: #fff;
    }

    ul.contact_details_list li {
        font-size: 14px;
        list-style: none;
        display: block;
        min-height: 36px;
        border-bottom: #e8e8e8 1px solid;
        position: relative;
        padding: 0 0 0 45px;
        margin: 0 0 20px 0;
    }
</style>
<style type="text/css">
    .step-wrapper {
        width: 200px;
        float: left;
        margin: 0 50px 0 0;
    }

    .step-icon {
        color: #fff;
        font-size: 18px;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        border-radius: 99%;
        margin: 0 auto;
        z-index: 2;
        position: relative;
    }

    .step-icon-current {
        background: #bf9958;
    }

    .step-icon-wrapper {
        background: #fff;
        width: 80px;
        margin: 0 auto;
        z-index: 2;
        position: relative;
    }

    .step-title {
        font-size: 14px;
        width: 100%;
        text-align: center;
        margin: 14px 0 0 0;
        line-height: 130%;
    }

    .booking-step-wrapper {
        position: relative;
        margin: 0 0 40px 0;
    }

    .step-line {
        background: #e8e8e8;
        height: 1px;
        width: 85%;
        margin: 0 auto;
        position: relative;
        top: 19px;
        z-index: 1;
    }

    .last-col {
        margin-right: 0;
    }

    #page-header {
        margin: 0;
    }

    .footer {
        margin: 0;
    }
</style>
<style type="text/css">
    #navigation .current-menu-item, #navigation .current_page_item, #navigation li:hover, blockquote, .button1:hover, .button4:hover, .button5:hover, .button2, .wpcf7-submit, #submit, .button3, .button6, #footer .button1, .ui-tabs .ui-tabs-nav li.ui-state-active, .widget-reservation-box, .booking-side, .booking-main, #slider .home-reservation-box, #slider-full .home-reservation-box, #ui-datepicker-div, .pagination-wrapper .selected, .pagination-wrapper a:hover, .wp-pagenavi .current, .wp-pagenavi a:hover, .tagcloud a:hover, .nsu-submit:hover, #footer .nsu-submit, .nsu-submit:hover, #footer .nsu-submit {
        border-color: #bf9958;
    }

    .title-block, .button1:hover, .button4:hover, .button5:hover, .button2, .wpcf7-submit, #submit, .button3, .button6, #footer .button1, .page-content table th, .event-month, .key-selected-icon, .dark-notice, .booking-main input[type="submit"], .home-reservation-box input[type="submit"], .widget-reservation-box input[type="submit"], .booking-side input[type="submit"], .ui-datepicker-calendar tbody tr td a:hover, #open_datepicker .ui-datepicker-calendar .dp-highlight .ui-state-default, .step-icon-current, .pagination-wrapper .selected, .pagination-wrapper a:hover, .wp-pagenavi .current, .wp-pagenavi a:hover, .tagcloud a:hover, a.button0, .more-link, .nsu-submit:hover, #footer .nsu-submit, .nsu-submit:hover, #footer .nsu-submit {
        background: #bf9958;
    }

    .booking-side-wrapper {
        width: 35%;
        float: left;
        color: #fff;
    }

    .booking-side {
        border-bottom: 5px solid;
        padding: 30px;
    }

    .booking-main-wrapper {
        width: 63%;
        float: right;
    }

    .booking-main {
        border-bottom: 5px solid;
        padding: 30px;
    }
</style>
<div id="page-header">
    <h2>Reservation</h2>
</div>
<div style="background: white; padding: 40px 0;">
    <div class="content-wrapper">
        <div class="booking-step-wrapper clearfix">
            <div class="step-wrapper">
                <div class="step-icon-wrapper">
                    <div class="step-icon <?php if($form->getStep()==1) echo "step-icon-current";?>">1</div>
                </div>
                <div class="step-title">Choose Your Date</div>
            </div>

            <div class="step-wrapper">
                <div class="step-icon-wrapper">
                    <div class="step-icon <?php if($form->getStep()==2) echo "step-icon-current";?>">2</div>
                </div>
                <div class="step-title">Choose Your Room</div>
            </div>

            <div class="step-wrapper">
                <div class="step-icon-wrapper">
                    <div class="step-icon <?php if($form->getStep()==3) echo "step-icon-current";?>">3</div>
                </div>
                <div class="step-title">Place Your Reservation</div>
            </div>

            <div class="step-wrapper last-col">
                <div class="step-icon-wrapper">
                    <div class="step-icon <?php if($form->getStep()==4) echo "step-icon-current";?>">4</div>
                </div>
                <div class="step-title">Confirmation</div>
            </div>

            <div class="step-line"></div>

            <!-- END .booking-step-wrapper -->
        </div>
        <div class="clearfix"></div>
    </div>
    <div>
        <div class="content-wrapper page-content">
            <?php if($form->getStep()==1){ ?>
                <form method="post" class="reservation-form" action="?page=reservation&step=2">
                <!-- BEGIN .booking-main-wrapper -->
                <div class="booking-main-wrapper">

                    <!-- BEGIN .booking-main -->
                    <div class="booking-main">

                        <div class="dark-notice calendar-notice"><p>Please select your dates from the calendar</p></div>

                        <div id="open_datepicker"></div>

                        <div class="clearboth"></div>

                        <div class="datepicker-key clearfix">

                            <div class="key-unavailable-wrapper clearfix">
                                <div class="key-unavailable-icon"></div>
                                <div class="key-unavailable-text">Unavailable</div>
                            </div>

                            <div class="key-available-wrapper clearfix">
                                <div class="key-available-icon"></div>
                                <div class="key-available-text">Available</div>
                            </div>

                            <div class="key-selected-wrapper clearfix">
                                <div class="key-selected-icon"></div>
                                <div class="key-selected-text">Selected Dates</div>
                            </div>

                        </div>

                        <!-- END .booking-main -->
                    </div>

                    <!-- END .booking-main-wrapper -->
                </div>


                    <!-- BEGIN .booking-side-wrapper -->
                    <div class="booking-side-wrapper">

                        <!-- BEGIN .booking-side -->
                        <div class="booking-side">

                            <h4 class="title-style4">Your Reservation<span class="title-block"></span></h4>

                            <form class="booking-form" name="bookroom" action="http://themes.quitenicestuff.com/sohohotelwp/booking-step2" method="post">

                                <div class="clearfix">

                                    <div class="one-half-form">
                                        <label for="datefrom">Check In</label>
                                        <input name="datefrom" type="text" id="datefrom" size="10" class="datepicker2" value="<?php echo $_POST['book_date_from'];?>">
                                    </div>

                                    <div class="one-half-form last-col">
                                        <label for="dateto">Check Out</label>
                                        <input name="dateto" type="text" id="dateto" size="10" class="datepicker2" value="<?php echo $_POST['book_date_to'];?>">
                                    </div>

                                </div>

                                <hr class="space8" />

                                <label for="book_room">Rooms</label>
                                <div class="select-wrapper">
                                    <select name="room_qty" id="room_qty">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>

                                <!-- BEGIN .rooms-wrapper -->
                                <div class="rooms-wrapper">

                                    <!-- BEGIN .room-0 -->
                                    <div class="room-0 clearfix">
                                        <hr class="space8" />
                                        <div class="one-third-form">
                                            <label for="room_adults_0">Adults</label>
                                            <div class="select-wrapper">
                                                <select name="room_adults_0" id="room_adults_0">
                                                    <option value="0">0</option>
                                                    <option value="1" selected>1</option>
                                                    <option value="2" >2</option>
                                                    <option value="3" >3</option>
                                                    <option value="4" >4</option>
                                                    <option value="5" >5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="one-third-form last-col">
                                            <label for="room_children_0">Children</label>
                                            <div class="select-wrapper">
                                                <select name="room_children_0" id="room_children_0">
                                                    <option value="0">0</option>
                                                    <option value="1" >1</option>
                                                    <option value="2" >2</option>
                                                    <option value="3" selected>3</option>
                                                    <option value="4" >4</option>
                                                    <option value="5" >5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- BEGIN .room-0 -->
                                    </div>

                                    <!-- BEGIN .room-1 -->
                                    <div class="room-1 clearfix">
                                        <hr class="space8" />
                                        <p class="label">Room 1</p>
                                        <div class="one-third-form">
                                            <label for="room_adults_1">Adults</label>
                                            <div class="select-wrapper">
                                                <select name="room_adults_1" id="room_adults_1">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="one-third-form last-col">
                                            <label for="room_children_1">Children</label>
                                            <div class="select-wrapper">
                                                <select name="room_children_1" id="room_children_1">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- BEGIN .room-1 -->
                                    </div>

                                    <!-- BEGIN .room-2 -->
                                    <div class="room-2 clearfix">
                                        <hr class="space8" />
                                        <p class="label">Room 2</p>
                                        <div class="one-third-form">
                                            <label for="room_adults_2">Adults</label>
                                            <div class="select-wrapper">
                                                <select name="room_adults_2" id="room_adults_2">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="one-third-form last-col">
                                            <label for="room_children_2">Children</label>
                                            <div class="select-wrapper">
                                                <select name="room_children_2" id="room_children_2">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- BEGIN .room-2 -->
                                    </div>

                                    <!-- BEGIN .room-3 -->
                                    <div class="room-3 clearfix">
                                        <hr class="space8" />
                                        <p class="label">Room 3</p>
                                        <div class="one-third-form">
                                            <label for="room_adults_3">Adults</label>
                                            <div class="select-wrapper">
                                                <select name="room_adults_3" id="room_adults_3">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="one-third-form last-col">
                                            <label for="room_children_3">Children</label>
                                            <div class="select-wrapper">
                                                <select name="room_children_3" id="room_children_3">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- BEGIN .room-3 -->
                                    </div>

                                    <!-- BEGIN .rooms-wrapper -->
                                </div>

                                <hr class="space8" />

                                <input type="hidden" name="submit" value="submit" />
                                <input class="bookbutton" type="submit" value="Check Availability" />

                            </form>

                            <!-- BEGIN .booking-side -->
                        </div>

                        <!-- BEGIN .booking-side-wrapper -->
                    </div>

                    <div class="clearfix"></div>
                </form>
            <?php }else if($form->getStep()==2){?>
                <div>
                    <!-- BEGIN .booking-main-wrapper -->
                    <div class="booking-main-wrapper">

                    <!-- BEGIN .booking-main -->
                    <div class="booking-main">

                    <h4 class="title-style4">
                        Choose Your Room<span class="title-block"></span>
                    </h4>


                    <!-- BEGIN .room-list-wrapper -->
                    <ul class="room-list-wrapper clearfix">


                        <!-- BEGIN .room-item -->
                        <li class="room-item clearfix">

                            <h5>Single Bed Room</h5>

                            <!-- BEGIN .room-list-left -->
                            <div class="room-list-left">
                                <img src="images/room/single/01.jpg" alt="" />									<!-- END .room-list-left -->
                            </div>

                            <!-- BEGIN .room-list-right -->
                            <div class="room-list-right">

                                <!-- BEGIN .room-meta -->
                                <div class="room-meta">
                                    <ul>
                                        <li><span>Occupancy:</span> 10 Person(s)</li>
                                        <li><span>Size:</span> 35-40sqm / 375-430sqf</li>
                                        <li><span>View:</span> City</li>
                                    </ul>
                                    <!-- END .room-meta -->
                                </div>

                                <!-- BEGIN .room-price -->
                                <div class="room-price">

                                    <p class="price">From: <span>450 Bath</span> / Night</p>

                                    <!-- END .room-price -->
                                </div>

                                <div class="clearfix"></div>

                                <!-- BEGIN .bookroom -->
                                <form class="reservation-form" name="bookroom" action="?page=reservation&step=3" method="post">
                                    <input type="hidden" name="room_type" value="Single Bed Room">
                                    <input type="submit" value="Select Single Bed Room">
                                </form>

                                <!-- END .room-list-right -->
                            </div>

                            <!-- END .room-item -->
                        </li>

                        <!-- BEGIN .room-item -->
                        <li class="room-item clearfix">

                            <h5>Twin Bed Room</h5>

                            <!-- BEGIN .room-list-left -->
                            <div class="room-list-left">
                                <img src="images/room/twin/01.jpg" alt="" />									<!-- END .room-list-left -->
                            </div>

                            <!-- BEGIN .room-list-right -->
                            <div class="room-list-right">

                                <!-- BEGIN .room-meta -->
                                <div class="room-meta">
                                    <ul>
                                        <li><span>Occupancy:</span> 10 Person(s)</li>
                                        <li><span>Size:</span> 35-40sqm / 375-430sqf</li>
                                        <li><span>View:</span> City</li>
                                    </ul>
                                    <!-- END .room-meta -->
                                </div>


                                <!-- BEGIN .room-price -->
                                <div class="room-price">

                                    <p class="price">From: <span>750 Bath</span> / Night</p>

                                    <!-- END .room-price -->
                                </div>

                                <div class="clearfix"></div>

                                <!-- BEGIN .bookroom -->
                                <form class="reservation-form" name="bookroom" action="?page=reservation&step=3" method="post">
                                    <input type="hidden" name="room_type" value="Twin Bed Room">
                                    <input type="submit" value="Select Twin Bed Room">
                                </form>

                                <!-- END .room-list-right -->
                            </div>

                            <!-- END .room-item -->
                        </li>

                        <!-- BEGIN .room-item -->
                        <li class="room-item clearfix">

                            <h5>VIP Room</h5>

                            <!-- BEGIN .room-list-left -->
                            <div class="room-list-left">
                                <img src="images/room/vip/01.jpg" alt="" />									<!-- END .room-list-left -->
                            </div>

                            <!-- BEGIN .room-list-right -->
                            <div class="room-list-right">

                                <!-- BEGIN .room-meta -->
                                <div class="room-meta">
                                    <ul>
                                        <li><span>Occupancy:</span> 10 Person(s)</li>
                                        <li><span>Size:</span> 35-40sqm / 375-430sqf</li>
                                        <li><span>View:</span> City</li>
                                    </ul>
                                    <!-- END .room-meta -->
                                </div>


                                <!-- BEGIN .room-price -->
                                <div class="room-price">

                                    <p class="price">From: <span>1100 Bath</span> / Night</p>

                                    <!-- END .room-price -->
                                </div>

                                <div class="clearfix"></div>

                                <!-- BEGIN .bookroom -->
                                <form class="reservation-form" name="bookroom" action="?page=reservation&step=3" method="post">
                                    <input type="hidden" name="room_type" value="VIP Room">
                                    <input type="submit" value="Select VIP Room">
                                </form>

                                <!-- END .room-list-right -->
                            </div>

                            <!-- END .room-item -->
                        </li>




                    <!-- END .room-list-wrapper -->
                    </ul>



                    <!-- BEGIN .booking-main -->
                    </div>

                    <!-- BEGIN .booking-main-wrapper -->
                    </div>

                    <!-- BEGIN .booking-side-wrapper -->
                    <div class="booking-side-wrapper">

                        <!-- BEGIN .booking-side -->
                        <div class="booking-side clearfix">

                            <h4 class="title-style4">Your Reservation<span class="title-block"></span></h4>

                            <!-- BEGIN .display-reservation -->
                            <div class="display-reservation">
                                <ul>
                                    <li><span>Check In: </span> <?php echo $_POST['book_date_from'];?></li>
                                    <li><span>Check Out: </span> <?php echo $_POST['book_date_to'];?></li>
                                    <li><span>Guests: </span> <?php $arr = array();
                                        if($_POST['book_room_adults']){ $arr[] = $_POST['book_room_adults']." Adult(s)"; }
                                        if($_POST['book_room_children']){ $arr[] = $_POST['book_room_children']." Child(s)"; }
                                        echo implode(', ', $arr);
                                        ?>
                                    </li>
                                </ul>
                                <!-- END .display-reservation -->
                            </div>

                            <!-- END .booking-side -->
                        </div>

                        <!-- END .booking-side-wrapper -->
                    </div>

                    <div class="clearfix"></div>
                </div>
            <?php }else if($form->getStep()==3){?>
                <!-- BEGIN .booking-side-wrapper -->
                <div class="booking-side-wrapper">

                    <!-- BEGIN .booking-side -->
                    <div class="booking-side clearfix">

                        <h4 class="title-style4">Your Reservation<span class="title-block"></span></h4>

                        <!-- BEGIN .display-reservation -->
                        <div class="display-reservation">
                            <ul>
                                <li><span>Check In: </span> <?php echo $_POST['book_date_from'];?></li>
                                <li><span>Check Out: </span> <?php echo $_POST['book_date_to'];?></li>
                                <li><span>Guests: </span> <?php $arr = array();
                                    if($_POST['book_room_adults']){ $arr[] = $_POST['book_room_adults']." Adult(s)"; }
                                    if($_POST['book_room_children']){ $arr[] = $_POST['book_room_children']." Child(s)"; }
                                    echo implode(', ', $arr);
                                    ?>
                                </li>
                                <li><span>Room Type: </span> <?php echo $_POST['room_type'];?></li>
                            </ul>
                            <!-- END .display-reservation -->
                        </div>

                        <!-- END .booking-side -->
                    </div>

                    <!-- END .booking-side-wrapper -->
                </div>

                <!-- BEGIN .booking-main-wrapper -->
                <div class="booking-main-wrapper">

                    <!-- BEGIN .booking-main -->
                    <div class="booking-main">
                        <h4 class="title-style4">Guest Details<span class="title-block"></span></h4>
                        <form action="?page=reservation&step=4" class="reservation-form clearfix" method="post">
                            <div class="input-left">
                                <label for="first_name">First Name *</label>
                                <input type="text" name="first_name" id="first_name" required>
                                <label for="last_name">Last Name *</label>
                                <input type="text" name="last_name" id="last_name" required>
                                <label for="email_address">Email Address *</label>
                                <input type="text" name="email_address" id="email_address" required>
                                <label for="phone_number">Telephone Number *</label>
                                <input type="text" name="phone_number" id="phone_number" required>
                                <label for="address_line1">Address Line 1 *</label>
                                <input type="text" name="address_line1" id="address_line1" required>
                            </div>
                            <div class="input-right">
                                <label for="address_line2">Address Line 2 *</label>
                                <input type="text" name="address_line2" id="address_line2" required>
                                <label for="city">City *</label>
                                <input type="text" name="city" id="city" required>
                                <label for="state_county">Province *</label>
                                <input type="text" name="province" id="state_county" required>
                                <label for="zip_postcode">Zip / Postcode *</label>
                                <input type="text" name="zip_postcode" id="zip_postcode" required>
                                <label for="country">Country *</label>
                                <input type="text" name="country" id="country" required>
                            </div>
                            <label for="special_requirements">Special Requirements</label>
                            <br />
                                <textarea name="special_requirements" id="special_requirements" rows="10" style="width: 98%;"></textarea>
                            <div class="clearfix"></div>
                            <input type="submit" value="Book Now" />
                        </form>
                        <!-- BEGIN .booking-main -->
                    </div>
                    <!-- BEGIN .booking-main-wrapper -->
                </div>
                <div class="clearfix"></div>
            <?php }else if($form->getStep()==4){?>
                <!-- BEGIN .booking-main-wrapper -->
                <div class="booking-main-wrapper">

                    <!-- BEGIN .booking-main -->
                    <div class="booking-main">

                        <h4 class="title-style4">Reservation Complete<span class="title-block"></span></h4>
                        <p>Reservation complete. Please wait telephone for contact</p>

                        <ul class="contact_details_list contact_details_list_dark">

                            <li class="phone_list"><strong>Phone:</strong> +669 3048 0569</li>
                            <li class="phone_list"><strong>Phone:</strong> 053 646 765</li>
                            <li class="email_list"><strong>Email:</strong> phetngamhotel@hotmail.com</li>

                        </ul>

                        <form>
                            <a href="index.php" class="book-deposit">Return to home.</a>
                        </form>

                        <!-- END .booking-main -->
                    </div>

                    <!-- END .booking-main-wrapper -->
                </div>
            <?php }?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    var oldAttributes = <?php echo json_encode($form->getAll());?>;
    $('.reservation-form').submit(function(e){
        e.preventDefault();
        var form = $('<form></form>');
        form.attr('method', 'post');
        form.attr('action', $(this).attr('action'));

        var mkInput = function(key, value){
            var input = $('<input type="hidden" name="'+key+'">');
            input.val(value);
            return input;
        };
        for(var p in oldAttributes){
            form.append(mkInput(p, oldAttributes[p]));
        }
        var sra = $(this).serializeArray();
        for(var i in sra){
            form.append(mkInput(sra[i].name, sra[i].value));
        }
        form.appendTo('body');
        form.submit();
    });
});
</script>