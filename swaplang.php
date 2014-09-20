<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 8/28/14
 * Time: 11:38 PM
 */

setcookie('lang', $_GET['lang']);
?>
<meta http-equiv="refresh" content="0;url=<?php echo $_SERVER['HTTP_REFERER'];?>">