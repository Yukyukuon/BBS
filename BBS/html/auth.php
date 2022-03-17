<?php
/**
 * Created by PhpStorm.
 * User: 64674
 * Date: 2019/3/30
 * Time: 20:48
 */

if(empty(getSession('username','admin'))){
    header('location:login.php');
    exit;
}