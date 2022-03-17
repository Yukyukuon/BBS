<?php
/**
 * Created by PhpStorm.
 * User: 64674
 * Date: 2019/3/30
 * Time: 2:24
 */
require '../php/tools_func.php';
$current_user = getSession('admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
<script type="text/javascript" src="../js/index.js"></script>
<div class="container" style="min-height: 944px">
    <div class="topbar">
        <div class="logo">
            <p>
                <span class="name">程序员之家</span>
                <span class="description">BBS论坛</span>
            </p>
        </div>
        <div class="menu">
            <table>
                <tbody>
                <tr>
                    <td>
                        <div class="item">
                            <a href="#">论坛首页</a>
                        </div>
                    </td>
                    <td>
                        <div class="item">
                            <a href="register.php">注册</a>
                        </div>
                    </td>
                    <td>
                        <div class="item">
                            <a href="user_edit.php"><?php if(!empty($current_user['username'])){
                                    echo $current_user['username'];
                                }else{
                                    echo '登录';
                                } ?> </a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row_selectnode">
        <div class="row_selectnode_1">
            <nav>
                <ul>
                    <li>
                        <a href="">全部</a>
                    </li>
                    <li>
                        <a href="">编程</a>
                    </li>
                    <li>
                        <a href="">音乐</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row_selectnode_2">
            <form action="" method="get">
                <input type="search" name="keyword" placeholder="请输入要搜索的内容">
                <input type="submit" name="" value="搜索">
            </form>
        </div>
        <div class="row_selectnode_3">
            <hr>
        </div>
    </div>
    <div class="main_page">
