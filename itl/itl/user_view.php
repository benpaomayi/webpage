<?php require_once('config/tank_config.php'); ?>
<?php require_once('session_unset.php'); ?>
<?php require_once('session.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_DetailRS1 = 25;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_tankdb, $tankdb);
$query_DetailRS1 = sprintf("SELECT * FROM tk_user WHERE uid = %s", GetSQLValueString($colname_DetailRS1, "text"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $tankdb) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;

$maxRows_Recordset_prj = 15;
$pageNum_Recordset_prj = 0;
if (isset($_GET['pageNum_Recordset_prj'])) {
  $pageNum_Recordset_prj = $_GET['pageNum_Recordset_prj'];
}
$startRow_Recordset_prj = $pageNum_Recordset_prj * $maxRows_Recordset_prj;

$colname_Recordset_prj = $row_DetailRS1['uid'];

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_prj = sprintf("SELECT * FROM tk_project inner join tk_status_project on tk_project.project_status=tk_status_project.psid WHERE project_to_user = %s ORDER BY project_lastupdate DESC", GetSQLValueString($colname_Recordset_prj, "text"));
$query_limit_Recordset_prj = sprintf("%s LIMIT %d, %d", $query_Recordset_prj, $startRow_Recordset_prj, $maxRows_Recordset_prj);
$Recordset_prj = mysql_query($query_limit_Recordset_prj, $tankdb) or die(mysql_error());
$row_Recordset_prj = mysql_fetch_assoc($Recordset_prj);

if (isset($_GET['totalRows_Recordset_prj'])) {
  $totalRows_Recordset_prj = $_GET['totalRows_Recordset_prj'];
} else {
  $all_Recordset_prj = mysql_query($query_Recordset_prj);
  $totalRows_Recordset_prj = mysql_num_rows($all_Recordset_prj);
}
$totalPages_Recordset_prj = ceil($totalRows_Recordset_prj/$maxRows_Recordset_prj)-1;
$queryString_Recordset_prj = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset_prj") == false && 
        stristr($param, "totalRows_Recordset_prj") == false && 
        stristr($param, "tab") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset_prj = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset_prj = sprintf("&totalRows_Recordset_prj=%d%s", $totalRows_Recordset_prj, $queryString_Recordset_prj);

$maxRows_Recordset_log = 15;
$pageNum_Recordset_log = 0;
if (isset($_GET['pageNum_Recordset_log'])) {
  $pageNum_Recordset_log = $_GET['pageNum_Recordset_log'];
}
$startRow_Recordset_log = $pageNum_Recordset_log * $maxRows_Recordset_log;

$colname_Recordset_log = $row_DetailRS1['uid'];

$colmonth_log = date("m");
$_SESSION['ser_logmonth'] = $colmonth_log;
if (isset($_GET['logmonth'])) {
  $colmonth_log = $_GET['logmonth'];
  $_SESSION['ser_logmonth'] = $colmonth_log;
}

$colyear_log = date("Y");
$_SESSION['ser_logyear'] = $colyear_log;
if (isset($_GET['logyear'])) {
  $colyear_log = $_GET['logyear'];
  $_SESSION['ser_logyear'] = $colyear_log;
}

$colday_log = "";
$_SESSION['ser_logday'] = $colday_log;
if (isset($_GET['logday'])) {
  $colday_log = $_GET['logday'];
  $_SESSION['ser_logday'] = $colday_log;
}

$coldate = $colyear_log.$colmonth_log.$colday_log;

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_log = sprintf("SELECT * FROM tk_task_byday 
								inner join tk_project on tk_task_byday.csa_tb_backup3=tk_project.id 
								inner join tk_task_tpye on tk_task_byday.csa_tb_backup4=tk_task_tpye.id 
								inner join tk_status on tk_task_byday.csa_tb_status=tk_status.id 
								inner join tk_task on tk_task_byday.csa_tb_backup1=tk_task.TID 
WHERE csa_tb_backup2 = %s AND csa_tb_year LIKE %s ORDER BY csa_tb_year DESC", 
GetSQLValueString($colname_Recordset_log, "text"),
GetSQLValueString($coldate . "%", "text")
);
$query_limit_Recordset_log = sprintf("%s LIMIT %d, %d", $query_Recordset_log, $startRow_Recordset_log, $maxRows_Recordset_log);
$Recordset_log = mysql_query($query_limit_Recordset_log, $tankdb) or die(mysql_error());
$row_Recordset_log = mysql_fetch_assoc($Recordset_log);

if (isset($_GET['totalRows_Recordset_log'])) {
  $totalRows_Recordset_log = $_GET['totalRows_Recordset_log'];
} else {
  $all_Recordset_log = mysql_query($query_Recordset_log);
  $totalRows_Recordset_log = mysql_num_rows($all_Recordset_log);
}
$totalPages_Recordset_log = ceil($totalRows_Recordset_log/$maxRows_Recordset_log)-1;
$queryString_Recordset_log = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset_log") == false && 
        stristr($param, "totalRows_Recordset_log") == false && 
        stristr($param, "tab") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset_log = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset_log = sprintf("&totalRows_Recordset_log=%d%s", $totalRows_Recordset_log, $queryString_Recordset_log);


$maxRows_Recordset_task = 15;
$pageNum_Recordset_task = 0;
if (isset($_GET['pageNum_Recordset_task'])) {
  $pageNum_Recordset_task = $_GET['pageNum_Recordset_task'];
}
$startRow_Recordset_task = $pageNum_Recordset_task * $maxRows_Recordset_task;

$colname_Recordset_task = $row_DetailRS1['uid'];

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_task = sprintf("SELECT *, 
							
							tk_project.project_name as project_name_prt 
							FROM tk_task 
								inner join tk_project on tk_task.csa_project=tk_project.id 
								inner join tk_task_tpye on tk_task.csa_type=tk_task_tpye.id 
								inner join tk_user on tk_task.csa_from_user=tk_user.uid 
								inner join tk_status on tk_task.csa_remark2=tk_status.id 
								
								WHERE tk_task.csa_to_user = %s 
								
								ORDER BY csa_last_update DESC", 
								GetSQLValueString($colname_Recordset_task, "text")
								);
$query_limit_Recordset_task = sprintf("%s LIMIT %d, %d", $query_Recordset_task, $startRow_Recordset_task, $maxRows_Recordset_task);
$Recordset_task = mysql_query($query_limit_Recordset_task, $tankdb) or die(mysql_error());
$row_Recordset_task = mysql_fetch_assoc($Recordset_task);

if (isset($_GET['totalRows_Recordset_task'])) {
  $totalRows_Recordset_task = $_GET['totalRows_Recordset_task'];
} else {
  $all_Recordset_task = mysql_query($query_Recordset_task);
  $totalRows_Recordset_task = mysql_num_rows($all_Recordset_task);
}
$totalPages_Recordset_task = ceil($totalRows_Recordset_task/$maxRows_Recordset_task)-1;

$queryString_Recordset_task = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset_task") == false && 
        stristr($param, "totalRows_Recordset_task") == false && 
        stristr($param, "tab") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset_task = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset_task = sprintf("&totalRows_Recordset_task=%d%s", $totalRows_Recordset_task, $queryString_Recordset_task);

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_sumtotal = sprintf("SELECT 
							sum(csa_tb_manhour) as sum_hour, 
							COUNT(*) as count_user_log   
							FROM tk_task_byday 								
							
							WHERE csa_tb_backup2 = %s", 
								GetSQLValueString($colname_Recordset_task, "text")
								);
$Recordset_sumtotal = mysql_query($query_Recordset_sumtotal, $tankdb) or die(mysql_error());
$row_Recordset_sumtotal = mysql_fetch_assoc($Recordset_sumtotal);
$user_totalhour=$row_Recordset_sumtotal['sum_hour']; 
$user_totallog=$row_Recordset_sumtotal['count_user_log'];

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_countuser = "SELECT COUNT(*) as count_user FROM tk_user WHERE tk_user_rank NOT LIKE '0'";
$Recordset_countuser = mysql_query($query_Recordset_countuser, $tankdb) or die(mysql_error());
$row_Recordset_countuser = mysql_fetch_assoc($Recordset_countuser);

?>
<?php require('head.php'); ?>
<script type="text/javascript" src="chart/js/swfobject.js"></script> 
<script type="text/javascript"> 
var flashvars = {"data-file":"chart_pie_user.php?recordID=<?php echo $colname_Recordset_task; ?>"};  
var params = {menu: "false",scale: "noScale",wmode:"opaque"};  
swfobject.embedSWF("chart/open-flash-chart.swf", "chart", "600px", "230px", 
 "9.0.0","expressInstall.swf", flashvars,params);  
 
 function   searchtask() 
      {document.form1.action= "user_view.php?#task "; 
        document.form1.submit(); 
        return   true; 
      
      } 

function   exportexcel() 
      {document.form1.action= "excel_log.php "; 
        document.form1.submit(); 
        return   false; 
      
      } 
	  
function addtask()
{
    J.dialog.get({ id: "taskadd", title: '<?php echo $multilingual_taskadd_selprj; ?>', width: 400, height: 350, page: "task_add_selprj.php?section=1&UID=<?php echo $row_DetailRS1['uid']; ?>&touser=1" });
}
</script>

<?php 
$tab = "-1";
if (isset($_GET['tab'])) {
  $tab = $_GET['tab'];
}
if($tab==2){
echo "
<script language='javascript'>
function tabs2()
{
var len = 3;
for (var i = 1; i <= len; i++)
{
document.getElementById('tab_a' + i).style.display = (i == 2) ? 'block' : 'none';
document.getElementById('tab_' + i).className = (i == 2) ? 'onhover' : 'none';
}
}
</script>
";
}
?>
<?php 
$tab = "-1";
if (isset($_GET['tab'])) {
  $tab = $_GET['tab'];
}
if($tab==3){
echo "
<script language='javascript'>
function tabs3()
{
var len = 3;
for (var i = 1; i <= len; i++)
{
document.getElementById('tab_a' + i).style.display = (i == 3) ? 'block' : 'none';
document.getElementById('tab_' + i).className = (i == 3) ? 'onhover' : 'none';
}
}
</script>
";
}
?>
<script language="javascript">
function tabs(n)
{
var len = 3;
for (var i = 1; i <= len; i++)
{
document.getElementById('tab_a' + i).style.display = (i == n) ? 'block' : 'none';
document.getElementById('tab_' + i).className = (i == n) ? 'onhover' : 'none';
}
}
</script>
<body <?php if($tab==2){ echo "onload='tabs2();'";} elseif($tab==3){ echo "onload='tabs3();'";} ?>>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="70%" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="5" align="right">
          <tr>
            <td >
			<ul class="breadcrumb">
			<li><?php echo $multilingual_breadcrumb_userlist; ?> <span class="divider">/</span></li>
			<li><?php echo $multilingual_user_view_title; ?></li>
			</ul>			</td>
          </tr>
          <tr>
            <td>
              <span class="breakwordsfloat_left"><h2><?php echo $row_DetailRS1['tk_display_name']; ?></h2></span></td>
          </tr>
          <tr>
            <td><?php 
	
	$row_DetailRS1['tk_user_remark']   =   htmlspecialchars($row_DetailRS1['tk_user_remark']);  
	$row_DetailRS1['tk_user_remark']   =   str_replace("\n",   "<br>",   $row_DetailRS1['tk_user_remark']);  
	$row_DetailRS1['tk_user_remark']   =   str_replace("     ",   "&nbsp;",   $row_DetailRS1['tk_user_remark']);   
	echo $row_DetailRS1['tk_user_remark']; 
	
	?></td>
          </tr>
		  <tr>
		  <td>
		  <table width="100%">
		  <tr>
		  <?php if($_SESSION['MM_rank'] > "2") { ?>
		  
		<!-- 提交审批   
		  <td width="12%">
		  <a onClick="addtask();" class="mouse_hover" ><i class="icon-random"></i> <?php echo ""; ?></a>		  
		  </td>
		--> 
		 
		  <?php }  ?> 
		  <?php if ($_SESSION['MM_rank'] > "1"){ ?>
		  <?php if ($_SESSION['MM_rank'] > "4" || $_SESSION['MM_uid'] == $row_DetailRS1['uid']) { ?>
		  <td width="10%">
		  <a href="default_user_edit.php?UID=<?php echo $row_DetailRS1['uid']; ?>"><i class="icon-pencil"></i> <?php echo $multilingual_global_action_edit; ?></a>
		  </td>
		  <?php }  ?> 
		  <?php }  ?> 
		  <?php if ($_SESSION['MM_rank'] > "4" && $row_Recordset_countuser['count_user'] > "1") {  ?>
		  <td width="10%">
		  <a onClick="javascript:if(confirm( '<?php 
	 if($totalRows_Recordset_task == "0" && $totalRows_Recordset_prj == "0"){  
	  echo $multilingual_global_action_delconfirm;
	  } else { echo $multilingual_global_action_delconfirm4;} ?>'))self.location='user_del.php?UID=<?php echo $row_DetailRS1['uid']; ?>';" value="<?php echo $multilingual_global_action_del; ?>" class="mouse_hover"><i class="icon-remove"></i> <?php echo $multilingual_global_action_del; ?></a>
		  </td>
		  <?php }  ?> 
		  
		  <td>
		   <a class="mouse_over" onClick="javascript:history.go(-1)">
			 <i class="icon-arrow-left"></i> <?php echo $multilingual_global_action_back; ?>			 </a>
		  </td>
		  
		  <td>&nbsp;
		  
		  </td>
		  </tr>
		  </table>

		  </td>
		  </tr>
		  <?php if ($user_totalhour > 0.5) {  ?>
		  <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="font_big18 fontbold"><?php echo $multilingual_user_chart_title; ?></span></td>
          </tr>
          <tr>
            <td>
	          <div id="chart"></div>
	        </td>
          </tr>
		  <?php }  ?>
          <tr>
            <td><br />
			<a name="task"></a>
<div class="tab">
<ul class="menu" id="menutitle">

<li id="tab_1" class="onhover" <?php if ($user_totallog == 0) { echo "style='display:none'"; }?>><a href="javascript:void(0)" onClick="tabs('1');" ><?php echo $multilingual_default_task_section5; ?></a></li>

<li id="tab_2" <?php if ($user_totallog == 0) { echo "class='onhover'"; }?> <?php if ($totalRows_Recordset_task == 0) { echo "style='display:none'"; } ?>><a href="javascript:void(0)" onClick="tabs('2');" ><?php echo $multilingual_user_view_task; ?></a></li>


<li id="tab_3"  <?php if ($user_totallog == 0 && $totalRows_Recordset_task == 0) { echo "class='onhover'"; }?> <?php if ($totalRows_Recordset_prj == 0) { echo "style='display:none'"; }?>><a href="javascript:void(0)" onClick="tabs('3');" ><?php echo $multilingual_user_view_project; ?></a></li>
<?php if ($user_totallog <> 0 || $totalRows_Recordset_task <> 0 || $totalRows_Recordset_prj <> 0) { ?>
<li >&nbsp;</li><li >&nbsp;</li>
<?php }?>
</ul>

<div class="tab_b" id="tab_a1" 
<?php if ($user_totallog > 0) { 
echo "style='display:block'";
} else {
echo "style='display:none'";
} ?>
>
  <!--log start-->
  <?php if ($user_totallog > 0) {  ?>
<table width="100%" cellpadding="5">
  <tr>
  <td>
  <div class="search_div">
<form id="form1" name="form1" method="get" class="saerch_form">
  <?php echo $multilingual_user_view_date; ?>
  <input name="recordID" id="recordID" value="<?php echo $row_DetailRS1['uid']; ?>" style="display:none" />
  <input name="logtype" id="logtype" value="1" style="display:none" />
      <select name="logyear" id="logyear">
	  <option value=""><?php echo $multilingual_global_all; ?></option>

        <option value="2009" <?php 
		if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2009, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2009, date("Y")))) {echo "selected=\"selected\"";} ?>>2009</option>
        <option value="2010" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2010, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2010, date("Y")))) {echo "selected=\"selected\"";} ?>>2010</option>
        <option value="2011" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2011, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2011, date("Y")))) {echo "selected=\"selected\"";} ?>>2011</option>
        <option value="2012" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2012, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2012, date("Y")))) {echo "selected=\"selected\"";} ?>>2012</option>
        <option value="2013" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2013, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2013, date("Y")))) {echo "selected=\"selected\"";} ?>>2013</option>
        <option value="2014" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2014, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2014, date("Y")))) {echo "selected=\"selected\"";} ?>>2014</option>
        <option value="2015" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2015, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2015, date("Y")))) {echo "selected=\"selected\"";} ?>>2015</option>
        <option value="2016" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2016, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2016, date("Y")))) {echo "selected=\"selected\"";} ?>>2016</option>
        <option value="2017" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2017, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2017, date("Y")))) {echo "selected=\"selected\"";} ?>>2017</option>
        <option value="2018" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2018, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2018, date("Y")))) {echo "selected=\"selected\"";} ?>>2018</option>
        <option value="2019" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2019, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2019, date("Y")))) {echo "selected=\"selected\"";} ?>>2019</option>
        <option value="2020" <?php if (isset($_SESSION['ser_logyear'])) {	
		if (!(strcmp(2020, "{$_SESSION['ser_logyear']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2020, date("Y")))) {echo "selected=\"selected\"";} ?>>2020</option>
      </select> / <select  name="logmonth" id="logmonth">
      <option value=""><?php echo $multilingual_taskf_month; ?></option>
      <option value="01" <?php 
	  if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("01", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(1, date("n")))) {echo "selected=\"selected\"";} ?>>01</option>
      <option value="02" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("02", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2, date("n")))) {echo "selected=\"selected\"";} ?>>02</option>
      <option value="03" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("03", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(3, date("n")))) {echo "selected=\"selected\"";} ?>>03</option>
      <option value="04" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("04", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(4, date("n")))) {echo "selected=\"selected\"";} ?>>04</option>
      <option value="05" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("05", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(5, date("n")))) {echo "selected=\"selected\"";} ?>>05</option>
      <option value="06" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("06", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(6, date("n")))) {echo "selected=\"selected\"";} ?>>06</option>
      <option value="07" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("07", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(7, date("n")))) {echo "selected=\"selected\"";} ?>>07</option>
      <option value="08" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("08", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(8, date("n")))) {echo "selected=\"selected\"";} ?>>08</option>
      <option value="09" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("09", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(9, date("n")))) {echo "selected=\"selected\"";} ?>>09</option>
      <option value="10" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("10", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(10, date("n")))) {echo "selected=\"selected\"";} ?>>10</option>
      <option value="11" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("11", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(11, date("n")))) {echo "selected=\"selected\"";} ?>>11</option>
      <option value="12" <?php if (isset($_SESSION['ser_logmonth'])) {	
		if (!(strcmp("12", "{$_SESSION['ser_logmonth']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(12, date("n")))) {echo "selected=\"selected\"";} ?>>12</option>
    </select> / <select name="logday" id="logday">
      <option value="" selected="selected"><?php echo $multilingual_taskf_day; ?></option>
      <option value="01" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("01", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?> >01</option>
      <option value="02" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("02", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>02</option>
      <option value="03" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("03", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>03</option>
      <option value="04" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("04", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>04</option>
      <option value="05" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("05", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>05</option>
      <option value="06" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("06", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>06</option>
      <option value="07" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("07", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>07</option>
      <option value="08" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("08", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>08</option>
      <option value="09" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("09", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>09</option>
      <option value="10" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("10", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>10</option>
      <option value="11" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("11", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>11</option>
      <option value="12" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("12", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>12</option>
      <option value="13" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("13", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>13</option>
      <option value="14" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("14", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>14</option>
      <option value="15" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("15", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>15</option>
      <option value="16" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("16", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>16</option>
      <option value="17" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("17", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>17</option>
      <option value="18" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("18", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>18</option>
      <option value="19" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("19", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>19</option>
      <option value="20" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("20", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>20</option>
      <option value="21" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("21", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>21</option>
      <option value="22" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("22", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>22</option>
      <option value="23" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("23", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>23</option>
      <option value="24" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("24", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>24</option>
      <option value="25" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("25", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>25</option>
      <option value="26" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("26", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>26</option>
      <option value="27" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("27", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>27</option>
      <option value="28" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("28", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>28</option>
      <option value="29" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("29", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>29</option>
      <option value="30" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("30", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>30</option>
      <option value="31" <?php if (isset($_SESSION['ser_logday'])) {	
		if (!(strcmp("31", "{$_SESSION['ser_logday']}"))) {
			echo "selected=\"selected\"";
			}
		}?>>31</option>
    </select>
	<input type="button" value="<?php echo $multilingual_global_action_ok; ?>" class="button" onclick= "return   searchtask(); " />
	
	<input type="button" name="export" id="export" value="<?php echo $multilingual_global_excel; ?>"  class="button" onclick= "return   exportexcel(); " />
 </form>
 </div>
  </td>
  </tr>
  <tr>
    <td>
	<?php if ($totalRows_Recordset_log > 0) { ?>
    <div >
    <table  class="table table-striped table-hover"  width="100%" >
 <thead>
<tr>
<th>
<?php echo $multilingual_global_log; ?>
</th>
<th>
<?php echo $multilingual_user_view_cost; ?>
</th>
<th>
<?php echo $multilingual_user_view_status; ?>
</th>
<th>
<?php echo $multilingual_user_view_project2; ?>
</th>
<th>
<?php echo $multilingual_project_file_update; ?>
</th>
<th>

</th>
</tr>
</thead>
<tbody>

  <?php do { ?>
<tr>
      <td >
<?php echo $row_DetailRS1['tk_display_name']; ?> <?php echo $multilingual_user_view_by; ?> 
	   
<?php 
$logdate = $row_Recordset_log['csa_tb_year'];
$logyear = str_split($logdate,4);
$logmonth = str_split($logyear[1],2);
echo $logyear[0]; ?>-<?php echo $logmonth[0]; ?>-<?php echo $logmonth[1]; ?>	



	  <?php echo $multilingual_user_view_do; ?>  
	  <?php echo $row_Recordset_log['task_tpye']; ?> - 
	  <a href="default_task_edit.php?editID=<?php echo $row_Recordset_log['TID']; ?>" >
	  <?php echo $row_Recordset_log['csa_text']; ?></a>
	  
	  <?php if($row_Recordset_log['csa_tb_text']<>null){ echo "<br/><span class='gray'>".$row_Recordset_log['csa_tb_text']."</span>"; }?>
</td>
<td>
<?php echo $row_Recordset_log['csa_tb_manhour']; ?> <?php echo $multilingual_user_view_hour; ?>
</td>
<td>
 <?php echo $row_Recordset_log['task_status_display']; ?>
</td>
<td>
<a href="project_view.php?recordID=<?php echo $row_Recordset_log['csa_project']; ?>">
  <?php echo $row_Recordset_log['project_name']; ?></a>
</td>
<td>
<?php echo $row_Recordset_log['csa_tb_lastupdate']; ?>
</td>
</tr>
     <?php
} while ($row_Recordset_log = mysql_fetch_assoc($Recordset_log));
  $rows = mysql_num_rows($Recordset_log);
  if($rows > 0) {
      mysql_data_seek($Recordset_log, 0);
	  $row_Recordset_log = mysql_fetch_assoc($Recordset_log);
  }
?>
</tbody>
</table>
</div>
<table class="rowcon" border="0" align="center">
<tr>
<td>   <table border="0">
        <tr>
          <td><?php if ($pageNum_Recordset_log > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_log=%d%s", $currentPage, 0, $queryString_Recordset_log); ?>#task"><?php echo $multilingual_global_first; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_log > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_log=%d%s", $currentPage, max(0, $pageNum_Recordset_log - 1), $queryString_Recordset_log); ?>#task"><?php echo $multilingual_global_previous; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_log < $totalPages_Recordset_log) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_log=%d%s", $currentPage, min($totalPages_Recordset_log, $pageNum_Recordset_log + 1), $queryString_Recordset_log); ?>#task"><?php echo $multilingual_global_next; ?></a>
              <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Recordset_log < $totalPages_Recordset_log) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_log=%d%s", $currentPage, $totalPages_Recordset_log, $queryString_Recordset_log); ?>#task"><?php echo $multilingual_global_last; ?></a>
              <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
<td align="right">   <?php echo ($startRow_Recordset_log + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_log + $maxRows_Recordset_log, $totalRows_Recordset_log) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_log ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table> 

<?php } else { ?>
<div class="alert" style="margin:6px;">
    <?php echo $multilingual_user_view_nolog; ?>
</div>

<?php }  ?>
 </td>
</tr>
</table>  



<?php }  ?>
 <!-- log end-->
 </div>

<div class="tab_b" id="tab_a2" 
<?php if ($user_totallog > 0) { 
echo "style='display:none'";
} else {
echo "style='display:block'";
} ?>
>
<!-- task start-->
<?php if ($totalRows_Recordset_task > 0) {  ?>
 <table width="100%">

  <tr>
    <td colspan="2">
    

    <table class="table table-striped table-hover glink">
<thead >
        
        <tr>
          <th>ID</th>
          <th><?php echo $multilingual_default_task_title; ?></th>
          <th><?php echo $multilingual_default_task_status; ?></th>
          <th><?php echo $multilingual_default_task_planstart; ?></th>
          <th><?php echo $multilingual_default_task_planend; ?></th>
          <th><?php echo $multilingual_default_task_project; ?></th>
          <th><?php echo $multilingual_default_task_priority; ?></th>
          <th><?php echo $multilingual_default_tasklevel; ?></th>
        </tr>
        </thead>
        <tbody>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset_task['TID']; ?></td>
            <td class="task_title"  title="<?php echo $row_Recordset_task['csa_text']; ?> "><div  class="text_overflow_150 task_title"><a href="default_task_edit.php?editID=<?php echo $row_Recordset_task['TID']; ?>" ><b>[<?php echo $row_Recordset_task['task_tpye']; ?>]</b> <?php echo $row_Recordset_task['csa_text']; ?></a></div></td>
            <td><?php echo $row_Recordset_task['task_status_display']; ?></td>
            <td ><?php echo $row_Recordset_task['csa_plan_st']; ?></td>
            <td ><?php echo $row_Recordset_task['csa_plan_et']; ?></td>
            <td class="task_title"><a href="project_view.php?recordID=<?php echo $row_Recordset_task['csa_project']; ?>"><?php echo $row_Recordset_task['project_name_prt']; ?></a></td>
            <td>
			<?php
switch ($row_Recordset_task['csa_priority'])
{
case 5:
  echo $multilingual_dd_priority_p5;
  break;
case 4:
  echo $multilingual_dd_priority_p4;
  break;
case 3:
  echo $multilingual_dd_priority_p3;
  break;
case 2:
  echo $multilingual_dd_priority_p2;
  break;
case 1:
  echo $multilingual_dd_priority_p1;
  break;
}
?>			</td>
            <td>
			<?php
switch ($row_Recordset_task['csa_temp'])
{
case 5:
  echo $multilingual_dd_level_l5;
  break;
case 4:
  echo $multilingual_dd_level_l4;
  break;
case 3:
  echo $multilingual_dd_level_l3;
  break;
case 2:
  echo $multilingual_dd_level_l2;
  break;
case 1:
  echo $multilingual_dd_level_l1;
  break;
}
?>			</td>
          </tr>
          <?php } while ($row_Recordset_task = mysql_fetch_assoc($Recordset_task)); ?>
		  </tbody>
      </table>


     
      <table class="rowcon" border="0" align="center">
<tr>
<td>   <table border="0">
        <tr>
          <td><?php if ($pageNum_Recordset_task > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_task=%d%s", $currentPage, 0, $queryString_Recordset_task); ?>&tab=2#task"><?php echo $multilingual_global_first; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_task > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_task=%d%s", $currentPage, max(0, $pageNum_Recordset_task - 1), $queryString_Recordset_task); ?>&tab=2#task"><?php echo $multilingual_global_previous; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_task < $totalPages_Recordset_task) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_task=%d%s", $currentPage, min($totalPages_Recordset_task, $pageNum_Recordset_task + 1), $queryString_Recordset_task); ?>&tab=2#task"><?php echo $multilingual_global_next; ?></a>
              <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Recordset_task < $totalPages_Recordset_task) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_task=%d%s", $currentPage, $totalPages_Recordset_task, $queryString_Recordset_task); ?>&tab=2#task"><?php echo $multilingual_global_last; ?></a>
              <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
<td align="right">   <?php echo ($startRow_Recordset_task + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_task + $maxRows_Recordset_task, $totalRows_Recordset_task) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_task ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>      </td>
</tr>
</table>
    <?php }  ?>
  <!-- task end-->
  
 
</div>
<div class="tab_b" id="tab_a3" 

<?php if ($user_totallog == 0 && $totalRows_Recordset_task == 0) { 
echo "style='display:block'";
} else {
echo "style='display:none'";
} ?>>
<!-- project start--> 
<?php if ($totalRows_Recordset_prj > 0) { ?>
 <table width="100%">

  <tr>
    <td colspan="2">
    <table class="table table-striped table-hover glink">
<thead>
  <tr>
    <th><?php echo $multilingual_project_id; ?></th>
    <th><?php echo $multilingual_project_title; ?></th>
    <th><?php echo $multilingual_project_code; ?></th>
    <th><?php echo $multilingual_project_start; ?></th>
    <th><?php echo $multilingual_project_end; ?></th>
    <th><?php echo $multilingual_project_status; ?></th>
    <th><?php echo $multilingual_global_lastupdate; ?></th>
  </tr>
</thead>
<tbody>
  <?php do { ?>
<tr>
      <td><?php echo $row_Recordset_prj['id']; ?></td>
      <td class="task_title"><span class="task_title"><a href="project_view.php?recordID=<?php echo $row_Recordset_prj['id']; ?>"><?php echo $row_Recordset_prj['project_name']; ?></a></span>&nbsp;</td>
      <td><?php echo $row_Recordset_prj['project_code']; ?>&nbsp;</td>
      <td><?php echo $row_Recordset_prj['project_start']; ?>&nbsp;</td>
      <td><?php echo $row_Recordset_prj['project_end']; ?>&nbsp;</td>
  <td><?php echo $row_Recordset_prj['task_status_display']; ?></td>
      <td><?php echo $row_Recordset_prj['project_lastupdate']; ?></td>
</tr>
     <?php
} while ($row_Recordset_prj = mysql_fetch_assoc($Recordset_prj));
  $rows = mysql_num_rows($Recordset_prj);
  if($rows > 0) {
      mysql_data_seek($Recordset_prj, 0);
	  $row_Recordset_prj = mysql_fetch_assoc($Recordset_prj);
  }
?>
</tbody>
</table>

<table class="rowcon" border="0" align="center">
<tr>
<td>  <table border="0">
  <tr>
    <td><?php if ($pageNum_Recordset_prj > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset_prj=%d%s", $currentPage, 0, $queryString_Recordset_prj); ?>&tab=3#task"><?php echo $multilingual_global_first; ?></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset_prj > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset_prj=%d%s", $currentPage, max(0, $pageNum_Recordset_prj - 1), $queryString_Recordset_prj); ?>&tab=3#task"><?php echo $multilingual_global_previous; ?></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset_prj < $totalPages_Recordset_prj) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset_prj=%d%s", $currentPage, min($totalPages_Recordset_prj, $pageNum_Recordset_prj + 1), $queryString_Recordset_prj); ?>&tab=3#task"><?php echo $multilingual_global_next; ?></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Recordset_prj < $totalPages_Recordset_prj) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset_prj=%d%s", $currentPage, $totalPages_Recordset_prj, $queryString_Recordset_prj); ?>&tab=3#task"><?php echo $multilingual_global_last; ?></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table></td>
<td align="right">   <?php echo ($startRow_Recordset_prj + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_prj + $maxRows_Recordset_prj, $totalRows_Recordset_prj) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_prj ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table> </td></tr>   
 
 </table>
 <?php }  ?>
<!-- project end-->
</div>

</div>
			</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      <td width="30%" class="input_task_right_bg" valign="top"><table width="96%" border="0" cellspacing="0" cellpadding="5" align="right">
          <tr>
            <td valign="top" width="30%">&nbsp;</td>
            <td valign="top" width="70%">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
		  <?php if($row_DetailRS1['tk_user_email'] <> null) { ?>
          <tr>
            <td valign="top"><?php echo $multilingual_user_email; ?></td>
            <td valign="top"><a href="mailto:<?php echo $row_DetailRS1['tk_user_email']; ?>"><?php echo $row_DetailRS1['tk_user_email']; ?></a></td>
          </tr>
		  <?php } ?>
		  <?php if($row_DetailRS1['tk_user_contact'] <> null) { ?>
          <tr>
            <td valign="top"><?php echo $multilingual_user_contact; ?></td>
            <td valign="top"><?php echo $row_DetailRS1['tk_user_contact']; ?></td>
          </tr>
		  <?php } ?>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top"><?php echo $multilingual_user_role; ?></td>
            <td valign="top"><?php
switch ($row_DetailRS1['tk_user_rank'])
{
case 0:
  echo $multilingual_dd_role_disabled;
  break;
case 1:
  echo $multilingual_dd_role_readonly;
  break;
case 2:
  echo $multilingual_dd_role_guest;
  break;
case 3:
  echo $multilingual_dd_role_general;
  break;
case 4:
  echo $multilingual_dd_role_pm;
  break;
case 5:
  echo $multilingual_dd_role_admin;
  break;
}
?>			</td>
          </tr>
		  <?php if($row_DetailRS1['tk_user_rank']>0){ ?>
          <tr>
            <td valign="top"><?php echo $multilingual_user_level; ?></td>
            <td valign="top"><div class="iconok float_left" style="margin-top:3px;"></div><div class="float_left">&nbsp;<?php echo $multilingual_rank1; ?></div></td>
          </tr>
		  <?php }?>
		  <?php if($row_DetailRS1['tk_user_rank']>1){ ?>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><div class="iconok float_left" style="margin-top:3px;"></div><div class="float_left">&nbsp;<?php echo $multilingual_rank2; ?></div></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><div class="iconok float_left" style="margin-top:3px;"></div><div class="float_left">&nbsp;<?php echo $multilingual_rank3; ?></div></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><div class="iconok float_left" style="margin-top:3px;"></div><div class="float_left">&nbsp;<?php echo $multilingual_rank4; ?></div></td>
          </tr>
		  <?php }?>
		  <?php if($row_DetailRS1['tk_user_rank']>2){ ?>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><div class="iconok float_left" style="margin-top:3px;"></div><div class="float_left">&nbsp;<?php echo $multilingual_rank5; ?></div></td>
          </tr>
		  <?php }?>
		  <?php if($row_DetailRS1['tk_user_rank']>3){ ?>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><div class="iconok float_left" style="margin-top:3px;"></div><div class="float_left">&nbsp;<?php echo $multilingual_rank6; ?></div></td>
          </tr>
		  <?php }?>
		  <?php if($row_DetailRS1['tk_user_rank']>4){ ?>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><div class="iconok float_left" style="margin-top:3px;"></div><div class="float_left">&nbsp;<?php echo $multilingual_rank7; ?></div></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><div class="iconok float_left" style="margin-top:3px;"></div><div class="float_left">&nbsp;<?php echo $multilingual_rank8; ?></div></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><div class="iconok float_left" style="margin-top:3px;"></div><div class="float_left">&nbsp;<?php echo $multilingual_rank9; ?></div></td>
          </tr>
         
		  <?php }?>
		   <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </table>
<?php require('foot.php'); ?>
</body>
</html><?php
mysql_free_result($DetailRS1);
mysql_free_result($Recordset_task);
?>