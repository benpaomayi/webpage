﻿<?php require_once('config/tank_config.php'); ?>
<?php require_once('session_unset.php'); ?>
<?php require_once('session.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$pagetabs = "allprj";
if (isset($_GET['pagetab'])) {
  $pagetabs = $_GET['pagetab'];
}

$multilingual_breadcrumb_prjlisturl;
if($pagetabs=="mprj"){
$multilingual_breadcrumb_prjlisturl = "<a href='project.php'>". $multilingual_project_myprj."</a>";
}else if ($pagetabs=="jprj") {
$multilingual_breadcrumb_prjlisturl = "<a href='project.php?pagetab=jprj'>". $multilingual_project_jprj."</a>";
}else if ($pagetabs=="allprj"){
$multilingual_breadcrumb_prjlisturl = "<a href='project.php?pagetab=allprj'>". $multilingual_project_allprj."</a>";
} 

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
$query_DetailRS1 = sprintf("SELECT * FROM tk_project 
inner join tk_user on tk_project.project_to_user=tk_user.uid 
inner join tk_status_project on tk_project.project_status=tk_status_project.psid 
WHERE tk_project.id = %s", GetSQLValueString($colname_DetailRS1, "int"));
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

$maxRows_Recordset_task = 15;
$pageNum_Recordset_task = 0;
if (isset($_GET['pageNum_Recordset_task'])) {
  $pageNum_Recordset_task = $_GET['pageNum_Recordset_task'];
}
$startRow_Recordset_task = $pageNum_Recordset_task * $maxRows_Recordset_task;

$colname_Recordset_task = $row_DetailRS1['id'];

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_task = sprintf("SELECT *
							FROM tk_task 								
							inner join tk_task_tpye on tk_task.csa_type=tk_task_tpye.id								
							inner join tk_user on tk_task.csa_to_user=tk_user.uid 
							inner join tk_status on tk_task.csa_remark2=tk_status.id 
								WHERE csa_project = %s AND csa_remark4 = '-1' ORDER BY csa_last_update DESC", GetSQLValueString($colname_Recordset_task, "text"));
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
$query_Recordset_sumlog =  sprintf("SELECT sum(csa_tb_manhour) as sum_hour FROM tk_task_byday WHERE csa_tb_backup3= %s ", GetSQLValueString($colname_DetailRS1, "text"));
$Recordset_sumlog = mysql_query($query_Recordset_sumlog, $tankdb) or die(mysql_error());
$row_Recordset_sumlog = mysql_fetch_assoc($Recordset_sumlog);

$maxRows_Recordset_comment = 10;
$pageNum_Recordset_comment = 0;
if (isset($_GET['pageNum_Recordset_comment'])) {
  $pageNum_Recordset_comment = $_GET['pageNum_Recordset_comment'];
}
$startRow_Recordset_comment = $pageNum_Recordset_comment * $maxRows_Recordset_comment;

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_comment = sprintf("SELECT * FROM tk_comment 
inner join tk_user on tk_comment.tk_comm_user =tk_user.uid 
								 WHERE tk_comm_pid = %s AND tk_comm_type = 2 
								
								ORDER BY tk_comm_lastupdate DESC", 
								GetSQLValueString($colname_DetailRS1, "text")
								);
$query_limit_Recordset_comment = sprintf("%s LIMIT %d, %d", $query_Recordset_comment, $startRow_Recordset_comment, $maxRows_Recordset_comment);
$Recordset_comment = mysql_query($query_limit_Recordset_comment, $tankdb) or die(mysql_error());
$row_Recordset_comment = mysql_fetch_assoc($Recordset_comment);

if (isset($_GET['totalRows_Recordset_comment'])) {
  $totalRows_Recordset_comment = $_GET['totalRows_Recordset_comment'];
} else {
  $all_Recordset_comment = mysql_query($query_Recordset_comment);
  $totalRows_Recordset_comment = mysql_num_rows($all_Recordset_comment);
}
$totalPages_Recordset_comment = ceil($totalRows_Recordset_comment/$maxRows_Recordset_comment)-1;

$queryString_Recordset_comment = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset_comment") == false && 
        stristr($param, "totalRows_Recordset_comment") == false && 
        stristr($param, "tab") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset_comment = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset_comment = sprintf("&totalRows_Recordset_comment=%d%s", $totalRows_Recordset_comment, $queryString_Recordset_comment);

$maxRows_Recordset_file = 15;
$pageNum_Recordset_file = 0;
if (isset($_GET['pageNum_Recordset_file'])) {
  $pageNum_Recordset_file = $_GET['pageNum_Recordset_file'];
}
$startRow_Recordset_file = $pageNum_Recordset_file * $maxRows_Recordset_file;

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_file = sprintf("SELECT * FROM tk_document 
inner join tk_user on tk_document.tk_doc_edit =tk_user.uid 
WHERE tk_doc_class1 = %s AND  tk_doc_class2 = 0 
								
								ORDER BY tk_doc_backup1 DESC, tk_doc_edittime DESC", 
								GetSQLValueString($colname_DetailRS1, "text")
								);
$query_limit_Recordset_file = sprintf("%s LIMIT %d, %d", $query_Recordset_file, $startRow_Recordset_file, $maxRows_Recordset_file);
$Recordset_file = mysql_query($query_limit_Recordset_file, $tankdb) or die(mysql_error());
$row_Recordset_file = mysql_fetch_assoc($Recordset_file);

if (isset($_GET['totalRows_Recordset_file'])) {
  $totalRows_Recordset_file = $_GET['totalRows_Recordset_file'];
} else {
  $all_Recordset_file = mysql_query($query_Recordset_file);
  $totalRows_Recordset_file = mysql_num_rows($all_Recordset_file);
}
$totalPages_Recordset_file = ceil($totalRows_Recordset_file/$maxRows_Recordset_file)-1;

$queryString_Recordset_file = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset_file") == false && 
        stristr($param, "totalRows_Recordset_file") == false && 
        stristr($param, "tab") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset_file = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset_file = sprintf("&totalRows_Recordset_file=%d%s", $totalRows_Recordset_file, $queryString_Recordset_file);


$maxRows_Recordset_log = 15;
$pageNum_Recordset_log = 0;
if (isset($_GET['pageNum_Recordset_log'])) {
  $pageNum_Recordset_log = $_GET['pageNum_Recordset_log'];
}
$startRow_Recordset_log = $pageNum_Recordset_log * $maxRows_Recordset_log;

$colname_Recordset_log = $colname_DetailRS1;

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
								inner join tk_user on tk_task_byday.csa_tb_backup2=tk_user.uid 
WHERE csa_tb_backup3 = %s AND csa_tb_year LIKE %s ORDER BY csa_tb_year DESC", 
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


$host_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"];
$host_url=strtr($host_url,"&","!");

if($row_Recordset_sumlog["sum_hour"] == null){
	  $sum_hour = 0;
	  } else {
	  $sum_hour = $row_Recordset_sumlog["sum_hour"];
	  }
	  	  
?>

<?php require('head.php'); ?>
<script type="text/javascript" src="srcipt/lhgcore.js"></script>
<script type="text/javascript" src="srcipt/lhgdialog.js"></script>
<script type="text/javascript" src="chart/js/swfobject.js"></script> 
<script type="text/javascript"> 
var flashvars = {"data-file":"chart_pie_project.php?recordID=<?php echo $row_DetailRS1['id']; ?>"};  
var params = {menu: "false",scale: "noScale",wmode:"opaque"};  
swfobject.embedSWF("chart/open-flash-chart.swf", "chart", "600px", "230px", 
 "9.0.0","expressInstall.swf", flashvars,params);  
</script>
<script type="text/javascript">
//禁止滚动条
$(document.body).css({
   "overflow-x":"hidden",
   "overflow-y":"hidden"
});
    
function addcomm()
{
    J.dialog.get({ id: "test1", title: '<?php echo "请提交成果相关文件"; ?>', width: 600, height: 500, page: "comment_add.php?taskid=<?php echo $row_DetailRS1['id']; ?>&projectid=1&type=2" });
}

function   searchtask() 
      {document.form1.action= "project_view.php?#task "; 
        document.form1.submit(); 
        return   true; 
      
      } 

function   exportexcel() 
      {document.form1.action= "excel_log.php "; 
        document.form1.submit(); 
        return   false; 
      
      } 
    
    $(document).ready(function() {
            var h = $(window).height(), h2;
            var h = h - <?php if($totalRows_Recordset_anc > 0) {echo "75";} else {echo "40";} ?>;
            $("#main_right").css("height", h);
            $(window).resize(function() {
                h2 = $(this).height();
                $("#main_right").css("height", h2);
            });
        })

    
</script>
<script type="text/javascript">
function addfolder()
{
    J.dialog.get({ id: "test2", title: '<?php echo $multilingual_project_file_addfolder; ?>', width: 500, height: 351, page: "file_add_folder.php?projectid=<?php echo $row_DetailRS1['id']; ?>&pid=0&folder=1&pagetab=allfile" });
}

    
</script>
<?php 
$tab = "-1";
if (isset($_GET['tab'])) {
  $tab = $_GET['tab'];
}

$tabid = $tab + 1;

if($tab <> "-1"){
echo "
<script language='javascript'>
function tabs1()
{
var len = ".$tabid.";
for (var i = 1; i <= len; i++)
{
document.getElementById('tab_a' + i).style.display = (i == ".$tabid.") ? 'block' : 'none';
document.getElementById('tab_' + i).className = (i == ".$tabid.") ? 'onhover' : 'none';
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

<script language="javascript">

//shenpi

function shenpi()
   { switch(<?php echo $row_DetailRS1['project_status'];?>)
       {case 2: window.location= "default_task_add.php?projectID=<?php echo $row_DetailRS1['id']; ?>&formproject=1";
        break;
        case 4: window.location = "default_task_add2_MY.php?projectID=<?php echo $row_DetailRS1['id']; ?>&formproject=1";
        break;
        case 5:window.location = "default_task_add3_MY.php?projectID=<?php echo $row_DetailRS1['id']; ?>&formproject=1";
       break;
	   }
 
    }
</script>

<body <?php if($tab <> "-1"){ echo "onload='tabs1();'";}?>>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
	<td width="295px" class="input_task_right_bg" valign="top"><table width="290px" border="0" cellspacing="0" cellpadding="5" align="center">
        <tr>
          <td valign="top"><?php
		  $project_id = $row_DetailRS1['id'];
		  $project_name = $row_DetailRS1['project_name'];
		  $node_id_task = -1;
 require_once('tree.php'); ?></td>
        </tr>
      
      </table></td>
      <td valign="top">
         <div style="overflow:auto; " id="main_right"><!-- right main --> 
          <table width="98%" border="0" cellspacing="0" cellpadding="5" align="center">
          <tr>
            <td >
			<ul class="breadcrumb">
			<li><?php echo $multilingual_breadcrumb_prjlisturl; ?> <span class="divider">/</span></li>
			<li><?php echo $multilingual_project_view_title; ?></li>
			<li class="float_right"><?php echo $multilingual_project_id; ?>: <?php echo $row_DetailRS1['id']; ?></li>
			</ul>
			</td>
          </tr>
          <tr>
            <td >
              <span class="breakwordsfloat_left"><h2><?php echo $row_DetailRS1['project_name']; ?></h2></span> </td>
          </tr>
		  <tr>
		  <td>
		  <table width="100%" border="0" cellspacing="0" cellpadding="5"  class="info_task_bg">
  <tr>
    <td width="10%" class="info_task_title"><?php echo $multilingual_project_status; ?></td>
    <td  width="28%"><div class="status_view"><?php echo $row_DetailRS1['task_status_display']; ?></div></td>
    
    <td class="info_task_title">
	<?php if ($row_DetailRS1['project_code'] <> " " && $row_DetailRS1['project_code'] <> "") {  ?>
	<?php echo $multilingual_project_code; ?>
	<?php } ?>
	</td>
    <td>
	<?php if ($row_DetailRS1['project_code'] <> " " && $row_DetailRS1['project_code'] <> "") {  ?>
	<?php echo $row_DetailRS1['project_code']; ?>
	<?php } ?>
	</td>
 <!-- 已用工时     
    <td  width="14%" class="info_task_title"><?php echo $multilingual_tasklog_cost; ?></td> 
    <td><?php 
	  echo $sum_hour;?> <?php echo $multilingual_project_hour; ?></td>
--> 
	  <td  width="12%" class="info_task_title">
	<?php if ($row_DetailRS1['project_start'] <> "0000-00-00") {  ?>
	<?php echo $multilingual_project_start; ?>
	<?php } ?>	</td>
    <td  width="17%"><?php if ($row_DetailRS1['project_start'] <> "0000-00-00") {  ?>
	<?php echo $row_DetailRS1['project_start']; ?>
	<?php } ?></td>
  </tr>
  <tr>
    <td class="info_task_title"><?php echo $multilingual_project_touser; ?></td>
    <td><a href="user_view.php?recordID=<?php echo $row_DetailRS1['project_to_user']; ?>"><?php echo $row_DetailRS1['tk_display_name']; ?></a></td>
    
    <td></td>
    <td></td>
    <td class="info_task_title">
	<?php if ($row_DetailRS1['project_end'] <> "0000-00-00") {  ?>
	<?php echo $multilingual_project_end; ?>
	<?php } ?>	</td>
    <td><?php if ($row_DetailRS1['project_end'] <> "0000-00-00") {  ?>
	<?php echo $row_DetailRS1['project_end']; ?>
	<?php } ?></td>
  </tr>
</table>
		  </td>
		  </tr>
		  <tr>
            <td>
			<table width="100%">
		     <tr>
	
		<!-- 提交审批      
             <?php if($_SESSION['MM_rank'] > "2") { ?>
			 <td width="12%">
			 <a href="default_task_add.php?projectID=<?php echo $row_DetailRS1['id']; ?>&formproject=1" >
			 <i class="icon-random"></i> <?php echo $multilingual_project_newtask; ?>			 </a>			 </td>
			 <?php }  ?>
		-->		 
	<!-- 论文专利和软著提交审批-MY  
			<?php if($_SESSION['MM_rank'] > "2") { ?>
			 <td width="20%">			 			
			 <i class="icon-random"></i><?php echo $multilingual_project_newtask.$multilingual_project_newtask1; ?>
			   <a href="default_task_add.php?projectID=<?php echo $row_DetailRS1['id']; ?>&formproject=1" >论文 </a>
			   <a href="default_task_add2_MY.php?projectID=<?php echo $row_DetailRS1['id']; ?>&formproject=1" >专利 </a>
			   <a href="default_task_add3_MY.php?projectID=<?php echo $row_DetailRS1['id']; ?>&formproject=1" >软著 </a>	
			   	<?php echo $multilingual_project_newtask2; ?>	 			 			 
			 </td>
			 <?php }  ?>
		-->   
			<?php if($_SESSION['MM_rank'] > "2") { ?>
			 <td width="20%">	
			<i class="icon-random"></i>
				
		    <input type="button"  id="btn_tijao" value="提交审批" onclick="shenpi()"> 
			 </td>
			 <?php }  ?>
		  		
					 
			 <?php if($_SESSION['MM_rank'] > "1") { ?>
			 <td width="12%">
			 <a onClick="addcomm();" class="mouse_over"><i class="icon-comment"></i> <?php echo "提交论文(专利)"; ?></a></td>
			 <td width="13%">
			 <a onClick="addfolder()" class="mouse_hover"><i class="icon-folder-open"></i> <?php echo $multilingual_project_file_addfolder; ?></a>			 </td>
			 <td width="12%">
			 <a  target="_blank" href="file_add.php?projectid=<?php echo $row_DetailRS1['id']; ?>&pid=0&pagetab=allfile"><i class="icon-file"></i> <?php echo $multilingual_project_file_addfile; ?></a>			 </td>			 
			 <?php } ?>
			 
			 <?php if($_SESSION['MM_rank'] > "3" || $_SESSION['MM_uid'] == $row_DetailRS1['project_to_user']) { ?>
			 <td width="10%">
			 <a href="project_edit.php?editID=<?php echo $row_DetailRS1['id']; ?>">
			 <i class="icon-pencil"></i> <?php echo $multilingual_global_action_edit; ?>			 </a>			 </td>
			 <?php }  ?> 
			 <?php if($_SESSION['MM_rank'] > "3")  {  ?>
			 <td width="10%">
			 <a class="mouse_over" onClick="javascript:if(confirm( '<?php 
	 if($totalRows_Recordset_task == "0"){  
	  echo $multilingual_global_action_delconfirm;
	  } else { echo $multilingual_global_action_delconfirm3;} ?>'))self.location='project_del.php?delID=<?php echo $row_DetailRS1['id']; ?>';">
	  <i class="icon-remove"></i> <?php echo $multilingual_global_action_del; ?>	  </a>			 </td>
			 <?php }  ?> 

<!-- 返回 			
			 <td>
			 <a class="mouse_over" onClick="javascript:history.go(-1)">
			 <i class="icon-arrow-left"></i> <?php echo $multilingual_global_action_back; ?>			 </a>			 </td>
-->			
			 <td>			 </td>
			 </tr>
			</table>	  </td>
          </tr>
<?php if ($row_DetailRS1['project_text'] <> "&nbsp;" && $row_DetailRS1['project_text'] <> "") {  ?>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="font_big18 fontbold"><?php echo $multilingual_project_description; ?></span></td>
          </tr>
          <tr>
            <td><?php echo $row_DetailRS1['project_text']; ?></td>
          </tr>
		  <?php } // Show if recordset not empty ?>
		  <?php if ($row_DetailRS1['project_from_contact'] <> "" && $row_DetailRS1['project_from_contact'] <> " ") { // Show if recordset not empty ?>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="font_big18 fontbold"><?php echo $multilingual_project_view_section2; ?></span></td>
          </tr>
          <tr>
            <td>
			<?php 
	
	$row_DetailRS1['project_from_contact']   =   htmlspecialchars($row_DetailRS1['project_from_contact']);  
	$row_DetailRS1['project_from_contact']   =   str_replace("\n",   "<br>",   $row_DetailRS1['project_from_contact']);  
	$row_DetailRS1['project_from_contact']   =   str_replace("     ",   "&nbsp;",   $row_DetailRS1['project_from_contact']);   
	echo $row_DetailRS1['project_from_contact']; 
	
	?>			</td>
          </tr>
		  <?php } // Show if recordset not empty ?>
		  <?php 
		  
		  
		  if ($sum_hour > 0.5) {  ?>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="font_big18 fontbold"><?php echo $multilingual_project_taskoverlay; ?></span></td>
          </tr>
          <tr>
            <td>
	<div id="chart"></div>		</td>
          </tr>
		  <?php }  ?>
		  <tr>
            <td>&nbsp;</td>
          </tr>
		  
		<?php if($totalRows_Recordset_comment > 0){ ?>
	<tr >
      <td><span class="font_big18 fontbold"><?php echo "论文或专利下载"; ?></span><a name="comment"></a></td>
    </tr>
		  <tr>
		    <td>
			<table class="table table-striped table-hover glink">
			<?php do { ?>
		<tr >
      <td >
	  <div class="float_left gray">
	  
	  <a href="user_view.php?recordID=<?php echo $row_Recordset_comment['tk_comm_user']; ?>"><?php echo $row_Recordset_comment['tk_display_name']; ?></a> 
	  <?php echo $multilingual_default_by; ?>
	  <?php echo $row_Recordset_comment['tk_comm_lastupdate']; ?> 
	  <?php echo "提交的论文或专利"; ?>	  </div>
	  <div class="float_right">
	  <?php if($_SESSION['MM_rank'] > "1") { ?>
	  <?php if ($_SESSION['MM_rank'] > "4" || $row_Recordset_comment['tk_comm_user'] == $_SESSION['MM_uid']) {  ?>
	  <?php
	  $coid =$row_Recordset_comment['coid'];
	  $editcomment_row = "
<script type='text/javascript'>
	  function editcomm$coid()
{
    J.dialog.get({ id: 'test3', title: '$multilingual_default_editcom', width: 600, height: 500, page: 'comment_edit.php?editcoID=$coid' });
}
</script>";

echo $editcomment_row;
?>
	  <a onClick="editcomm<?php echo $coid; ?>();" class="mouse_hover">
	  <?php echo $multilingual_global_action_edit; ?></a>
	  
	  <?php if ($_SESSION['MM_Username'] <> $multilingual_dd_user_readonly) {  ?>
	   <a  class="mouse_hover" 
	  onclick="javascript:if(confirm( '<?php 
	  echo $multilingual_global_action_delconfirm; ?>'))self.location='comment_del.php?delID=<?php echo $row_Recordset_comment['coid']; ?>&projectID=<?php echo $row_DetailRS1['id']; ?>';"
	  ><?php echo $multilingual_global_action_del; ?></a>
	  <?php } else {  
	   echo $multilingual_global_action_del; 
	    }  ?>
	  <?php } ?>
	  <?php } ?>
	  </div>
	  <?php 
	echo "<br />".$row_Recordset_comment['tk_comm_title']; 
	?>	  </td>
    </tr>
	<?php
} while ($row_Recordset_comment = mysql_fetch_assoc($Recordset_comment));
  $rows = mysql_num_rows($Recordset_comment);
  if($rows > 0) {
      mysql_data_seek($Recordset_comment, 0);
	  $row_Recordset_comment = mysql_fetch_assoc($Recordset_comment);
  }
?>
			</table>
			<table class="rowcon" border="0" align="center">
<tr>
<td>   <table border="0">
        <tr>
          <td><?php if ($pageNum_Recordset_comment > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_comment=%d%s", $currentPage, 0, $queryString_Recordset_comment); ?>#comment"><?php echo $multilingual_global_first; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_comment > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_comment=%d%s", $currentPage, max(0, $pageNum_Recordset_comment - 1), $queryString_Recordset_comment); ?>#comment"><?php echo $multilingual_global_previous; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_comment < $totalPages_Recordset_comment) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_comment=%d%s", $currentPage, min($totalPages_Recordset_comment, $pageNum_Recordset_comment + 1), $queryString_Recordset_comment); ?>#comment"><?php echo $multilingual_global_next; ?></a>
              <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Recordset_comment < $totalPages_Recordset_comment) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_comment=%d%s", $currentPage, $totalPages_Recordset_comment, $queryString_Recordset_comment); ?>#comment"><?php echo $multilingual_global_last; ?></a>
              <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
<td align="right">   <?php echo ($startRow_Recordset_comment + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_comment + $maxRows_Recordset_comment, $totalRows_Recordset_comment) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_comment ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>			</td>
	    </tr>
		<?php } ?>

		  <tr>
            <td>
			<!-- tab start -->
			<div class="tab">
<ul class="menu" id="menutitle">

<li id="tab_1"  class="onhover" 
<?php if ($totalRows_Recordset_task == 0) { echo "style='display:none'"; }?>>

<a href="javascript:void(0)" onClick="tabs('1');" >
<?php echo $multilingual_default_task_subtask; ?></a></li>

<li id="tab_2" 
<?php if ($totalRows_Recordset_task == 0 ) { echo "class='onhover'"; }?> 
<?php if ($totalRows_Recordset_file == 0) { echo "style='display:none'"; }?>>
<a href="javascript:void(0)" onClick="tabs('2');" >
<?php echo $multilingual_project_file; ?></a></li>

<!-- 项目日志 
<li id="tab_3" 
<?php if ($totalRows_Recordset_task == 0 && $totalRows_Recordset_file == 0) { echo "class='onhover'"; }?> 
<?php if ($totalRows_Recordset_task == 0) { echo "style='display:none'"; }?>>
<a href="javascript:void(0)" onClick="tabs('3');" >
<?php echo $multilingual_project_view_log; ?></a></li>
-->



<?php if ($totalRows_Recordset_file <> 0 ||  $totalRows_Recordset_task <> 0) { ?>
<li >&nbsp;</li><li >&nbsp;</li>
<?php }?><a name="task"></a>
</ul>


<!-- task start -->
<div class="tab_b" id="tab_a1" 

<?php if ($totalRows_Recordset_task > 0) { 
echo "style='display:block'";
} else {
echo "style='display:none'";
} ?>>

<?php if ($totalRows_Recordset_task > 0) { // Show if recordset not empty ?>
  <table width="100%">
  <tr>
    <td colspan="2">

    <table class="table table-striped table-hover glink">
<thead >
        
        <tr>
          <th><?php echo $multilingual_default_task_id; ?></th>
          <th><?php echo $multilingual_default_task_title; ?></th>
          <th><?php echo $multilingual_default_task_to; ?></th>
          <th><?php echo $multilingual_default_task_status; ?></th>
          <th><?php echo $multilingual_default_task_planstart; ?></th>
          <th><?php echo $multilingual_default_task_planend; ?></th>
        <!-- 论文类型  
          <th><?php echo $multilingual_default_task_priority; ?></th>
        -->   
          <th><?php echo $multilingual_default_tasklevel; ?></th>
        </tr>
        </thead>
        <tbody>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset_task['TID']; ?></td>
            <td class="task_title">
			<div  class="text_overflow_150 task_title"  title="<?php echo $row_Recordset_task['csa_text']; ?>">
			
		<!--  	 
			   <a href="default_task_edit.php?editID=<?php echo $row_Recordset_task['TID']; ?>&pagetab=alltask" > 			
		-->	  
			  <b>[<?php echo $row_Recordset_task['task_tpye']; ?>]</b> <?php echo $row_Recordset_task['csa_text']; ?>			
		<!-- </a>-->
			 		
			</div></td>
            <td ><a href="user_view.php?recordID=<?php echo $row_Recordset_task['csa_to_user']; ?>"><?php echo $row_Recordset_task['tk_display_name']; ?></a></td>
            <td><?php echo $row_Recordset_task['task_status_display']; ?></td>
            <td><?php echo $row_Recordset_task['csa_plan_st']; ?></td>
            <td><?php echo $row_Recordset_task['csa_plan_et']; ?></td>
            
<!-- 论文类型             
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
            -->
            
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
              <a href="<?php printf("%s?pageNum_Recordset_task=%d%s", $currentPage, 0, $queryString_Recordset_task); ?>#task"><?php echo $multilingual_global_first; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_task > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_task=%d%s", $currentPage, max(0, $pageNum_Recordset_task - 1), $queryString_Recordset_task); ?>#task"><?php echo $multilingual_global_previous; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_task < $totalPages_Recordset_task) { // Show if not last page ?>
              <a href="<?php 
			  printf("%s?pageNum_Recordset_task=%d%s", $currentPage, min($totalPages_Recordset_task, $pageNum_Recordset_task + 1), $queryString_Recordset_task); ?>#task" ><?php echo $multilingual_global_next; ?></a>
			  <?php } // Show if not last page ?>			  </td>
          <td><?php if ($pageNum_Recordset_task < $totalPages_Recordset_task) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_task=%d%s", $currentPage, $totalPages_Recordset_task, $queryString_Recordset_task); ?>#task"><?php echo $multilingual_global_last; ?></a>
              <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
<td align="right">   <?php echo ($startRow_Recordset_task + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_task + $maxRows_Recordset_task, $totalRows_Recordset_task) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_task ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>      </td>
</tr>
</table>
<?php } // Show if recordset not empty ?>
</div>
<!-- task end -->

<!--file start -->
<div class="tab_b" id="tab_a2" 
<?php if ($totalRows_Recordset_task > 0) { 
echo "style='display:none'";
} else {
echo "style='display:block'";
} ?>
>

<?php if ($totalRows_Recordset_file > 0) {  ?>
<table class="table table-striped table-hover glink" >
<thead>
  <tr>
    <th>
	<?php echo $multilingual_project_file_management; ?>	</th>
	<th width="100px">
	<?php echo $multilingual_project_file_update_by; ?>	</th>
	<th width="130px">
	<?php echo $multilingual_project_file_update; ?>	</th>
	<th width="160px">	</th>
  </tr>
</thead>
<tbody>
	<?php do { ?>
		<tr>
      <td nowrap="nowrap">
	   <?php 
	  if($row_Recordset_file['tk_doc_backup1']=="1"){ ?>
	  <a href="file.php?recordID=<?php echo $row_Recordset_file['docid']; ?><?php 
	  if($row_Recordset_file['tk_doc_backup1']=="1"){
	  echo "&folder=".$row_Recordset_file['tk_doc_backup1'];
	  } ?>&projectID=<?php echo $colname_DetailRS1; ?>&pagetab=allfile
	  " class="icon_folder">
	  <?php echo $row_Recordset_file['tk_doc_title']; ?></a>
	  <?php }else{ ?>
	  
	  <a href="file_view.php?recordID=<?php echo $row_Recordset_file['docid']; ?>&projectID=<?php echo $colname_DetailRS1; ?>&pagetab=allfile
	  " class="icon_file" target="_blank">
	  <?php echo $row_Recordset_file['tk_doc_title']; ?></a>
	  <?php } ?>

	  
	 
	  <?php if ($row_Recordset_file['tk_doc_attachment'] <> null) {  ?>
	  <a href="<?php echo $row_Recordset_file['tk_doc_attachment']; ?>" class="icon_atc"><?php echo $multilingual_project_file_download; ?></a>
	  <?php } ?>	  </td>
	  <td>
	  <a href="user_view.php?recordID=<?php echo $row_Recordset_file['tk_doc_edit']; ?>">
	  <?php echo $row_Recordset_file['tk_display_name']; ?>	  </a>	  </td>
	  <td>
	  <?php echo $row_Recordset_file['tk_doc_edittime']; ?>	  </td>
	  <td>
	   <?php if ($row_Recordset_file['tk_doc_backup1'] <> "1") {  ?>
	   <a href="word.php?fileid=<?php echo $row_Recordset_file['docid']; ?>" class="icon_word"><?php echo $multilingual_project_file_word; ?></a> 
	 <?php } ?>
	 &nbsp;
	 
	 <?php if($_SESSION['MM_rank'] > "1") { ?>
	 <?php if ($row_Recordset_file['tk_doc_backup1'] == "1") {  ?>
	 <script type="text/javascript">
function editfolder<?php echo $row_Recordset_file['docid']; ?>()
{
    J.dialog.get({ id: "test", title: '<?php echo $multilingual_project_file_editfolder; ?>', width: 500, height: 351, page: "file_edit_folder.php?editID=<?php echo $row_Recordset_file['docid']; ?>&projectID=<?php echo $row_DetailRS1['id']; ?>&pid=0&folder=<?php echo $row_Recordset_file['tk_doc_backup1']; ?>" });
}
</script>
	   <a onClick="editfolder<?php echo $row_Recordset_file['docid']; ?>()" class="mouse_hover">
	  <?php echo $multilingual_global_action_edit; ?></a> 
	  <?php }else{ //如果是编辑文件 ?>
	  <a href="file_edit.php?editID=<?php echo $row_Recordset_file['docid']; ?>&projectID=<?php echo $row_DetailRS1['id']; ?>&pid=0" target="_blank">
	  <?php echo $multilingual_global_action_edit; ?></a> 
	  <?php } ?>
	  
	  
	  &nbsp;
	  <?php if ($_SESSION['MM_rank'] > "4" || $row_Recordset_file['tk_doc_create'] == $_SESSION['MM_uid']) {  ?>
	  
	  <?php if ($_SESSION['MM_Username'] <> $multilingual_dd_user_readonly) {  ?>
	   <a  class="mouse_hover" 
	  onclick="javascript:if(confirm( '<?php 
	  if ($row_Recordset_file['tk_doc_backup1'] == 0){
	  echo $multilingual_global_action_delconfirm;}
	  else {
	  echo $multilingual_global_action_delconfirm5;}
	   ?>'))self.location='file_del.php?delID=<?php echo $row_Recordset_file['docid']; ?>&projectID=<?php echo $row_DetailRS1['id']; ?>&pid=0&url=<?php echo $host_url; ?>';"
	  ><?php echo $multilingual_global_action_del; ?></a>
	  <?php } else {  
	   echo $multilingual_global_action_del; 
	    }  ?>
	  <?php }  ?><?php }  ?>	  </td>
    </tr>
    
	<?php
} while ($row_Recordset_file = mysql_fetch_assoc($Recordset_file));
  $rows = mysql_num_rows($Recordset_file);
  if($rows > 0) {
      mysql_data_seek($Recordset_file, 0);
	  $row_Recordset_file = mysql_fetch_assoc($Recordset_file);
  }
?>
</table>  
<table class="rowcon" border="0" align="center">
<tr>
<td>   <table border="0">
        <tr>
          <td><?php if ($pageNum_Recordset_file > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_file=%d%s", $currentPage, 0, $queryString_Recordset_file); ?>&tab=1#task"><?php echo $multilingual_global_first; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_file > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_file=%d%s", $currentPage, max(0, $pageNum_Recordset_file - 1), $queryString_Recordset_file); ?>&tab=1#task"><?php echo $multilingual_global_previous; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_file < $totalPages_Recordset_file) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_file=%d%s", $currentPage, min($totalPages_Recordset_file, $pageNum_Recordset_file + 1), $queryString_Recordset_file); ?>&tab=1#task"><?php echo $multilingual_global_next; ?></a>
              <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Recordset_file < $totalPages_Recordset_file) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_file=%d%s", $currentPage, $totalPages_Recordset_file, $queryString_Recordset_file); ?>&tab=1#task"><?php echo $multilingual_global_last; ?></a>
              <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
<td align="right">   <?php echo ($startRow_Recordset_file + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_file + $maxRows_Recordset_file, $totalRows_Recordset_file) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_file ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>
<?php }  ?>
</div>
<!--file end -->


<!--log start-->
<div class="tab_b" id="tab_a3" 
<?php if ($totalRows_Recordset_task == 0 && $totalRows_Recordset_file == 0) { 
echo "style='display:block'";
} else {
echo "style='display:none'";
} ?>
>
<?php if ($totalRows_Recordset_task  > 0) {  ?>




<table width="100%" cellpadding="5">
  <tr>
  <td>
  <div class="search_div">
<form id="form1" name="form1" method="get" class="saerch_form">
  <?php echo $multilingual_user_view_date; ?>
  <input name="recordID" id="recordID" value="<?php echo $colname_DetailRS1; ?>" style="display:none" />
  <input name="tab" id="tab" value="2" style="display:none" />
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
 </div>  </td>
  </tr>
  <tr>
    <td>
	<?php if ($totalRows_Recordset_log > 0) { ?>
    <div >
    <table class="table table-striped table-hover"  width="100%" >


 <thead>
<tr>
<th>
<?php echo $multilingual_global_log; ?></th>
<th>
<?php echo $multilingual_user_view_cost; ?></th>
<th>
<?php echo $multilingual_user_view_status; ?></th>
<th>
<?php echo $multilingual_user_view_project2; ?></th>
<th>
<?php echo $multilingual_project_file_update; ?></th>
<th></th>
</tr>
</thead>
<tbody>
  <?php do { ?>
<tr>
      <td class="glink">
<?php echo $row_Recordset_log['tk_display_name']; ?> <?php echo $multilingual_user_view_by; ?> 
	   
<?php 
$logdate = $row_Recordset_log['csa_tb_year'];
$logyear = str_split($logdate,4);
$logmonth = str_split($logyear[1],2);
echo $logyear[0]; ?>-<?php echo $logmonth[0]; ?>-<?php echo $logmonth[1]; ?>	



	  <?php echo $multilingual_user_view_do; ?>  
	  <?php echo $row_Recordset_log['task_tpye']; ?> - 
	  <a href="default_task_edit.php?editID=<?php echo $row_Recordset_log['TID']; ?>" >
	  <?php echo $row_Recordset_log['csa_text']; ?></a>

	  <?php if($row_Recordset_log['csa_tb_text']<>null){ echo "<br/><span class='gray'>".$row_Recordset_log['csa_tb_text']."</span>"; }?>  </td>

<td class="glink" width="80px">
 <?php echo $row_Recordset_log['csa_tb_manhour']; ?> <?php echo $multilingual_user_view_hour; ?></td>

<td class="glink" width="120px">
 <?php echo $row_Recordset_log['task_status_display']; ?></td>

<td class="glink" width="160px" >
 <a href="project_view.php?recordID=<?php echo $row_Recordset_log['csa_project']; ?>">
  <?php echo $row_Recordset_log['project_name']; ?></a></td>


  <td class="glink" width="120px" >
<?php echo $row_Recordset_log['csa_tb_lastupdate']; ?>  </td>
  <td class="glink" width="60px" >
<script>	  
function addcomment<?php echo $row_Recordset_log['tbid']; ?>()
{
    J.dialog.get({ id: 'test', title: '<?php echo $multilingual_default_task_section5; ?>', page: 'log_view.php?date=<?php echo $row_Recordset_log['csa_tb_year']; ?>&taskid=<?php echo $row_Recordset_log['csa_tb_backup1']; ?>' });
}
</script>
  <a class="mouse_hover" onClick="addcomment<?php echo $row_Recordset_log['tbid']; ?>()"><?php echo $multilingual_log_comment; ?><?php 
  if ($row_Recordset_log['csa_tb_comment'] > 0) {
  echo "(".$row_Recordset_log['csa_tb_comment'].")"; 
  }?></a>  </td>
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
              <a href="<?php printf("%s?pageNum_Recordset_log=%d%s", $currentPage, 0, $queryString_Recordset_log); ?>&tab=2#task"><?php echo $multilingual_global_first; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_log > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset_log=%d%s", $currentPage, max(0, $pageNum_Recordset_log - 1), $queryString_Recordset_log); ?>&tab=2#task"><?php echo $multilingual_global_previous; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset_log < $totalPages_Recordset_log) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_log=%d%s", $currentPage, min($totalPages_Recordset_log, $pageNum_Recordset_log + 1), $queryString_Recordset_log); ?>&tab=2#task"><?php echo $multilingual_global_next; ?></a>
              <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Recordset_log < $totalPages_Recordset_log) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset_log=%d%s", $currentPage, $totalPages_Recordset_log, $queryString_Recordset_log); ?>&tab=2#task"><?php echo $multilingual_global_last; ?></a>
              <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
<td align="right">   <?php echo ($startRow_Recordset_log + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_log + $maxRows_Recordset_log, $totalRows_Recordset_log) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_log ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table> 

<?php } else { ?>
<div class="alert" style="margin:6px;">
    <?php echo $multilingual_user_view_nolog; ?></div>

<?php }  ?> </td>
</tr>
</table>  
<?php }  ?>
</div>
<!-- log end-->
			<!-- tab end -->			
                </td>
          </tr>
        </table>
        <?php require('foot.php'); ?>
             </div><!-- right main -->
        </td>
    </tr>
  </table>

</body>
</html><?php
mysql_free_result($DetailRS1);
mysql_free_result($Recordset_task);
?>