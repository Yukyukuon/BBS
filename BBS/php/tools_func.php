<?php
/**
 * Created by PhpStorm.
 * User: 64674
 * Date: 2019/3/29
 * Time: 1:23
 */

//添加Session
function setSession($key,$data,$prefix = '')
{
    session_id() || @session_start();  //判断session_id是否存在，不存在开启session_start
    if(!empty($prefix)){
        $_SESSION[$prefix][$key] = $data;
    }else{
        $_SESSION[$key] = $data;
    }
}


//查询当前用户的用户名
function getSession($key,$prefix = '')
{
    session_id() || @session_start();
    if(!empty($prefix)){  //判断是否有前缀，有的话从前缀获取数据
        return isset($_SESSION[$prefix][$key]) ? $_SESSION[$prefix][$key] : [];
    }else{
        return isset($_SESSION[$key]) ? $_SESSION[$key] : [];
    }
}


//删除Session
function deleteSession($key,$prefix = '')
{
    session_id() || @session_start();
    if(!empty($prefix)){
        $_SESSION[$prefix][$key] = null;
    }else{
        $_SESSION[$key] = null;
    }
}

//用户名密码有误提示
function setInfo($info)
{
    setSession('info',$info,'system');
}

function getInfo()
{
    $info = getSession('info','system');
    deleteSession('info','system');
    return $info;
}

function hasInfo()
{
    return !empty(getSession('info','system'));
}