<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 8/7/14
 * Time: 3:50 PM
 */

session_start();
include_once '../Manager.php';
include_once 'Helper.php';

if(!Helper::checkLogin()){
    if($_SERVER['REQUEST_METHOD']=="GET"){
        Helper::includeLogin();
    }
    else {
        Helper::login($_POST['username'], $_POST['password']);
        Helper::reload();
    }
}
else {
    $page = isset($_GET['page'])? $_GET['page']: 'home';
    Helper::displayPage($page);
}