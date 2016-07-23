<?php
$version = "1.3.2";
$maxRows = 30;
mysql_select_db($database_tankdb,$tankdb);



if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
function new_huankuan( $hk_pd, $bx_qr,$bx_rq,$hk_qr,$hk_rq,$tk_jk_projectid,$jk_taskid) {
	global $tankdb;
	global $database_tankdb;
	$insertSQL = sprintf("INSERT INTO tk_jiekuanzt (tk_hk_pd, tk_bx_qr, tk_bx_rq, tk_hk_qr,tk_hk_rq, tk_jk_projectid,tk_jk_taskid) VALUES (  %s,%s,%s,%s,%s,%s,%s)",
			GetSQLValueString($hk_pd, "text"),
			GetSQLValueString($bx_qr, "text"),
			GetSQLValueString($bx_rq, "text"),
			GetSQLValueString($hk_qr, "text"),
			GetSQLValueString($hk_rq, "text"),
			GetSQLValueString($tk_jk_projectid, "text"),
			GetSQLValueString($jk_taskid, "text"));

	mysql_select_db($database_tankdb, $tankdb);
	$Result1 = mysql_query($insertSQL, $tankdb) or die(mysql_error());
	$huankuan = mysql_insert_id();
	$newName = $nowuser;
}

//测试
function new_projecthuankuan( $project_hk_pd,$id) {
	global $tankdb;
	global $database_tankdb;
	$insertSQL = sprintf("UPDATE tk_project SET project_hk_pd= %s WHERE id=%s ",
			GetSQLValueString($project_hk_pd, "text"),
			GetSQLValueString($id, "text")
			);

	mysql_select_db($database_tankdb, $tankdb);
	$Result1 = mysql_query($insertSQL, $tankdb) or die(mysql_error());
	$projecthuankuan = mysql_insert_id();
	$newName = $nowuser;
}
