<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 8/7/14
 * Time: 3:53 PM
 */

class Helper {
    public static function checkLogin(){
        if(!isset($_SESSION['nai_login']) || empty($_SESSION['nai_login'])){
            return false;
        }
        return true;
    }

    public static function includeLogin(){
        include 'page/sign_in.html';
    }

    public static function login($uname, $pass){
        if($uname == "admin" && $pass == "111111"){
            $_SESSION['nai_login'] = "admin";
            return true;
        }
        else {
            session_destroy();
            return false;
        }
    }

    public static function reload(){
        echo <<<HTML
<script type="text/javascript">javascript:window.location.href=window.location.href</script>
HTML;

    }

    public static function redir($page, $params=array()){
        $params['page'] = $page;
        $link = '?'.http_build_query($params);
        echo <<<HTML
<script type="text/javascript">javascript:window.location.href='{$link}';</script>
HTML;

    }

    public static function displayPage($page){
        $page_path = 'page/'.$page.'.php';
        include_once "template.php";
    }
}