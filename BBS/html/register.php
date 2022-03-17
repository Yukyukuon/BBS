<?php
require '../php/tools_func.php';
require '../php/db_func.php';
if(!empty($_POST['username'])){
    // 1.接受POST数据
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $confirm_password = htmlentities($_POST['confirm_password']);
    $email = htmlentities($_POST['email']);
    $year = htmlentities($_POST['year']);
    $month = htmlentities($_POST['month']);
    $day = htmlentities($_POST['day']);
    $birthday = $year.'-'.$month.'-'.$day;
    $sex = htmlentities($_POST['sex']);
    if($sex == 0){
        $sex = '保密';
    }else if($sex == 1){
        $sex = '男';
    }else{
        $sex = '女';
    }
    $created_at = date('Y-m-d H:i:s');

    // 2.验证密码是否一致
    if($password != $confirm_password){
        setInfo('两次密码输入不一致！');
    }
    else{
        // 3.写SQL语句
        $sql = "INSERT INTO user(username,password,email,birthday,sex,created_at)
                VALUES('$username','$password','$email','$birthday','$sex','$created_at')";
        // 4.执行添加，如果成功，显示成功信息
        if(execute($sql)){
            setInfo('注册成功，请登录！');
        }else{
            setInfo('注册失败！');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册页面</title>
		<link rel="stylesheet" type="text/css" href="../css/register&login.css">
</head>
<body onload="Ymd()">
	<script type="text/javascript" src="../js/register.js"></script>
	<div class="leftbar">
		<div class="main_title_box">
			<p>程序员之家BBS</p>
		</div>
		<hr color="#336699">
		<div class="main_box">
            <p> <?php if(hasInfo()) echo getInfo(); ?></p>
			<form action="register.php" name="register" method="post">
				<table>
					<tr>
						<td>用户名：</td>
						<td><input class="form_control" type="text" name="username" placeholder="请输入用户名"></td>
					</tr>
					<tr>
						<td>密码：</td>
						<td><input class="form_control" type="password" name="password" placeholder="请输入密码" maxlength="10"></td>
					</tr>
					<tr>
						<td>确认密码：</td>
						<td><input class="form_control" type="password" name="confirm_password" placeholder="请再次输入密码" maxlength="10"></td>
					</tr>
					<tr>
						<td>邮箱：</td>
						<td><input class="form_control" type="email" name="email" placeholder="请输入邮箱"></td>
					</tr>
					<tr>
						<td>生日：</td>
						<td><select  name="year" id="year" onchange="selectYmd()"></select> 年
							<select  name="month" id="month" onchange="selectYmd()"></select> 月
							<select  name="day" id="day"></select> 日
						</td>
					</tr>
					<tr>
						<td>性别：</td>
						<td><input type="radio" name="sex" value="0" checked>保密 <input type="radio" name="sex" value="1"> 男 <input type="radio" name="sex" value="2"> 女</td>
					</tr>
					<tr>
						<td>上传头像：</td>
						<td><input type="file" name="picture"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" class="form_control login_border" name="" value="立即注册"></td>
					</tr>
					<tr>
						<td colspan="2">
							<a href="login.php"><button class="form_control login_border" type="button">已有账号</button></a>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<a href="index.php"><button class="form_control login_border" type="button">返回主页</button></a>
						</td>
					</tr>
				</table>
				
			</form>
			<br/>
		</div>
	</div>
</body>
</html>