<?php
include('JWT.php');

//DUOSHUO定义为你注册多说时的密钥
define('DUOSHUO_SECRET', '密钥');

/*
short_name定义为你注册多说时的二级域名
user_key与name为你网站当前登录用户的id与name
这里我把它存入session
*/
$token = array(
    "short_name"=> "二级域名",
    "user_key"=> $_SESSION['user_id'],
    "name"=> $_SESSION['user_name']
);

$duoshuoToken = JWT::encode($token, DUOSHUO_SECRET);

//cookie有效时间设置
$expire = time() + 3600;
setcookie('duoshuo_token', $duoshuoToken, $expire);

?>