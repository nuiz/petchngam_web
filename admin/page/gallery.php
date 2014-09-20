<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 8/7/14
 * Time: 4:56 PM
 */

if($_SERVER['REQUEST_METHOD']=="POST"){
    Manager::uploadPictures($_FILES['files'], $_GET['type']);
    Helper::reload();
    exit();
}

$pictures = Manager::getPictures($_GET['type']);
?>
<div style="padding: 20px;">
    <form class="form-upload" method="post" enctype="multipart/form-data">
        <h4>Upload New Picture(*ควร upload ทีละไม่เกิน 8Mb)</h4>
        <input type="file" name="files[]" multiple>
        <input type="submit" value="Upload">
        <br />
        <small>อณุญาติให้ upload ได้เฉพาะไฟล์ jpg, jpeg, png เท่านั้น</small>
    </form>
    <div>
        <form method="post" action="?page=delete_picture&type=<?php echo $_GET['type'];?>">
            <?php foreach($pictures as $key=> $picture){?>
            <div class="img-item-wrap">
                <input type="checkbox" name="delete_id[]" value="<?php echo $picture['id'];?>">
                <img class="img-item" src="../pictures/<?php echo $picture['path'];?>">
            </div>
            <?php }?>
            <div style="margin-left: 27px;">
                <input class="btn-danger" type="submit" value="Delete">
            </div>
        </form>
    </div>
</div>
<style type="text/css">
.img-item-wrap {
    margin: 10px 0;
}
.img-item{
    max-height: 160px;
    line-height: 160px;
    margin-left: 10px;
}
</style>