<?php require_once('config/tank_config.php'); ?>
<?php require_once('session.php'); ?>
<?php
$restrictGoTo = "user_error3.php";
if ($_SESSION['MM_rank'] < "2") {   
  header("Location: ". $restrictGoTo); 
  exit;
}

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
$p_id = "-1";
if (isset($_GET['pid'])) {
  $p_id = $_GET['pid'];
}
$projectid = "-1";
if (isset($_GET['projectID'])) {
  $projectid = $_GET['projectID'];
}

$pageurl = "-1";
if (isset($_GET['url'])) {
  $pageurl = $_GET['url'];
}

$pageurl =strtr($pageurl,"!","&");

if ((isset($_GET['delID'])) && ($_GET['delID'] != "") && ($_SESSION['MM_Username'] <> $multilingual_dd_user_readonly)) {
  $deleteSQL = sprintf("DELETE FROM tk_document WHERE docid=%s",
                       GetSQLValueString($_GET['delID'], "int"));

  mysql_select_db($database_tankdb, $tankdb);
  $Result1 = mysql_query($deleteSQL, $tankdb) or die(mysql_error());


  $deleteGoTo = $pageurl;

  

  header(sprintf("Location: %s", $deleteGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php echo $pageurl;?>
</body>
</html>