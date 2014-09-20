<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 8/7/14
 * Time: 6:26 PM
 */

$item = Manager::getReserve($_GET['id']);

$book_date_from = strtotime($item['book_date_from']);
$book_date_from = date("d/m/Y");

$book_date_to = strtotime($item['book_date_to']);
$book_date_to = date("d/m/Y");
?>
<div class="span9 box">
    <div class="box-content box-double-padding">
        <form class="form" style="margin-bottom: 0;">
            <fieldset>
                <div class="span4">
                    <div class="lead">
                        <i class="icon-signin text-contrast"></i>
                        Reservation info
                    </div>
                    <div>
                        <label class="label-name-left">วันเริ่มต้นจอง</label><span><?php echo $book_date_from;?></span>
                        <label class="label-name-left">จองถึงวันที่</label><span><?php echo $book_date_to;?></span>
                        <label class="label-name-left">เด็ก</label><span><?php echo $item['book_room_adults'];?></span>
                        <label class="label-name-left">ผู้ใหญ่</label><span><?php echo $item['book_room_children'];?> คน</span>
                        <label class="label-name-left">ประเภทห้อง</label><span><?php echo $item['room_type'];?>คน</span>
                    </div>
                </div>
            </fieldset>
            <hr class="hr-normal">
            <fieldset>
                <div class="span4 box">
                    <div class="lead">
                        <i class="icon-user text-contrast"></i>
                        Personal info
                    </div>
                    <label class="label-name-left">ชื่อ-นามสกุล</label><span><?php echo $item['first_name'];?> <?php echo $item['last_name'];?></span>
                    <label class="label-name-left">อีเมลล์</label><span><?php echo $item['email_address'];?></span>
                    <label class="label-name-left">โทรศัพท์</label><span><?php echo $item['phone_number'];?></span>
                    <label class="label-name-left">ที่อยู่</label><span><?php echo $item['address_line1'];?></span>
                    <label class="label-name-left">ที่อยู่(ต่อ)</label><span><?php echo $item['address_line2'];?></span>

                    <label class="label-name-left">เมือง</label><span><?php echo $item['city'];?></span>
                    <label class="label-name-left">จังหวัด</label><span><?php echo $item['province'];?></span>
                    <label class="label-name-left">รหัสไปรษณีย์</label><span><?php echo $item['zip_postcode'];?></span>

                    <label class="label-name-left">ประเทศ</label><span><?php echo $item['country'];?></span>
                </div>
            </fieldset>
            <fieldset>
                <div class="span4 box">
                    <div class="lead">
                        <i class="icon-user text-contrast"></i>
                        ความต้องการเพิ่มเติม
                    </div>
                    <span class="muted"><?php echo $item['special_requirements'];?></span>
                </div>
            </fieldset>
            <div class="form-actions" style="margin-bottom: 0;">
                <div class="text-right">
                    <a class="btn btn-info" href="?page=home">
                        Back
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<style class="text/css">
.label-name-left {
    display: inline-block;
    width: 200px;
}
</style>