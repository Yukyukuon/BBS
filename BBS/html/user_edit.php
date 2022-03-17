<?php
require '../php/tools_func.php';
require '../php/db_func.php';
require 'auth.php';
$current_user = getSession('admin');

//1.判断是否为post提交
if(!empty($_POST['password'])){
    //2.验证新密码和确认密码是否一致
    $pass = htmlentities($_POST['password']);
    $new_pass = htmlentities($_POST['new_password']);
    $confirm_pass = htmlentities($_POST['confirm_password']);
    if($new_pass != $confirm_pass){
        setInfo('两次密码不一致');
    }else{
        //3.验证旧密码是否正确 （查询数据库 用id,password)
        $sql = "SELECT id FROM user 
            WHERE id= '{$current_user['id']}'
            AND password = '$pass'
            ";
        $res = queryOne($sql);
        //4.更新数据表
        if($res){
            $sql = "UPDATE user
                SET password = '$new_pass'
                WHERE id= '{$current_user['id']}'
                ";
            if(execute($sql)){
                setInfo('修改密码成功');
            }else{
                setInfo('修改密码失败');
            };
        }else{
            setInfo('旧密码不正确！');
        }
    }
    //5.显示结果到页面
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/user_edit.css">
</head>
<body>
	<div class="container"  style="min-height: 944px">
		<div class="topbar">
			<div class="logo">
			    <p>
			    	<span class="name">程序员之家</span>
				    <span class="description">个人资料</span>
			    </p>
		    </div>
		    <div class="menu">
		    	<table>
		    		<tbody>
		    			<tr>
		    				<td>
		    					<div class="item">
		    						<a href="index.php">论坛首页</a>
		    					</div>
							</td>
		    			</tr>
		    		</tbody>
		    	</table>
		    </div>
		</div>
		<div class="main_page">
			<h2><?php echo $current_user['username']; ?> 你好!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(hasInfo()) echo getInfo();?></h2>
			<div class="personal_info">
				<form action="user_edit.php" method="post">
					<table>
						<tr>
							<td><label>用户名</label></td>
							<td><input type="text" disabled class="form_control" name="username" value="<?php echo $current_user['username']; ?>">
						</tr>
						<tr>
							<td><label>旧密码</label></td>
							<td><input type="password" class="form_control" name="password">
						</tr>
						<tr>
							<td><label>新密码</label></td>
							<td><input type="password" class="form_control" name="new_password">
						</tr>
						<tr>
							<td><label>确认密码</label></td>
							<td><input type="password" class="form_control" name="confirm_password">
						</tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="edit_button" name="" value="修改密码"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="logout.php"><button class="form_control login_border" type="button">退出</button></a></td>
                        </tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>