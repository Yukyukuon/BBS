<?php
/**
 * Created by PhpStorm.
 * User: 64674
 * Date: 2019/3/30
 * Time: 20:45
 */

//1.删除当前用户的Session
require '../php/tools_func.php';

deleteSession('admin');
header('location:login.php');