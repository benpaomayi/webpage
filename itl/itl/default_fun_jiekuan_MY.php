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
function new_jiekuan( $hk_zt, $jk_ly,$tk_jkr,$jk_jinban,$hk_ren,$jk_rq,$tk_jk_projectid,$jk_taskid) {
	global $tankdb;
	global $database_tankdb;
	$insertSQL = sprintf("INSERT INTO tk_jiekuanxiaoxi (tk_hk_zt, tk_jk_ly, tk_jkr, tk_jk_jinban,tk_hk_ren,tk_jk_rq, tk_jk_projectid,tk_jk_taskid) VALUES (  %s,%s,%s,%s,%s,%s,%s,%s )",
			GetSQLValueString($hk_zt, "text"),
			GetSQLValueString($jk_ly, "text"),
			GetSQLValueString($tk_jkr, "text"),
			GetSQLValueString($jk_jinban, "text"),
			GetSQLValueString($hk_ren, "text"),
			GetSQLValueString($jk_rq, "text"),
			GetSQLValueString($tk_jk_projectid, "text"),
			GetSQLValueString($jk_taskid, "text"));

	mysql_select_db($database_tankdb, $tankdb);
	$Result1 = mysql_query($insertSQL, $tankdb) or die(mysql_error());
	$jiekuan = mysql_insert_id();
	$newName = $nowuser;
}

