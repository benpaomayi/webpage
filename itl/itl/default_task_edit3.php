<?php require_once('config/tank_config.php'); ?>
<?php require_once('session_unset.php'); ?>
<?php require_once('session.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];
 
$colname_Recordset_task = "-1";
if (isset($_GET['editID'])) {
  $colname_Recordset_task = $_GET['editID'];
}

$pagetabs = "mtask";
if (isset($_GET['pagetab'])) {
  $pagetabs = $_GET['pagetab'];
}

$multilingual_breadcrumb_tasklisturl;
if($pagetabs=="mtask"){
$multilingual_breadcrumb_tasklisturl = "<a href='index.php?select=&select_project=&select_year=".date("Y")."&textfield=".date("m")."&select3=-1&select4=".$_SESSION['MM_uid']."&select_prt=&select_temp=&inputtitle=&select1=-1&select2=%&create_by=%&select_type=&inputid=&inputtag='>". $multilingual_user_mytask."</a>";
}else if ($pagetabs=="ftask") {
$multilingual_breadcrumb_tasklisturl = "<a href='index.php?select=&select_project=&select_year=".date("Y")."&textfield=".date("m")."&select3=-1&select4=%&select_prt=&select_temp=&inputtitle=&select1=-1&select2=".$_SESSION['MM_uid']."&create_by=%&select_type=&inputid=&inputtag=&pagetab=ftask'>". $multilingual_default_fromme."</a>";
}else if ($pagetabs=="ctask"){
$multilingual_breadcrumb_tasklisturl = "<a href='index.php?select=&select_project=&select_year=".date("Y")."&textfield=".date("m")."&select3=-1&select4=%&select_prt=&select_temp=&inputtitle=&select1=-1&select2=%&create_by=".$_SESSION['MM_uid']."&select_type=&inputid=&inputtag=&pagetab=ctask'>". $multilingual_default_createme."</a>";
} else if ($pagetabs=="etask"){
$multilingual_breadcrumb_tasklisturl = "<a href='index.php?select=&select_project=&select_year=--&textfield=--&select3=-1&select4=%&select_prt=&select_temp=&select_exam=".$multilingual_dd_status_exam."&inputtitle=&select1=-1&select2=".$_SESSION['MM_uid']."&select_type=&inputid=&inputtag=&pagetab=etask'>". $multilingual_exam_wait."</a>";
}  else if ($pagetabs=="alltask"){
$multilingual_breadcrumb_tasklisturl = "<a href='index.php?select=&select_project=&select_year=".date("Y")."&textfield=".date("m")."&select3=-1&select4=%&select_prt=&select_temp=&inputtitle=&select1=-1&select2=%&create_by=%&select_type=&inputid=&inputtag=&pagetab=alltask'>". $multilingual_default_alltask."</a>";
}

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_task = sprintf("SELECT *, 
tk_user1.tk_display_name as tk_display_name1, 
tk_user2.tk_display_name as tk_display_name2, 
tk_user3.tk_display_name as tk_display_name3, 
tk_user4.tk_display_name as tk_display_name4,
tk_project.id as proid    
FROM tk_task 
inner join tk_task_tpye on tk_task.csa_type=tk_task_tpye.id 
inner join tk_status on tk_task.csa_remark2=tk_status.id 
inner join tk_user as tk_user1 on tk_task.csa_to_user=tk_user1.uid 
inner join tk_user as tk_user2 on tk_task.csa_from_user=tk_user2.uid 
inner join tk_user as tk_user3 on tk_task.csa_create_user=tk_user3.uid 
inner join tk_user as tk_user4 on tk_task.csa_last_user=tk_user4.uid 
inner join tk_project on tk_task.csa_project=tk_project.id 
WHERE TID = %s", GetSQLValueString($colname_Recordset_task, "int"));
$Recordset_task = mysql_query($query_Recordset_task, $tankdb) or die(mysql_error());
$row_Recordset_task = mysql_fetch_assoc($Recordset_task);
$totalRows_Recordset_task = mysql_num_rows($Recordset_task);


$taskid = $_GET['editID'];

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_sumlog = sprintf("SELECT sum(csa_tb_manhour) as sum_hour FROM tk_task_byday WHERE csa_tb_backup1= %s", GetSQLValueString($taskid, "int"));
$Recordset_sumlog = mysql_query($query_Recordset_sumlog, $tankdb) or die(mysql_error());
$row_Recordset_sumlog = mysql_fetch_assoc($Recordset_sumlog);

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_countlog = sprintf("SELECT COUNT(*) as count_log FROM tk_task_byday WHERE csa_tb_backup1= %s", GetSQLValueString($taskid, "int"));
$Recordset_countlog = mysql_query($query_Recordset_countlog, $tankdb) or die(mysql_error());
$row_Recordset_countlog = mysql_fetch_assoc($Recordset_countlog);

$maxRows_Recordset_comment = 10;
$pageNum_Recordset_comment = 0;
if (isset($_GET['pageNum_Recordset_comment'])) {
  $pageNum_Recordset_comment = $_GET['pageNum_Recordset_comment'];
}
$startRow_Recordset_comment = $pageNum_Recordset_comment * $maxRows_Recordset_comment;

//发票管理
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
//

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_comment = sprintf("SELECT * FROM tk_comment 
inner join tk_user on tk_comment.tk_comm_user =tk_user.uid 
								 WHERE tk_comm_pid = %s AND tk_comm_type = 1 
								
								ORDER BY tk_comm_lastupdate DESC", 
								GetSQLValueString($colname_Recordset_task, "text")
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
        stristr($param, "totalRows_Recordset_comment") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset_comment = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset_comment = sprintf("&totalRows_Recordset_comment=%d%s", $totalRows_Recordset_comment, $queryString_Recordset_comment);

$maxRows_Recordset_actlog = 10;
$pageNum_Recordset_actlog = 0;
if (isset($_GET['pageNum_Recordset_actlog'])) {
  $pageNum_Recordset_actlog = $_GET['pageNum_Recordset_actlog'];
}
$startRow_Recordset_actlog = $pageNum_Recordset_actlog * $maxRows_Recordset_actlog;

//tk_comment2
mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_comment2 = sprintf("SELECT * FROM tk_comment2
inner join tk_user on tk_comment2.tk_comm_user =tk_user.uid
								 WHERE tk_comm_pid = %s AND tk_comm_type = 1

								ORDER BY tk_comm_lastupdate DESC",
		GetSQLValueString($colname_Recordset_task, "text")
);
$query_limit_Recordset_comment2 = sprintf("%s LIMIT %d, %d", $query_Recordset_comment2, $startRow_Recordset_comment, $maxRows_Recordset_comment);
$Recordset_comment2 = mysql_query($query_limit_Recordset_comment2, $tankdb) or die(mysql_error());
$row_Recordset_comment2 = mysql_fetch_assoc($Recordset_comment2);

if (isset($_GET['totalRows_Recordset_comment2'])) {
	$totalRows_Recordset_comment2 = $_GET['totalRows_Recordset_comment2'];
} else {
	$all_Recordset_comment2 = mysql_query($query_Recordset_comment2);
	$totalRows_Recordset_comment2 = mysql_num_rows($all_Recordset_comment2);
}
$totalPages_Recordset_comment2 = ceil($totalRows_Recordset_comment2/$maxRows_Recordset_comment)-1;

$queryString_Recordset_comment2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
	$params = explode("&", $_SERVER['QUERY_STRING']);
	$newParams = array();
	foreach ($params as $param) {
		if (stristr($param, "pageNum_Recordset_comment") == false &&
				stristr($param, "totalRows_Recordset_comment2") == false) {
					array_push($newParams, $param);
				}
	}
	if (count($newParams) != 0) {
		$queryString_Recordset_comment2 = "&" . htmlentities(implode("&", $newParams));
	}
}
$queryString_Recordset_comment2 = sprintf("&totalRows_Recordset_comment2=%d%s", $totalRows_Recordset_comment2, $queryString_Recordset_comment2);

$maxRows_Recordset_actlog = 10;
$pageNum_Recordset_actlog = 0;
if (isset($_GET['pageNum_Recordset_actlog'])) {
	$pageNum_Recordset_actlog = $_GET['pageNum_Recordset_actlog'];
}
$startRow_Recordset_actlog = $pageNum_Recordset_actlog * $maxRows_Recordset_actlog;

//

//借款信息
mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_jiekuan = sprintf("SELECT * FROM tk_jiekuanxiaoxi
inner join tk_task on tk_jiekuanxiaoxi.tk_jk_taskid =tk_task.csa_project
								 WHERE TID =%s 

								ORDER BY jid DESC",
		GetSQLValueString($colname_Recordset_task, "text")
);
$Recordset_jiekuan = mysql_query($query_Recordset_jiekuan, $tankdb) or die(mysql_error());
$row_Recordset_jiekuan = mysql_fetch_assoc($Recordset_jiekuan);
$totalRows_Recordset_jiekuan = mysql_num_rows($Recordset_jiekuan);
//

//报销及还款状态管理
mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_jiekuanzt = sprintf("SELECT * FROM tk_jiekuanzt
inner join tk_task on tk_jiekuanzt.tk_jk_taskid =tk_task.csa_project
								 WHERE TID =%s

								ORDER BY jid DESC",
		GetSQLValueString($colname_Recordset_task, "text")
);
$Recordset_jiekuanzt = mysql_query($query_Recordset_jiekuanzt, $tankdb) or die(mysql_error());
$row_Recordset_jiekuanzt = mysql_fetch_assoc($Recordset_jiekuanzt);
$totalRows_Recordset_jiekuanzt = mysql_num_rows($Recordset_jiekuanzt);
//
mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_actlog = sprintf("SELECT * FROM tk_log 
inner join tk_user on tk_log.tk_log_user =tk_user.uid 
								 WHERE tk_log_type = %s AND tk_log_class = 1 
								
								ORDER BY tk_log_time DESC", 
								GetSQLValueString($colname_Recordset_task, "text")
								);
$query_limit_Recordset_actlog = sprintf("%s LIMIT %d, %d", $query_Recordset_actlog, $startRow_Recordset_actlog, $maxRows_Recordset_actlog);
$Recordset_actlog = mysql_query($query_limit_Recordset_actlog, $tankdb) or die(mysql_error());
$row_Recordset_actlog = mysql_fetch_assoc($Recordset_actlog);

if (isset($_GET['totalRows_Recordset_actlog'])) {
  $totalRows_Recordset_actlog = $_GET['totalRows_Recordset_actlog'];
} else {
  $all_Recordset_actlog = mysql_query($query_Recordset_actlog);
  $totalRows_Recordset_actlog = mysql_num_rows($all_Recordset_actlog);
}
$totalPages_Recordset_actlog = ceil($totalRows_Recordset_actlog/$maxRows_Recordset_actlog)-1;

$queryString_Recordset_actlog = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset_actlog") == false && 
        stristr($param, "totalRows_Recordset_actlog") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset_actlog = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset_actlog = sprintf("&totalRows_Recordset_actlog=%d%s", $totalRows_Recordset_actlog, $queryString_Recordset_actlog);

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_sumtotal = sprintf("SELECT 
							COUNT(*) as count_task   
							FROM tk_status  							
							WHERE task_status_backup2 = '1'"
								);
$Recordset_sumtotal = mysql_query($query_Recordset_sumtotal, $tankdb) or die(mysql_error());
$row_Recordset_sumtotal = mysql_fetch_assoc($Recordset_sumtotal);
$exam_totaltask=$row_Recordset_sumtotal['count_task'];

//for wbs!

$maxRows_Recordset_subtask = 15;
$pageNum_Recordset_subtask = 0;
if (isset($_GET['pageNum_Recordset_subtask'])) {
  $pageNum_Recordset_subtask = $_GET['pageNum_Recordset_subtask'];
}
$startRow_Recordset_subtask = $pageNum_Recordset_subtask * $maxRows_Recordset_subtask;

//$colname_Recordset_subtask = $row_DetailRS1['tk_user_login'];

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_subtask = sprintf("SELECT * 
							FROM tk_task 
							inner join tk_task_tpye on tk_task.csa_type=tk_task_tpye.id								
							inner join tk_user on tk_task.csa_to_user=tk_user.uid 
							inner join tk_status on tk_task.csa_remark2=tk_status.id 
							WHERE tk_task.csa_remark4 = %s ORDER BY csa_last_update DESC", 
								GetSQLValueString($colname_Recordset_task, "text")
								);
$query_limit_Recordset_subtask = sprintf("%s LIMIT %d, %d", $query_Recordset_subtask, $startRow_Recordset_subtask, $maxRows_Recordset_subtask);
$Recordset_subtask = mysql_query($query_limit_Recordset_subtask, $tankdb) or die(mysql_error());
$row_Recordset_subtask = mysql_fetch_assoc($Recordset_subtask);

if (isset($_GET['totalRows_Recordset_subtask'])) {
  $totalRows_Recordset_subtask = $_GET['totalRows_Recordset_subtask'];
} else {
  $all_Recordset_subtask = mysql_query($query_Recordset_subtask);
  $totalRows_Recordset_subtask = mysql_num_rows($all_Recordset_subtask);
}
$totalPages_Recordset_subtask = ceil($totalRows_Recordset_subtask/$maxRows_Recordset_subtask)-1;

$queryString_Recordset_subtask = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset_subtask") == false && 
        stristr($param, "totalRows_Recordset_subtask") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset_subtask = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset_subtask = sprintf("&totalRows_Recordset_subtask=%d%s", $totalRows_Recordset_subtask, $queryString_Recordset_subtask);


if ($row_Recordset_task['csa_remark6'] == "-1" ){
$wbs_id = "1";
} else {
$wbs_id = $row_Recordset_task['csa_remark6'];
}


$wbsID = $wbs_id + 1;

if ($row_Recordset_task['csa_remark6'] == "-1"){
$wbssum = $row_Recordset_task['TID'].">".$wbsID;
}else {
$wbssum = $row_Recordset_task['csa_remark5'].">".$row_Recordset_task['TID'].">".$wbsID;
}

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_sumplan = "SELECT round(sum(csa_plan_hour),1) as sum_plan_hour FROM tk_task 
inner join tk_task_tpye on tk_task.csa_type=tk_task_tpye.id 
WHERE task_tpye NOT LIKE '$multilingual_dd_status_ca' AND csa_remark5 LIKE '$wbssum%'";
$Recordset_sumplan = mysql_query($query_Recordset_sumplan, $tankdb) or die(mysql_error());
$row_Recordset_sumplan = mysql_fetch_assoc($Recordset_sumplan);

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_sumsublog = "SELECT round(sum(csa_tb_manhour),1) as sum_sublog FROM tk_task  
inner join tk_task_byday on tk_task.TID=tk_task_byday.csa_tb_backup1 
WHERE csa_remark5 LIKE '$wbssum%'";
$Recordset_sumsublog = mysql_query($query_Recordset_sumsublog, $tankdb) or die(mysql_error());
$row_Recordset_sumsublog = mysql_fetch_assoc($Recordset_sumsublog);

$pattaskid = $row_Recordset_task['csa_remark4'];

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_pattask = "SELECT * FROM tk_task inner join tk_task_tpye on tk_task.csa_type=tk_task_tpye.id WHERE TID = '$pattaskid'";
$Recordset_pattask = mysql_query($query_Recordset_pattask, $tankdb) or die(mysql_error());
$row_Recordset_pattask = mysql_fetch_assoc($Recordset_pattask);
?>
<?php require('head.php'); ?>
<script type="text/javascript" language="javascript">    
//禁止滚动条
$(document.body).css({
   "overflow-x":"hidden",
   "overflow-y":"hidden"
});

 
function TuneHeight()    
{    
var frm = document.getElementById("frame_content");    
var subWeb = document.frames ? document.frames["main_frame"].document : frm.contentDocument;    
if(frm != null && subWeb != null)    
{ frm.height = subWeb.body.scrollHeight;}    
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
function eduser()
{
    J.dialog.get({ id: "test", title: '<?php echo $multilingual_tasklog_changeuser; ?>', width: 260, height: 145, page: "default_task_edituser.php?taskid=<?php echo $row_Recordset_task['TID']; ?>" });
}
function addcomm()
{
    J.dialog.get({ id: "test1", title: '<?php echo "ITL"; ?>', width: 600, height: 500, page: "comment_add.php?taskid=<?php echo $row_Recordset_task['TID']; ?>&type=1" });
}
// 报销信息 
function addcomm2()
{
    J.dialog.get({ id: "test3", title: '<?php echo "ITL"; ?>', width: 600, height: 500, page: "comment_add2_MY.php?taskid=<?php echo $row_Recordset_task['TID']; ?>&type=1" });
}
// 

//借款信息
function jiekuan()
{
    J.dialog.get({ id: "test5", title: '<?php echo "请提交借款单"; ?>', width: 600, height: 500, page: "default_task_jiekuan_MY.php?taskid=<?php echo $row_Recordset_task['csa_project']; ?>&type=1" });
}
//
//报销及借款状态管理
function huankuan()
{
    J.dialog.get({ id: "test5", title: '<?php echo "请提交借款单"; ?>', width: 600, height: 500, page: "default_huankuan_MY.php?taskid=<?php echo $row_Recordset_task['csa_project']; ?>&type=1" });
}
//
function check()
{
    J.dialog.get({ id: "test2", title: '<?php echo $multilingual_exam_poptitle; ?>', width: 320, height: 260, page: "default_task_exam.php?taskid=<?php echo $row_Recordset_task['TID']; ?>" });
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="295px" class="input_task_right_bg" valign="top">
      <table width="290px" border="0" cellspacing="0" cellpadding="5" align="center">
        <tr>
          <td valign="top"><?php
		  $project_id = $row_Recordset_task['csa_project'];
		  $project_name = $row_Recordset_task['project_name'];
		  $node_id_task = $row_Recordset_task['TID'];
		   require_once('tree.php'); ?></td>
        </tr>
      
      </table></td>
    <td  valign="top">
        <div style="overflow:auto; " id="main_right"><!-- right main -->
        <table width="98%" border="0" cellspacing="0" cellpadding="5" align="center">
        <tr>
          <td ><ul class="breadcrumb">
              <li><?php echo $multilingual_breadcrumb_tasklisturl; ?> <span class="divider">/</span></li>
              <li><?php echo $multilingual_tasklog_title; ?> <span class="divider">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
			  <li><?php echo $multilingual_default_taskproject; ?>: <a href="project_view.php?recordID=<?php echo $row_Recordset_task['id']; ?>" ><?php echo $row_Recordset_task['project_name']; ?></a> <span class="divider">/</span></li>
			  <li><?php if ($row_Recordset_task['csa_remark4'] <> -1) { ?>
            <?php echo $multilingual_default_task_parent; ?>: <a href="default_task_edit.php?editID=<?php echo $row_Recordset_pattask['TID']; ?>" >[<?php echo $row_Recordset_pattask['task_tpye']; ?>] <?php echo $row_Recordset_pattask['csa_text']; ?></a> 
            <?php } else {
	 echo $multilingual_subtask_root;
	  } ?></li>
	  <li class="float_right"><?php echo $multilingual_default_taskid; ?>: <?php echo $row_Recordset_task['TID']; ?></li>
            </ul></td>
        </tr>
        <tr>
          <td >
            <span class="breakwordsfloat_left"><h2>[<?php echo $row_Recordset_task['task_tpye']; ?>] <?php echo htmlentities($row_Recordset_task['csa_text'], ENT_COMPAT, 'utf-8'); ?></h2></span> </td>
        </tr>
        <?php if($row_Recordset_task['test02'] <> " " && $row_Recordset_task['test02'] <> "" ) { ?>
        <tr>
          <td><span class="gray"><font size="3"><?php echo "项目编号：".$row_Recordset_task['test02']; ?></font></span> </td>
        </tr>
        <?php } ?>
		<tr>
		<td><table width="100%" border="0" cellspacing="0" cellpadding="5"  class="info_task_bg">
  <tr>
    <td width="9%" class="info_task_title"><?php echo $multilingual_default_task_status; ?></td>
    <td  width="28%"><div class="float_left view_task_status"><?php echo $row_Recordset_task['task_status_display']; ?></div></td>
    <td  width="14%" class="info_task_title"><?php echo "事务所"; ?></td>
    <td><?php
switch ($row_Recordset_task['csa_priority'])
{

case 3:
  echo $multilingual_dd_priority_p5;
  break;
case 2:
  echo "求是";
  break;
case 1:
  echo "中成";
  break;
}
?></td>



    <td  width="12%" class="info_task_title"><?php echo $multilingual_default_tasklevel; ?></td>
    <td  width="17%"><?php
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
?></td>
  </tr>
  <tr>  
    <td class="info_task_title"><?php echo $multilingual_default_task_to; ?></td>   
    <td><a href="user_view.php?recordID=<?php echo $row_Recordset_task['csa_to_user']; ?>"><?php echo $row_Recordset_task['tk_display_name1']; ?></a>
            <?php if($row_Recordset_countlog['count_log'] == "0" && $_SESSION['MM_uid'] == $row_Recordset_task['csa_to_user'] && $_SESSION['MM_rank'] > "1") { ?>
&nbsp;&nbsp;            <a href="#" onclick="eduser();">[<?php echo $multilingual_tasklog_changeuser; ?>]</a>
            <?php } else { ?>
            <b title="<?php echo $multilingual_tasktype_lock; ?>">[?]</b>
            <?php }  ?></td>
  
  
   <!-- 咨询费 -->
    <td class="info_task_title"><?php echo "咨询费用"; ?></td>        
     <td><?php if($row_Recordset_task['csa_zixun_fei'] == null){
	  $plan_zixun = 0;
	  } else {
	  $plan_zixun = $row_Recordset_task['csa_zixun_fei'];
	  }
	  echo $plan_zixun;?>
            <?php echo $multilingual_global_hour; ?></td>
   


<!--  -->
 <!--  -->
 
    
    <td class="info_task_title"><?php echo $multilingual_default_task_planstart; ?></td>
    <td><?php echo $row_Recordset_task['csa_plan_st']; ?></td>
  </tr>
  <tr>
    <td class="info_task_title"><?php echo $multilingual_default_task_from; ?></td>
    <td><a href="user_view.php?recordID=<?php echo $row_Recordset_task['csa_from_user']; ?>"><?php echo $row_Recordset_task['tk_display_name2']; ?></a></td>
    <td class="info_task_title"><?php echo $multilingual_default_task_planhour; ?></td>
    <td><?php if($row_Recordset_task['csa_plan_hour'] == null){
	  $plan_hour = 0;
	  } else {
	  $plan_hour = $row_Recordset_task['csa_plan_hour'];
	  }
	  echo $plan_hour;?>
            <?php echo $multilingual_global_hour; ?></td>
    <td class="info_task_title"><?php echo $multilingual_default_task_planend; ?></td>
    <td><?php echo $row_Recordset_task['csa_plan_et']; ?></td>
  </tr>
  <tr>
    <td class="info_task_title"><?php echo $multilingual_global_action_create; ?></td>
    <td><a href="user_view.php?recordID=<?php echo $row_Recordset_task['csa_create_user']; ?>"><?php echo $row_Recordset_task['tk_display_name3']; ?></a></td>
 
 <!-- 缴费用途 -->
 <td class="info_task_title"><?php echo "缴费用途";?></td>
 <td>
 <?php if($row_Recordset_task['csa_yongtu_fei'] == null){
	  $plan_yongtu = "无";
	  } else {
	  $plan_yongtu = $row_Recordset_task['csa_yongtu_fei'];
	  }
	  echo $plan_yongtu;?>
 </td>
 <!--  -->
 
    <td class="info_task_title"><?php 
	  $live_days = (strtotime($row_Recordset_task['csa_plan_et']) - strtotime(date("Y-m-d")))/86400;
	  if ($live_days < 0){
	  echo $multilingual_tasklog_overday;
	  } else {
	  echo $multilingual_tasklog_liveday;
	  }
	  ?></td>
    <td><?php 
	  if ($live_days < 0){
	  //echo "<span class='red'>".$live_days." ".$multilingual_tasklog_day."</span>";
	  } else {
	  echo $live_days." ".$multilingual_tasklog_day;
	  }
	  ?></td>
  </tr>
</table>

		</td>
		</tr>
        
        <tr>
          <td>
		  <table width="100%">
		  <tr>
            <?php if($_SESSION['MM_rank'] > "3") { ?>			
			<td width="16%">
			
			 <a onclick="javascript:self.location='default_task_add6_MY.php?taskID=<?php echo $colname_Recordset_task; ?>&projectID=<?php echo $row_Recordset_task['proid']; ?>&wbsID=<?php echo $wbsID; ?>';"  class="mouse_over"><i class="icon-random"></i> <?php echo $multilingual_project_newtask; ?></a>
            
            </td>
            <?php }  ?>
            
            
            
            
		  <?php if ($exam_totaltask > "0") { ?>
            <?php if (($row_Recordset_task['csa_from_user'] == $_SESSION['MM_uid'] && $_SESSION['MM_rank'] > "3") || $_SESSION['MM_rank'] > "3"  ) { ?>
            <td width="10%">
			<a onclick="check();"  class="mouse_over"><i class="icon-check"></i> <?php echo $multilingual_exam_title; ?></a>
            </td>
			<?php }  ?>
            <?php }  ?>
            <?php if($_SESSION['MM_rank'] > "1") { ?>
			<!-- 填写报销信息 
            <td width="12%">       
			 <a onClick="addcomm2();" class="mouse_over"><i class="icon-comment"></i> <?php echo "填写报销信息"; ?></a></td>
			-->
			<!-- 借款信息 --> 
			<td width="12%">       
			 <a onClick="jiekuan();" class="mouse_over"><i class="icon-comment"></i> <?php echo "填写借款信息"; ?></a></td>				 
			<!-- 报销及还款状态管理 -->
			<td width="12%">       
			 <a onClick="huankuan();" class="mouse_over"><i class="icon-comment"></i> <?php echo "报销及还款"; ?></a></td>				 
			<td width="12%">
			<a onclick="addcomm();"  class="mouse_over"><i class="icon-comment"></i> <?php echo "备注信息"; ?></a>
            </td>
			<?php } ?>
            
            <?php if($_SESSION['MM_rank'] > "1") { ?>
             <td width="12%">
			 <a  target="_blank" href="file_add.php?projectid=<?php echo $row_Recordset_task['csa_project']; ?>&pid=0&pagetab=allfile"><i class="icon-file"></i> <?php echo $multilingual_project_file_addfile; ?></a></td>
            <?php } ?>
            
            <?php if (($row_Recordset_task['csa_create_user'] == $_SESSION['MM_uid'] && $_SESSION['MM_rank'] > "1") || $_SESSION['MM_rank'] > "4"  ) { ?>
        
<!-- 重新编辑      
            <td width="10%">
			<a onClick="javascript:self.location='default_task_plan2_MY.php?editID=<?php echo $row_Recordset_task['TID']; ?>';" class="mouse_over"><i class="icon-pencil"></i> <?php echo $multilingual_global_action_edit; ?></a>
            </td>
 -->		
		
			<?php }  ?>
            <?php if ($_SESSION['MM_rank'] > "4") {  ?>
			<td width="10%">
			<a  class="mouse_over" onClick="javascript:if(confirm( '<?php 
	 if($row_Recordset_countlog['count_log'] == "0"){  
	  echo $multilingual_global_action_delconfirm;
	  } else { echo $multilingual_global_action_delconfirm2;} ?>'))self.location= 'task_del.php?delID=<?php echo $row_Recordset_task['TID']; ?>';"><i class="icon-remove"></i> <?php echo $multilingual_global_action_del; ?></a>
            </td>
			<?php }  ?>
<!--  返回
			<td>
			<a class="mouse_over" onclick="javascript:history.go(-1)"><i class="icon-arrow-left"></i> <?php echo $multilingual_global_action_back; ?></a>
			</td>
-->			
			<td>&nbsp;
			</td>
			</tr>
			
			</table>
		  </td>
        </tr>
		<?php if ($row_Recordset_task['csa_remark1'] <> "&nbsp;" && $row_Recordset_task['csa_remark1'] <> "") { ?>
		<tr>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td><div class="float_left"><span class="font_big18 fontbold" ><?php echo $multilingual_default_task_description; ?></span><a name="comment"></a></div>
          </td>
        </tr>
        <tr>
          <td><?php 
	echo $row_Recordset_task['csa_remark1']; 
	?></td>
        </tr>
        <?php } ?>
		<?php if($totalRows_Recordset_comment > 0){ //如果有评论?>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div class="float_left"><span class="font_big18 fontbold" ><?php echo $multilingual_default_comment; ?></span><a name="comment"></a></div>
          </td>
        </tr>
        <tr>
          <td><table class="table table-striped table-hover glink">
              <?php do { ?>
              <tr>
                <td ><div class="float_left gray"> <a href="user_view.php?recordID=<?php echo $row_Recordset_comment['tk_comm_user']; ?>"><?php echo $row_Recordset_comment['tk_display_name']; ?></a> <?php echo $multilingual_default_by; ?> <?php echo $row_Recordset_comment['tk_comm_lastupdate']; ?> <?php echo $multilingual_default_at; ?></div>
                  <div class="float_right">
                    <?php if ($_SESSION['MM_rank'] > "4" || ($row_Recordset_comment['tk_comm_user'] == $_SESSION['MM_uid'] && $_SESSION['MM_rank'] > "1")) {  ?>
                    <?php
	  $coid =$row_Recordset_comment['coid'];
	  $editcomment_row = "
<script type='text/javascript'>
	  function editcomm$coid()
{
    J.dialog.get({ id: 'test3', title: '重新编辑', width: 600, height: 500, page: 'comment_edit.php?editcoID=$coid' });
}
</script>";

echo $editcomment_row;
?>
                    <a onclick="editcomm<?php echo $coid; ?>();" class="mouse_hover"> <?php echo $multilingual_global_action_edit; ?></a>
                    <?php if ($_SESSION['MM_Username'] <> $multilingual_dd_user_readonly) {  ?>
                    <a  class="mouse_hover" 
	  onclick="javascript:if(confirm( '<?php 
	  echo $multilingual_global_action_delconfirm; ?>'))self.location='comment_del.php?delID=<?php echo $row_Recordset_comment['coid']; ?>&taskID=<?php echo $row_Recordset_task['TID']; ?>';"
	  ><?php echo $multilingual_global_action_del; ?></a>
                    <?php } else {  
	   echo $multilingual_global_action_del; 
	    }  ?>
                    <?php } ?>
                  </div>
                  <?php 
	echo "<br/>".$row_Recordset_comment['tk_comm_title']; 
	?>                </td>
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
                <td><table border="0">
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
                <td align="right"><?php echo ($startRow_Recordset_comment + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_comment + $maxRows_Recordset_comment, $totalRows_Recordset_comment) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_comment ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
              </tr>
            </table></td>
        </tr>    
        <?php } //如果有评论 ?>
 <!-- 填写报销信息 -->
 <?php if($totalRows_Recordset_comment2 > 0){ //如果有评论?>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div class="float_left"><span class="font_big18 fontbold" ><?php echo "报销信息"; ?></span><a name="comment"></a></div>
          </td>
        </tr>
        <tr>
          <td><table class="table table-striped table-hover glink">
              <?php do { ?>
              <tr>
                <td ><div class="float_left gray"> <a href="user_view.php?recordID=<?php echo $row_Recordset_comment2['tk_comm_user']; ?>"><?php echo $row_Recordset_comment2['tk_display_name']; ?></a> <?php echo $multilingual_default_by; ?> <?php echo $row_Recordset_comment2['tk_comm_lastupdate']; ?> <?php echo "填写的报销信息"; ?></div>
                  <div class="float_right">
                    <?php if ($_SESSION['MM_rank'] > "4" || ($row_Recordset_comment2['tk_comm_user'] == $_SESSION['MM_uid'] && $_SESSION['MM_rank'] > "1")) {  ?>
                    <?php
	  $coid =$row_Recordset_comment2['coid'];
	  $editcomment_row = "
<script type='text/javascript'>
	  function editcomm$coid()
{
    J.dialog.get({ id: 'test3', title: '重新编辑', width: 600, height: 500, page: 'comment_edit.php?editcoID=$coid' });
}
</script>";

echo $editcomment_row;
?>
             <!-- 编辑
                    <a onclick="editcomm<?php echo $coid; ?>();" class="mouse_hover"> <?php echo $multilingual_global_action_edit; ?></a>
              --> 
                    <?php if ($_SESSION['MM_Username'] <> $multilingual_dd_user_readonly) {  ?>
             <!-- 删除       
                    <a  class="mouse_hover" 
	  onclick="javascript:if(confirm( '<?php 
	  echo $multilingual_global_action_delconfirm; ?>'))self.location='comment_del2_MY.php?delID=<?php echo $row_Recordset_comment2['coid']; ?>&taskID=<?php echo $row_Recordset_task['TID']; ?>';"
	  ><?php echo $multilingual_global_action_del; ?></a>
	          --> 
                    <?php } else {  
	   echo $multilingual_global_action_del; 
	    }  ?>
                    <?php } ?>
                  </div>
                  <?php 
	echo "<br/>".$row_Recordset_comment2['tk_comm_title']; 
	?>                </td>
              </tr>
              <?php
} while ($row_Recordset_comment2 = mysql_fetch_assoc($Recordset_comment2));
  $rows = mysql_num_rows($Recordset_comment2);
  if($rows > 0) {
      mysql_data_seek($Recordset_comment2, 0);
	  $row_Recordset_comment2 = mysql_fetch_assoc($Recordset_comment2);
  }
?>
            </table>
            <table class="rowcon" border="0" align="center">
              <tr>
                <td><table border="0">
                    <tr>
                      <td><?php if ($pageNum_Recordset_comment > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_comment=%d%s", $currentPage, 0, $queryString_Recordset_comment2); ?>#comment"><?php echo $multilingual_global_first; ?></a>
                          <?php } // Show if not first page ?></td>
                      <td><?php if ($pageNum_Recordset_comment > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_comment=%d%s", $currentPage, max(0, $pageNum_Recordset_comment - 1), $queryString_Recordset_comment2); ?>#comment"><?php echo $multilingual_global_previous; ?></a>
                          <?php } // Show if not first page ?></td>
                      <td><?php if ($pageNum_Recordset_comment < $totalPages_Recordset_comment2) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_comment=%d%s", $currentPage, min($totalPages_Recordset_comment2, $pageNum_Recordset_comment + 1), $queryString_Recordset_comment2); ?>#comment"><?php echo $multilingual_global_next; ?></a>
                          <?php } // Show if not last page ?></td>
                      <td><?php if ($pageNum_Recordset_comment < $totalPages_Recordset_comment2) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_comment=%d%s", $currentPage, $totalPages_Recordset_comment2, $queryString_Recordset_comment2); ?>#comment"><?php echo $multilingual_global_last; ?></a>
                          <?php } // Show if not last page ?></td>
                    </tr>
                  </table></td>
                <td align="right"><?php echo ($startRow_Recordset_comment + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_comment + $maxRows_Recordset_comment, $totalRows_Recordset_comment2) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_comment2 ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
              </tr>
            </table></td>
        </tr>    
        <?php } //如果有评论 ?> 
        
<!--借款信息  -->
 <?php if($totalRows_Recordset_jiekuan > 0){ ?>   
 <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div class="float_left"><span class="font_big18 fontbold" ><?php echo "借款信息"; ?></span></div>
          </td>
        </tr>
        <tr>
                <td > <a href="user_view.php?recordID=<?php echo $row_Recordset_task['csa_from_user']; ?>"><?php echo $row_Recordset_task['tk_display_name']; ?></a> <?php echo $multilingual_default_by; ?> <?php echo $row_Recordset_jiekuan['tk_comm_lastupdate']; ?> <?php echo "填写的借款信息"; ?>
                 </td>
                 
          </tr>
        <tr>
          <td><table class="table table-striped table-hover glink">              
               <tr>
                 <td width="9%" class="info_task_title"><?php echo "还款状态"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuan['tk_hk_zt']; ?></div></td>  
    <td width="9%" class="info_task_title"><?php echo "借款项目来源"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuan['tk_jk_ly']; ?></div></td>
    <td width="9%" class="info_task_title"><?php echo "借款人"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuan['tk_jkr']; ?></div></td>
    <td width="9%" class="info_task_title"><?php echo "借款经办人"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuan['tk_jk_jinban']; ?></div></td>
      </tr>
      <tr>
      <td width="9%" class="info_task_title"><?php echo "还款人"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuan['tk_hk_ren']; ?></div></td>
    <td width="9%" class="info_task_title"><?php echo "借款日期"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuan['tk_jk_rq']; ?></div></td>
    <td width="9%" class="info_task_title"><?php echo "还款日期"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuan['tk_hk_rq']; ?></div></td>
      </tr>   
       </table>
       </td>
       </tr>
       
 <?php }?>     
<!--  -->                
 
 <!-- 报销及还款状态管理 -->
 <?php if($totalRows_Recordset_jiekuanzt > 0){ ?>   
 <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div class="float_left"><span class="font_big18 fontbold" ><?php echo "报销及还款信息"; ?></span></div>
          </td>
        </tr>
        <tr>
                <td > <a href="user_view.php?recordID=<?php echo $row_Recordset_task['csa_from_user']; ?>"><?php echo $row_Recordset_task['tk_display_name']; ?></a> <?php echo $multilingual_default_by; ?> <?php echo $row_Recordset_jiekuanzt['tk_comm_lastupdate']; ?> <?php echo "填写的报销与借款信息"; ?>
                 </td>
                 
          </tr>
        <tr>
          <td><table class="table table-striped table-hover glink">              
               <tr>
                 <td width="9%" class="info_task_title"><?php echo "是否需要还款"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuanzt['tk_hk_pd']; ?></div></td>  
    <td width="9%" class="info_task_title"><?php echo "报销状态确认"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuanzt['tk_bx_qr']; ?></div></td>
    <td width="9%" class="info_task_title"><?php echo "报销时间"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuanzt['tk_bx_rq']; ?></div></td>
      </tr>
      <tr>
      <td width="9%" class="info_task_title"><?php echo "还款状态确认"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuanzt['tk_hk_qr']; ?></div></td>
    <td width="9%" class="info_task_title"><?php echo "还款日期"; ?></td>
    <td  width="16%"><div class="float_left view_task_status"><?php echo $row_Recordset_jiekuanzt['tk_hk_rq']; ?></div></td>
      </tr>   
       </table>
       </td>
       </tr>
       
 <?php }?>     
 <!--  -->
              
 <!-- 操作记录 --> 
        <?php if($totalRows_Recordset_actlog > 0){ //如果有操作记录 ?>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="font_big18 fontbold"><?php echo $multilingual_log_title; ?></span><a name="log"></td>
        </tr>
        <tr>
          <td><table class="table table-striped table-hover glink">
              <?php do { ?>
              <tr>
                <td ><?php echo $row_Recordset_actlog['tk_log_time']; ?> <a href="user_view.php?recordID=<?php echo $row_Recordset_actlog['tk_log_user']; ?>"><?php echo $row_Recordset_actlog['tk_display_name']; ?></a><?php echo $row_Recordset_actlog['tk_log_action']; ?>
              <td>              </tr>
              <?php
} while ($row_Recordset_actlog = mysql_fetch_assoc($Recordset_actlog));
  $rows = mysql_num_rows($Recordset_actlog);
  if($rows > 0) {
      mysql_data_seek($Recordset_actlog, 0);
	  $row_Recordset_actlog = mysql_fetch_assoc($Recordset_actlog);
  }
?>
            </table>
            <table class="rowcon" border="0" align="center">
              <tr>
                <td><table border="0">
                    <tr>
                      <td><?php if ($pageNum_Recordset_actlog > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_actlog=%d%s", $currentPage, 0, $queryString_Recordset_actlog); ?>#log"><?php echo $multilingual_global_first; ?></a>
                          <?php } // Show if not first page ?></td>
                      <td><?php if ($pageNum_Recordset_actlog > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_actlog=%d%s", $currentPage, max(0, $pageNum_Recordset_actlog - 1), $queryString_Recordset_actlog); ?>#log"><?php echo $multilingual_global_previous; ?></a>
                          <?php } // Show if not first page ?></td>
                      <td><?php if ($pageNum_Recordset_actlog < $totalPages_Recordset_actlog) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_actlog=%d%s", $currentPage, min($totalPages_Recordset_actlog, $pageNum_Recordset_actlog + 1), $queryString_Recordset_actlog); ?>#log"><?php echo $multilingual_global_next; ?></a>
                          <?php } // Show if not last page ?></td>
                      <td><?php if ($pageNum_Recordset_actlog < $totalPages_Recordset_actlog) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_actlog=%d%s", $currentPage, $totalPages_Recordset_actlog, $queryString_Recordset_actlog); ?>#log"><?php echo $multilingual_global_last; ?></a>
                          <?php } // Show if not last page ?></td>
                    </tr>
                  </table></td>
                <td align="right"><?php echo ($startRow_Recordset_actlog + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_actlog + $maxRows_Recordset_actlog, $totalRows_Recordset_actlog) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_actlog ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <?php } //如果有操作记录  ?>
        <?php if($totalRows_Recordset_subtask > 0){ //如果有子任务 ?>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
   <!-- 提交给      
          <td><span class="font_big18 fontbold"><?php echo $multilingual_default_task_subtask; ?></span></td>
    -->    
        </tr>
        <tr>
          <td><div class="float_left gray"> 
         <!-- 发表费用 
               <?php echo $multilingual_subtask_plan; ?>:
              <?php if($row_Recordset_sumplan['sum_plan_hour'] == null){
	  $plan_subhour = 0;
	  } else {
	  $plan_subhour = $row_Recordset_sumplan['sum_plan_hour'];
	  }
	  echo $plan_subhour;?>
              <?php echo $multilingual_global_hour; ?> </div>
       -->      
            <?php if($_SESSION['MM_rank'] > "2") { ?>
            <div class="float_right">
 
         <!-- 提交审批（分解按钮）    
              <input name="" type="button" class="button" onclick="javascript:self.location='default_task_add.php?taskID=<?php echo $colname_Recordset_task; ?>&projectID=<?php echo $row_Recordset_task['proid']; ?>&wbsID=<?php echo $wbsID; ?>';" value="<?php echo $multilingual_project_newtask; ?>(<?php echo $multilingual_global_break; ?>)" />
         -->

            </div>
            <?php }  ?>          </td>
        </tr>
        <tr>
          <td><table class="table table-striped table-hover glink">
              <thead>
                <tr>
                  <th><?php echo $multilingual_default_task_id; ?></th>
                  <th><?php echo $multilingual_default_task_title; ?></th>
                  <th><?php echo $multilingual_default_task_to; ?></th>
                  <th><?php echo $multilingual_default_task_status; ?></th>
                  <th><?php echo $multilingual_default_task_planstart; ?></th>
                  <th><?php echo $multilingual_default_task_planend; ?></th>
                  <th><?php echo $multilingual_default_task_priority; ?></th>
                  <th><?php echo $multilingual_default_task_temp; ?></th>
                </tr>
              </thead>
              <tbody>
                <?php do { ?>
                  <tr>
                    <td><?php echo $row_Recordset_subtask['TID']; ?></td>
                    <td class="task_title"><div  class="text_overflow_150 task_title"  title="<?php echo $row_Recordset_subtask['csa_text']; ?>"> <a href="default_task_edit.php?editID=<?php echo $row_Recordset_subtask['TID']; ?>" > <b>[<?php echo $row_Recordset_subtask['task_tpye']; ?>]</b> <?php echo $row_Recordset_subtask['csa_text']; ?> </a> </div></td>
                    <td ><a href="user_view.php?recordID=<?php echo $row_Recordset_subtask['csa_to_user']; ?>"><?php echo $row_Recordset_subtask['tk_display_name']; ?></a></td>
                    <td><?php echo $row_Recordset_subtask['task_status_display']; ?></td>
                    <td><?php echo $row_Recordset_subtask['csa_plan_st']; ?></td>
                    <td><?php echo $row_Recordset_subtask['csa_plan_et']; ?></td>
                    <td><?php
switch ($row_Recordset_subtask['csa_priority'])
{

case 3:
  echo $multilingual_dd_priority_p5;
  break;
case 2:
  echo "求是";
  break;
case 1:
  echo "中成";
  break;
}
?>                    </td>



                    <td><?php
switch ($row_Recordset_subtask['csa_temp'])
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
?>                    </td>
                  </tr>
                  <?php } while ($row_Recordset_subtask = mysql_fetch_assoc($Recordset_subtask)); ?>
              </tbody>
            </table>
            <table class="rowcon" border="0" align="center">
              <tr>
                <td><table border="0">
                    <tr>
                      <td><?php if ($pageNum_Recordset_subtask > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_subtask=%d%s", $currentPage, 0, $queryString_Recordset_subtask); ?>#task"><?php echo $multilingual_global_first; ?></a>
                          <?php } // Show if not first page ?></td>
                      <td><?php if ($pageNum_Recordset_subtask > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_subtask=%d%s", $currentPage, max(0, $pageNum_Recordset_subtask - 1), $queryString_Recordset_subtask); ?>#task"><?php echo $multilingual_global_previous; ?></a>
                          <?php } // Show if not first page ?></td>
                      <td><?php if ($pageNum_Recordset_subtask < $totalPages_Recordset_subtask) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_subtask=%d%s", $currentPage, min($totalPages_Recordset_subtask, $pageNum_Recordset_subtask + 1), $queryString_Recordset_subtask); ?>#task"><?php echo $multilingual_global_next; ?></a>
                          <?php } // Show if not last page ?></td>
                      <td><?php if ($pageNum_Recordset_subtask < $totalPages_Recordset_subtask) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_Recordset_subtask=%d%s", $currentPage, $totalPages_Recordset_subtask, $queryString_Recordset_subtask); ?>#task"><?php echo $multilingual_global_last; ?></a>
                          <?php } // Show if not last page ?></td>
                    </tr>
                  </table></td>
                <td align="right"><?php echo ($startRow_Recordset_subtask + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset_subtask + $maxRows_Recordset_subtask, $totalRows_Recordset_subtask) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset_subtask ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <?php } //如果有子任务  ?>
        <tr>
          <td>&nbsp;</td>
        </tr>

<!--  审批日志
        <tr>
          <td><span class="font_big18 fontbold"><?php echo $multilingual_default_task_section5; ?></span></td>
        </tr>
        <tr>
          <td><iframe id="frame_content" name="main_frame" frameborder="0" height="" width="100%" src="default_task_calendar.php?taskid=<?php echo $row_Recordset_task['TID']; ?>&userid=<?php echo $row_Recordset_task['csa_to_user']; ?>&projectid=<?php echo $row_Recordset_task['csa_project']; ?>&tasktype=<?php echo $row_Recordset_task['csa_type']; ?>" onLoad="TuneHeight()" scrolling="no"></iframe></td>
        </tr>
 -->       
      </table>
            <?php require('foot.php'); ?>
        </div><!-- right main -->
</td>
  </tr>
</table>

</body>
</html>
<?php
mysql_free_result($Recordset_task);
?>

