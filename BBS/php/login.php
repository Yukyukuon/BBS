<?php
/**
 * Created by PhpStorm.
 * User: 64674
 * Date: 2019/3/29
 * Time: 0:25
 */


//1.连接数据库 （创建数据库，创建数据库表）
require 'db_func.php';
require 'tools_func.php';
//POST提交
if(!empty($_POST['username'])){
    //2.查询用户名和密码是否正确
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT id,username FROM user 
            WHERE username = '$username'
            AND password = '$password'";
    $res = queryOne($sql);  //验证用户名和密码正确
    if($res){
        //3.写入session
        setSession('admin',
        ['username' => $username, 'id' => $res['id']]);

    $login_at = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'] == '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    $login_ip = ip2long('$ip');  //将ip地址转成长整型
    $sql = "UPDATE user 
            SET login_at = '$login_at',login_ip = '$login_ip'
            WHERE id = '{$res['id']}'";
    execute($sql);
    //4.跳转到index
    header('BBS/html/index.html');
    }else{  //用户名密码有误
        setInfo('用户名或者密码错误');
    }

}

