<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 8/7/14
 * Time: 5:59 PM
 */

Manager::deletePictures($_POST['delete_id']);
Helper::redir('gallery', $_GET);