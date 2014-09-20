<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 8/7/14
 * Time: 4:41 PM
 */

Manager::deleteReserve($_GET['id']);
Helper::redir('home');