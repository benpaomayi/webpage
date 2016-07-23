<?php
require 'itl/config/tank_config.php';
mysql_query('SET NAMES UTF8');
//开启Session设置	
session_start();	
if(isset($_POST['username']) && isset($_POST['password']))
{
	$username=str_replace(" ","",$_POST['username']); //去除空格
} else {
	header("Location:login.html");
}
$username = addslashes($_POST['username']);
$passowrd=md5(addslashes($_POST['password']));
/*
$table = '';
if($_POST['type'] == 0) {
	$table = "admininfo";
} else if($_POST['type'] == 1) {
	$table = "userinfo";
}
*/
$type = $_POST['type'];
$table = 'tk_user';
if ($username && $passowrd)
	{
//		$sql = "SELECT * FROM $table WHERE username = '$username' and password='$passowrd'";
		$sql = "SELECT * FROM $table WHERE tk_user_login='$username' and tk_user_pass='$passowrd'";
		$res = mysql_query($sql);
		$array = mysql_fetch_array($res);
		$rows=mysql_num_rows($res);
		if($rows)
		{
			$loginStrGroup  = $array['tk_user_status'];
			$loginStrDisplayname  = $array['tk_display_name'];
			$loginStrpid  = $array['uid'];
			$loginStrrank  = $array['tk_user_rank'];
			$loginStrlogin  = $array['tk_user_login'];
			$loginStrmsg  = $array['tk_user_message'];
			$_SESSION['MM_Username'] = $username;
			$_SESSION['MM_UserGroup'] = $loginStrGroup;
			$_SESSION['MM_Displayname'] = $loginStrDisplayname;
			$_SESSION['MM_uid'] = $loginStrpid;
			$_SESSION['MM_rank'] = $loginStrrank;
			$_SESSION['MM_msg'] = $loginStrmsg;
			$_SESSION['name'] = $username;
			if($type == 0)
				if($array['tk_user_rank'] == '5') {
					$_SESSION['username'] = 'admin';
					$_SESSION['password'] = 'admin';
				} else {
					echo "用户名或密码错误";
				}
			if($type == 1)
				if($array['tk_user_rank'] != '5') {
					$_SESSION['username'] = 'user';
					$_SESSION['password'] = 'user';
				} else {
					echo "用户名或密码错误";
				}
			
		} else {
			echo "用户名或密码错误";
		}
	}
?>