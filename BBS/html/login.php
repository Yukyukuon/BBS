<?php
/**
 * Created by PhpStorm.
 * User: 64674
 * Date: 2019/3/29
 * Time: 0:25
 */


//1.连接数据库 （创建数据库，创建数据库表）
require '../php/db_func.php';
require '../php/tools_func.php';
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
$login_ip = ip2long($ip);  //将ip地址转成长整型
$sql = "UPDATE user
        SET login_at = '$login_at',login_ip = '$login_ip'
        WHERE id = '{$res['id']}'";
        execute($sql);
//4.跳转到index
header('location:index.php');
}else{  //用户名密码有误
setInfo('用户名或者密码错误');
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录页面</title>
    <link rel="stylesheet" type="text/css" href="../css/register&login.css">
</head>
<body>
	<div class="leftbar">
		<div class="main_title_box">
			<p>程序员之家BBS</p>
		</div>
		<hr color="#336699">
		<div class="main_box">
            <p> <?php if(hasInfo()) echo getInfo(); ?></p>
			<form action="../html/login.php" name="login" method="post">
				<table>
					<tr>
						<td>用户名：</td>
						<td><input class="form_control" type="text" name="username" placeholder="用户名"></td>
					</tr>
					<tr>
						<td>密码：</td>
						<td><input class="form_control" type="password" name="password" placeholder="密码" maxlength="10"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" class="form_control login_border" name="" value="立即登录"></td>
					</tr>
                    <tr>
                        <td colspan="2">
                            <a href="register.php"><button class="form_control login_border" type="button">还没有账号？</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="index.php"><button class="form_control login_border" type="button">返回主页</button></a>
                        </td>
                    </tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>