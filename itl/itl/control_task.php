<?php
$phpself =$_SERVER['PHP_SELF'];
$pagenames = end(explode("/",$phpself));

$pagetabs = "mtask";
if (isset($_GET['pagetab'])) {
  $pagetabs = $_GET['pagetab'];
}

$maxRows_Recordset1 = get_item( 'maxrows_task' );
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$maxRows_timeout = get_item( 'maxrows_timeout' );
$pageNum_timeout = 0;
if (isset($_GET['pageNum_timeout'])) {
  $pageNum_timeout = $_GET['pageNum_timeout'];
}
$startRow_timeout = $pageNum_timeout * $maxRows_timeout;

 

$colname_Recordset1 = $_SESSION['MM_uid'];
$_SESSION['ser_touser'] = $colname_Recordset1;
if (isset($_GET['select4'])) {
  $colname_Recordset1 = $_GET['select4'];
  $_SESSION['ser_touser'] = $colname_Recordset1;
}


$colfromuser_Recordset1 = "%";
$_SESSION['ser_fromuser'] = $colfromuser_Recordset1;
if (isset($_GET['select2'])) {
  $colfromuser_Recordset1 = $_GET['select2'];
  $_SESSION['ser_fromuser'] = $colfromuser_Recordset1;
}

$colcreate_Recordset1 = "%";
$_SESSION['ser_createuser'] = $colcreate_Recordset1;
if (isset($_GET['create_by'])) {
  $colcreate_Recordset1 = $_GET['create_by'];
  $_SESSION['ser_createuser'] = $colcreate_Recordset1;
}

$colmonth_Recordset1 = date("m");
$_SESSION['ser_month'] = $colmonth_Recordset1;
if (isset($_GET['textfield'])) {
  $colmonth_Recordset1 = $_GET['textfield'];
  $_SESSION['ser_month'] = $colmonth_Recordset1;
}

$colyear_Recordset1 = date("Y");
$_SESSION['ser_year'] = $colyear_Recordset1;
if (isset($_GET['select_year'])) {
  $colyear_Recordset1 = $_GET['select_year'];
  $_SESSION['ser_year'] = $colyear_Recordset1;
}

if ($colyear_Recordset1 == "--"){
$startday = "1975-09-23";
$endday = "3000-13-31";
} else if ($colmonth_Recordset1 == "--"){
$startday = $colyear_Recordset1."-01-01";
$endday = $colyear_Recordset1."-12-31";
} else {
$startday = $colyear_Recordset1."-".$colmonth_Recordset1."-01";
$endday = $colyear_Recordset1."-".$colmonth_Recordset1."-31";
}

$colprt_Recordset1 = "";
$_SESSION['ser_tkprt'] = $colprt_Recordset1;
if (isset($_GET['select_prt'])) {
  $colprt_Recordset1 = $_GET['select_prt'];
  $_SESSION['ser_tkprt'] = $colprt_Recordset1;
}

$coltemp_Recordset1 = "";
$_SESSION['ser_level'] = $coltemp_Recordset1;
if (isset($_GET['select_temp'])) {
  $coltemp_Recordset1 = $_GET['select_temp'];
  $_SESSION['ser_level'] = $coltemp_Recordset1;
}

$colexam = "";
if (isset($_GET['select_exam'])) {
  $colexam = $_GET['select_exam'];
}


if (isset($_GET['select_st']) && $_GET['select_st'] <> 1) {
  $colstatus_Recordset1 = $_GET['select_st'];
  $_SESSION['ser_status'] = $colstatus_Recordset1;
} else if(isset($_GET['select_st']) && $_GET['select_st'] == 1){
$colstatus_Recordset1 = ""; 
$_SESSION['ser_status'] = 1;
}else {
$colstatus_Recordset1 = "";
}

if (isset($_SESSION['ser_status']) && $_SESSION['ser_status'] <> "1"){
$colstatus_Recordset1 = $_SESSION['ser_status'];
} else {
$colstatus_Recordset1 = ""; 
}


if (isset($_SESSION['ser_status']) && $_SESSION['ser_status']==1){
  $colstatusf_Recordset1 = $multilingual_dd_status_stfinish;
  } else if(!isset($_SESSION['ser_status'])) {
  $colstatusf_Recordset1 = "+";
  } else  {
  $colstatusf_Recordset1 = "+";
  } 

$coltype_Recordset1 = "";
$_SESSION['ser_tktype'] = $coltype_Recordset1;
if (isset($_GET['select_type'])) {
  $coltype_Recordset1 = $_GET['select_type'];
  $_SESSION['ser_tktype'] = $coltype_Recordset1;
}


$colproject_Recordset1 = "";
$_SESSION['ser_project'] = $colproject_Recordset1;
if (isset($_GET['select_project'])) {
  $colproject_Recordset1 = $_GET['select_project'];
  $_SESSION['ser_project'] = $colproject_Recordset1;
}

$searchby = "";
$colinputtitle_Recordset1 = "";
$colinputid_Recordset1 = "";
$colinputtag_Recordset1 = "";
if (isset($_GET['searchby'])) {
  $searchby= $_GET['searchby'];
  if($searchby == "tit"){
  $colinputtitle_Recordset1 =  $_GET['inputval'];
  } else if($searchby == "tid"){
  $colinputid_Recordset1 = $_GET['inputval'];
  } else if($searchby == "tag"){
  $colinputtag_Recordset1 = $_GET['inputval'];
  }  
}

$sortlist = "csa_last_update";
if (isset($_GET['sort'])) {
  $sortlist = $_GET['sort'];
}

$orderlist = "DESC";
if (isset($_GET['order'])) {
  $orderlist= $_GET['order'];
}

if($colyear_Recordset1 == "--"){
$YEAR = "0000";
} else {
$YEAR = $colyear_Recordset1;
}
if($colmonth_Recordset1 == "--"){
$MONTH = "00";
} else {
$MONTH = $colmonth_Recordset1;
}

$coltouser = GetSQLValueString($colname_Recordset1, "int");
$colfromuser = GetSQLValueString($colfromuser_Recordset1, "int");
$colcreateuser = GetSQLValueString($colcreate_Recordset1, "int");

$colprt = GetSQLValueString($colprt_Recordset1, "int");
$coltemp = GetSQLValueString($coltemp_Recordset1, "int");
$colstatus = GetSQLValueString("%%" . str_replace("%","%%",$colstatus_Recordset1) . "%%", "text");
$colstatusf = GetSQLValueString("%%" . str_replace("%","%%",$colstatusf_Recordset1) . "%%", "text");
$coltype = GetSQLValueString($coltype_Recordset1, "int");
$colproject = GetSQLValueString($colproject_Recordset1, "int");
$colinputid = GetSQLValueString("%%" . str_replace("%","%%",$colinputid_Recordset1) . "%%", "text");
$colinputtitle = GetSQLValueString("%%" . str_replace("%","%%",$colinputtitle_Recordset1) . "%%", "text");
$colinputtag = GetSQLValueString("%%" . str_replace("%","%%",$colinputtag_Recordset1) . "%%", "text");
$colexams = GetSQLValueString("%%" . str_replace("%","%%",$colexam) . "%%", "text");

		$where = "";
			$where=' WHERE';

			if($colname_Recordset1 <> '%' )
			{
				$where.= " tk_task.csa_to_user = $coltouser AND";
			}
			
			if($colfromuser_Recordset1 <> '%')
			{
				$where.= " tk_task.csa_from_user = $colfromuser AND";
			}
			
			if(!empty($colprt_Recordset1))
			{
				$where.= " tk_task.csa_priority = $colprt AND";
			}
			
			if(!empty($coltemp_Recordset1))
			{
				$where.= " tk_task.csa_temp = $coltemp AND";
			}
			
			if(!empty($colstatus_Recordset1) && $pagetabs <> "etask")
			{
				$where.= " tk_status.task_status LIKE $colstatus AND";
			}
			
			if($pagetabs == "etask")
			{
				$where.= " tk_status.task_status LIKE $colexams AND";
			}
			
			if($colstatusf_Recordset1  <> '+' && $pagetabs <> "etask")
			{
				$where.= " tk_status.task_status NOT LIKE $colstatusf AND";
			}
			
			if(!empty($coltype_Recordset1))
			{
				$where.= " tk_task.csa_type = $coltype AND";
			}
			
			if(!empty($colproject_Recordset1))
			{
				$where.= " tk_task.csa_project = $colproject AND";
			}
			
			if(!empty($colinputid_Recordset1))
			{
				$where.= " tk_task.TID LIKE $colinputid AND";
			}
			
			if(!empty($colinputtitle_Recordset1))
			{
				$where.= " tk_task.csa_text LIKE $colinputtitle AND";
			}
			
			if(!empty($colinputtag_Recordset1))
			{
				$where.= " tk_task.test02 LIKE $colinputtag AND";
			}
			
			if($colcreate_Recordset1 <> '%')
			{
				$where.= " tk_task.csa_create_user = $colcreateuser AND";
			}

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset1 = sprintf("SELECT *, 
							
							tk_project.project_name as project_name_prt,
							tk_user1.tk_display_name as tk_display_name1, 
							tk_user2.tk_display_name as tk_display_name2
							
							FROM tk_task  
							inner join tk_task_tpye on tk_task.csa_type=tk_task_tpye.id
							inner join tk_project on tk_task.csa_project=tk_project.id
							
							inner join tk_user as tk_user1 on tk_task.csa_to_user=tk_user1.uid 
							inner join tk_user as tk_user2 on tk_task.csa_from_user=tk_user2.uid 
							
							inner join tk_status on tk_task.csa_remark2=tk_status.id
							
							$where 
							(tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st >=%s
 							AND tk_task.csa_plan_et <=%s)
														
							ORDER BY %s %s", 
							
							GetSQLValueString($startday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($sortlist, "defined", $sortlist, "NULL"),
							GetSQLValueString($orderlist, "defined", $orderlist, "NULL")
							);
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $tankdb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);

if($YEAR <> "0000" && $MONTH <> "00"){
mysql_select_db($database_tankdb, $tankdb);
$query_Reclog = sprintf("SELECT *							
							FROM tk_task  
							inner join tk_task_byday on tk_task.TID=tk_task_byday.csa_tb_backup1
							inner join tk_status on tk_task.csa_remark2=tk_status.id 
							inner join tk_status as tk_status1 on tk_task_byday.csa_tb_status=tk_status1.id 

							$where 
							(tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st >=%s
 							AND tk_task.csa_plan_et <=%s)
														
							ORDER BY csa_last_update DESC", 
							
							GetSQLValueString($startday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text")
							);
$Reclog = mysql_query($query_Reclog, $tankdb) or die(mysql_error());

$strslog=null;
while($row_Reclog=mysql_fetch_array($Reclog)){
$rowstatus = str_replace("'",   "\'",   $row_Reclog['task_status_display']);

$strtext =   htmlspecialchars($row_Reclog['csa_tb_text']);
$strtext =  stripslashes($strtext);
$strtext = str_replace("\n",   "<br>",   $strtext);  
$strtext = str_replace("\r",   "",   $strtext);  
$strtext = str_replace("  ",   "&nbsp;",   $strtext); 
$strtext = str_replace("'",   " ",   $strtext); 

$strtexttip =   htmlspecialchars($row_Reclog['csa_tb_text']);
$strtexttip =  stripslashes($strtexttip);
$strtexttip = str_replace("\n",   " ",   $strtexttip);  
$strtexttip = str_replace("\r",   " ",   $strtexttip);  
$strtexttip = str_replace("'",   " ",   $strtexttip); 


$logyear = str_split($row_Reclog['csa_tb_year'],4);
$logmonth = str_split($logyear[1],2);
$logdate = $logyear[0]."-".$logmonth[0]."-".$logmonth[1];

$strslog.="var "."d".$row_Reclog['TID'].$row_Reclog['csa_tb_year']."="."'<span title=\'$logdate  $multilingual_calendar_view\'>"."$rowstatus"."</span>"."</td><td width=\'30px\'  class=\'week_style_padtd\'>".$row_Reclog['csa_tb_manhour']."'; ";
}
} else {$strslog=null;}

mysql_select_db($database_tankdb, $tankdb);
$query_Sumlog = sprintf("SELECT *,
							sum(csa_tb_manhour) as sumhour							
							FROM tk_task  
							
							inner join tk_task_byday on tk_task.TID=tk_task_byday.csa_tb_backup1 
							inner join tk_status on tk_task.csa_remark2=tk_status.id 
							inner join tk_status as tk_status1 on tk_task_byday.csa_tb_status=tk_status1.id

							$where 
							(tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st >=%s
 							AND tk_task.csa_plan_et <=%s)
														
							GROUP BY TID", 
							
							GetSQLValueString($startday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text")
							);
$Sumlog = mysql_query($query_Sumlog, $tankdb) or die(mysql_error());

$strssumlog=null;
while($row_Sumlog=mysql_fetch_array($Sumlog)){
$strssumlog.="var "."sum".$row_Sumlog['TID']."='".$row_Sumlog['sumhour']."'; ";
}

mysql_select_db($database_tankdb, $tankdb);
$query_Sumtotal = sprintf("SELECT sum(csa_tb_manhour) as sumtotal							
							FROM tk_task  
							
							inner join tk_task_byday on tk_task.TID=tk_task_byday.csa_tb_backup1
							inner join tk_status on tk_task.csa_remark2=tk_status.id 
							inner join tk_status as tk_status1 on tk_task_byday.csa_tb_status=tk_status1.id

							$where 
							(tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st >=%s
 							AND tk_task.csa_plan_et <=%s)													
							", 
							
							GetSQLValueString($startday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text")
							);
$Sumtotal = mysql_query($query_Sumtotal, $tankdb) or die(mysql_error());
$row_Sumtotal = mysql_fetch_assoc($Sumtotal);

if($YEAR <> "0000" && $MONTH <> "00"){
mysql_select_db($database_tankdb, $tankdb);
$query_Sumbyday = sprintf("SELECT *, sum(csa_tb_manhour) as Sumbyday							
							FROM tk_task  
							
							inner join tk_task_byday on tk_task.TID=tk_task_byday.csa_tb_backup1 
							inner join tk_status on tk_task.csa_remark2=tk_status.id 
							inner join tk_status as tk_status1 on tk_task_byday.csa_tb_status=tk_status1.id 

							$where 
							(tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st <=%s
 							AND tk_task.csa_plan_et >=%s
							OR tk_task.csa_plan_st >=%s
 							AND tk_task.csa_plan_et <=%s)													
							GROUP BY csa_tb_year", 
							
							GetSQLValueString($startday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($endday , "text"),
							GetSQLValueString($startday , "text"),
							GetSQLValueString($endday , "text")
							);
$Sumbyday = mysql_query($query_Sumbyday, $tankdb) or die(mysql_error());
$strssumbyday=null;
while($row_Sumbyday=mysql_fetch_array($Sumbyday)){
$strssumbyday.="var "."sumbd".$row_Sumbyday['csa_tb_year']."='".$row_Sumbyday['Sumbyday']."'; ";
} 
} else {$strssumbyday=null;}

if ($pagetabs <> "etask") {
$outday = date("Y-m-d");

$outstfinish = GetSQLValueString("%" . $multilingual_dd_status_stfinish . "%", "text");
$outday = GetSQLValueString($outday , "text");

$outwhere = "";
			$outwhere=' WHERE';

			if($colname_Recordset1 <> '%')
			{
				$outwhere.= " tk_task.csa_to_user = $coltouser AND";
			}
			
			if($colfromuser_Recordset1 <> '%')
			{
				$outwhere.= " tk_task.csa_from_user = $colfromuser AND";
			}
						
			if($colcreate_Recordset1 <> '%')
			{
				$outwhere.= " tk_task.csa_create_user = $colcreateuser AND";
			}
			$outwhere.= " tk_status.task_status NOT LIKE $outstfinish AND";
			$outwhere.= " tk_task.csa_plan_et <= $outday";

mysql_select_db($database_tankdb, $tankdb);
$query_timeout = "SELECT *, 
							
							tk_project.project_name as project_name_prt,
							tk_user1.tk_display_name as tk_display_name1, 
							tk_user2.tk_display_name as tk_display_name2
							
							FROM tk_task  
							inner join tk_task_tpye on tk_task.csa_type=tk_task_tpye.id
							inner join tk_project on tk_task.csa_project=tk_project.id
							
							inner join tk_user as tk_user1 on tk_task.csa_to_user=tk_user1.uid 
							inner join tk_user as tk_user2 on tk_task.csa_from_user=tk_user2.uid 
							
							inner join tk_status on tk_task.csa_remark2=tk_status.id
							
							$outwhere 
														
							ORDER BY csa_plan_et DESC";
$query_limit_timeout = sprintf("%s LIMIT %d, %d", $query_timeout, $startRow_timeout, $maxRows_timeout);
$timeout = mysql_query($query_limit_timeout, $tankdb) or die(mysql_error());
$row_timeout = mysql_fetch_assoc($timeout);

if (isset($_GET['totalRows_timeout'])) {
  $totalRows_timeout = $_GET['totalRows_timeout'];
} else {
  $all_timeout = mysql_query($query_timeout);
  $totalRows_timeout = mysql_num_rows($all_timeout);
}
$totalPages_timeout = ceil($totalRows_timeout/$maxRows_timeout)-1;

$queryString_timeout = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_timeout") == false && 
        stristr($param, "totalRows_timeout") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_timeout = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_timeout = sprintf("&totalRows_timeout=%d%s", $totalRows_timeout, $queryString_timeout);
}
//搜索条件
mysql_select_db($database_tankdb, $tankdb);
$query_tkstatus = "SELECT * FROM tk_status ORDER BY task_status_backup1 ASC";
$tkstatus = mysql_query($query_tkstatus, $tankdb) or die(mysql_error());
$row_tkstatus = mysql_fetch_assoc($tkstatus);
$totalRows_tkstatus = mysql_num_rows($tkstatus);

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_type = "SELECT * FROM tk_task_tpye ORDER BY task_tpye_backup1 ASC";
$Recordset_type = mysql_query($query_Recordset_type, $tankdb) or die(mysql_error());
$row_Recordset_type = mysql_fetch_assoc($Recordset_type);
$totalRows_Recordset_type = mysql_num_rows($Recordset_type);

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset_project = "SELECT * FROM tk_project inner join tk_status_project on tk_project.project_status=tk_status_project.psid WHERE task_status NOT LIKE '%$multilingual_dd_status_prjfinish%' ORDER BY project_name ASC";
$Recordset_project = mysql_query($query_Recordset_project, $tankdb) or die(mysql_error());
$row_Recordset_project = mysql_fetch_assoc($Recordset_project);
$totalRows_Recordset_project = mysql_num_rows($Recordset_project);

mysql_select_db($database_tankdb, $tankdb);
$query_Recordset2 = "SELECT * FROM tk_user WHERE tk_user_rank NOT LIKE '0' ORDER BY tk_display_name ASC";
$Recordset2 = mysql_query($query_Recordset2, $tankdb) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>


<script type="text/JavaScript">

function GP_popupConfirmMsg(msg) { //v1.0
  document.MM_returnValue = confirm(msg);
}



function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function   searchtask() 
      {document.myform.action= ""; 
        document.myform.submit(); 
        return   true; 
      
      } 
function   exportexcel() 
      {document.myform.action= "excel.php "; 
        document.myform.submit(); 
        return   false; 
      
      } 
	  
function addtask()
{
    J.dialog.get({ id: "taskadd", title: '<?php echo $multilingual_taskadd_selprj; ?>', width: 400, height: 350, page: "task_add_selprj.php?section=1" });
}

<?php 
echo $strssumlog;
echo $strslog; 
echo $strssumbyday;?>
</script>
<?php if ($pagetabs <> "etask") { // Show outofdate if recordset not empty ?>
<?php if ($totalRows_timeout > 0 && $outofdate=="on") { // Show outofdate if recordset not empty ?>
<div class="alert" style="margin-left:7px; margin-right:7px;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h5><?php echo $multilingual_outofdate_title; ?></h5>
  
    
    <table  width="98%" >
         <?php do { ?>
        <tr class="timeout_div timeout_color">
            <td>
                <a href="default_task_edit.php?editID=<?php echo $row_timeout['TID']; ?>" target="_parent">
   <?php echo $row_timeout['TID']; ?> 
   [<?php echo $row_timeout['task_tpye']; ?>] <?php echo $row_timeout['csa_text']; ?> 
   </a>
            </td>
            <?php if($pagetabs <> "mtask"){ ?>
            <td>
                <a href="user_view.php?recordID=<?php echo $row_timeout['csa_to_user']; ?> "><?php echo $multilingual_default_task_to; ?>: <?php echo $row_timeout['tk_display_name1']; ?></a>
            </td>
            <?php } ?>
            <td>
                <?php 
	  $live_days = (strtotime(date("Y-m-d")) - strtotime($row_timeout['csa_plan_et']))/86400;
	  echo $multilingual_outofdate_outofdate.": ".$live_days." ".$multilingual_outofdate_date;
	  ?>
            </td>
        </tr>
        <?php } while ($row_timeout = mysql_fetch_assoc($timeout)); ?>
    </table>
   
   
   

   
   <table class="rowcon" border="0" align="center">
<tr>
<td>   <table border="0" class="timeout_color">
        <tr>
          <td><?php if ($pageNum_timeout > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_timeout=%d%s", $currentPage, 0, $queryString_timeout); ?>"><?php echo $multilingual_global_first; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_timeout > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_timeout=%d%s", $currentPage, max(0, $pageNum_timeout - 1), $queryString_timeout); ?>"><?php echo $multilingual_global_previous; ?></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_timeout < $totalPages_timeout) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_timeout=%d%s", $currentPage, min($totalPages_timeout, $pageNum_timeout + 1), $queryString_timeout); ?>"><?php echo $multilingual_global_next; ?></a>
              <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_timeout < $totalPages_timeout) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_timeout=%d%s", $currentPage, $totalPages_timeout, $queryString_timeout); ?>"><?php echo $multilingual_global_last; ?></a>
              <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
<td align="right">   <?php echo ($startRow_timeout + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_timeout + $maxRows_timeout, $totalRows_timeout) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_timeout ?> <?php echo $multilingual_outofdate_totle; ?>)&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>
</div>

<?php } // Show outofdate if recordset not empty ?>
<?php } // Show outofdate if recordset not empty ?>

<div class="tasktab">
<div class="clearboth"></div>
<?php if($pagetabs <> "etask"){ // Show search bar ?>
<div class="condition">
<a name="task"></a><span>
<form id="form1" name="myform" method="get" class="taskform">
<select name="select_year" id="select_year">
        <option value="--"><?php echo $multilingual_taskf_year; ?></option>
        <option value="2009" <?php 
		if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2009, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2009, date("Y")))) {echo "selected=\"selected\"";} ?>>2009</option>
        <option value="2010" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2010, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2010, date("Y")))) {echo "selected=\"selected\"";} ?>>2010</option>
        <option value="2011" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2011, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2011, date("Y")))) {echo "selected=\"selected\"";} ?>>2011</option>
        <option value="2012" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2012, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2012, date("Y")))) {echo "selected=\"selected\"";} ?>>2012</option>
        <option value="2013" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2013, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2013, date("Y")))) {echo "selected=\"selected\"";} ?>>2013</option>
        <option value="2014" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2014, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2014, date("Y")))) {echo "selected=\"selected\"";} ?>>2014</option>
        <option value="2015" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2015, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2015, date("Y")))) {echo "selected=\"selected\"";} ?>>2015</option>
        <option value="2016" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2016, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2016, date("Y")))) {echo "selected=\"selected\"";} ?>>2016</option>
        <option value="2017" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2017, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2017, date("Y")))) {echo "selected=\"selected\"";} ?>>2017</option>
        <option value="2018" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2018, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2018, date("Y")))) {echo "selected=\"selected\"";} ?>>2018</option>
        <option value="2019" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2019, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2019, date("Y")))) {echo "selected=\"selected\"";} ?>>2019</option>
        <option value="2020" <?php if (isset($_SESSION['ser_year'])) {	
		if (!(strcmp(2020, "{$_SESSION['ser_year']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2020, date("Y")))) {echo "selected=\"selected\"";} ?>>2020</option>
      </select> / <select name="textfield" id="textfield">
      <option value="--"><?php echo $multilingual_taskf_month; ?></option>
      <option value="01" <?php 
	  if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("01", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(1, date("n")))) {echo "selected=\"selected\"";} ?>>01</option>
      <option value="02" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("02", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(2, date("n")))) {echo "selected=\"selected\"";} ?>>02</option>
      <option value="03" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("03", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(3, date("n")))) {echo "selected=\"selected\"";} ?>>03</option>
      <option value="04" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("04", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(4, date("n")))) {echo "selected=\"selected\"";} ?>>04</option>
      <option value="05" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("05", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(5, date("n")))) {echo "selected=\"selected\"";} ?>>05</option>
      <option value="06" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("06", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(6, date("n")))) {echo "selected=\"selected\"";} ?>>06</option>
      <option value="07" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("07", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(7, date("n")))) {echo "selected=\"selected\"";} ?>>07</option>
      <option value="08" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("08", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(8, date("n")))) {echo "selected=\"selected\"";} ?>>08</option>
      <option value="09" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("09", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(9, date("n")))) {echo "selected=\"selected\"";} ?>>09</option>
      <option value="10" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("10", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(10, date("n")))) {echo "selected=\"selected\"";} ?>>10</option>
      <option value="11" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("11", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(11, date("n")))) {echo "selected=\"selected\"";} ?>>11</option>
      <option value="12" <?php if (isset($_SESSION['ser_month'])) {	
		if (!(strcmp("12", "{$_SESSION['ser_month']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if (!(strcmp(12, date("n")))) {echo "selected=\"selected\"";} ?>>12</option>
    </select>
	
	
	
	<select name="select_st" id="select_st">
        <option value=""><?php echo $multilingual_taskf_status; ?></option>
		<option value="1" <?php 
if (isset($_SESSION['ser_status'])) {	
		if (!(strcmp(1, "{$_SESSION['ser_status']}"))) {
			echo "selected=\"selected\"";
			}
		}	
?>><?php echo $multilingual_default_taskstatusf; ?></option>
        <?php
do {  
?>
        <option value="<?php echo $row_tkstatus['task_status']; ?>" <?php 
if (isset($_SESSION['ser_status'])) {	
		if (!(strcmp($row_tkstatus['task_status'], "{$_SESSION['ser_status']}"))) {
			echo "selected=\"selected\"";
			}
		}	
?>><?php echo $row_tkstatus['task_status']?></option>
        <?php
} while ($row_tkstatus = mysql_fetch_assoc($tkstatus));
  $rows = mysql_num_rows($tkstatus);
  if($rows > 0) {
      mysql_data_seek($tkstatus, 0);
	  $row_tkstatus = mysql_fetch_assoc($tkstatus);
  }
?>
      </select>
	  
	  
	  <select name="select_type" id="select_type">
        <option value=""><?php echo $multilingual_taskf_type; ?></option>
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset_type['id']?>"
		<?php if (isset($_SESSION['ser_tktype'])) {	
		if (!(strcmp($row_Recordset_type['id'], "{$_SESSION['ser_tktype']}"))) {
			echo "selected=\"selected\"";
			}
		} ?>
		><?php echo $row_Recordset_type['task_tpye']?></option>
        <?php
} while ($row_Recordset_type = mysql_fetch_assoc($Recordset_type));
  $rows = mysql_num_rows($Recordset_type);
  if($rows > 0) {
      mysql_data_seek($Recordset_type, 0);
	  $row_Recordset_type = mysql_fetch_assoc($Recordset_type);
  }
?>
      </select>
	  
<!-- 全部论文类型过滤 	  
	  <select name="select_prt" id="select_prt">
        <option value=""><?php echo $multilingual_taskf_priority; ?></option>
        <option value="<?php echo $multilingual_dd_priority_p5; ?>" <?php if (isset($_SESSION['ser_tkprt'])) {	
		if (!(strcmp($multilingual_dd_priority_p5, "{$_SESSION['ser_tkprt']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_priority_p5; ?></option>

        <option value="<?php echo $multilingual_dd_priority_p4; ?>" <?php if (isset($_SESSION['ser_tkprt'])) {	
		if (!(strcmp($multilingual_dd_priority_p4, "{$_SESSION['ser_tkprt']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_priority_p4; ?></option>

        <option value="<?php echo $multilingual_dd_priority_p3; ?>" <?php if (isset($_SESSION['ser_tkprt'])) {	
		if (!(strcmp($multilingual_dd_priority_p3, "{$_SESSION['ser_tkprt']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_priority_p3; ?></option>

        <option value="<?php echo $multilingual_dd_priority_p2; ?>" <?php if (isset($_SESSION['ser_tkprt'])) {	
		if (!(strcmp($multilingual_dd_priority_p2, "{$_SESSION['ser_tkprt']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_priority_p2; ?></option>

        <option value="<?php echo $multilingual_dd_priority_p1; ?>" <?php if (isset($_SESSION['ser_tkprt'])) {	
		if (!(strcmp($multilingual_dd_priority_p1, "{$_SESSION['ser_tkprt']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_priority_p1; ?></option>
      </select>
全部论文类型过滤-->
			  
<!-- 紧急程度过滤 	  
	  <select name="select_temp" id="select_temp">
        <option value=""><?php echo $multilingual_taskf_level; ?></option>
        <option value="<?php echo $multilingual_dd_level_l5; ?>" <?php if (isset($_SESSION['ser_level'])) {	
		if (!(strcmp($multilingual_dd_level_l5, "{$_SESSION['ser_level']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_level_l5; ?></option>

        <option value="<?php echo $multilingual_dd_level_l4; ?>" <?php if (isset($_SESSION['ser_level'])) {	
		if (!(strcmp($multilingual_dd_level_l4, "{$_SESSION['ser_level']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_level_l4; ?></option>

		<option value="<?php echo $multilingual_dd_level_l3; ?>" <?php if (isset($_SESSION['ser_level'])) {	
		if (!(strcmp($multilingual_dd_level_l3, "{$_SESSION['ser_level']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_level_l3; ?></option>

		<option value="<?php echo $multilingual_dd_level_l2; ?>" <?php if (isset($_SESSION['ser_level'])) {	
		if (!(strcmp($multilingual_dd_level_l2, "{$_SESSION['ser_level']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_level_l2; ?></option>

		<option value="<?php echo $multilingual_dd_level_l1; ?>" <?php if (isset($_SESSION['ser_level'])) {	
		if (!(strcmp($multilingual_dd_level_l1, "{$_SESSION['ser_level']}"))) {
			echo "selected=\"selected\"";
			}
		}?>><?php echo $multilingual_dd_level_l1; ?></option>
      </select>
紧急程度过滤-->	  
	  
<!-- 首页项目过滤 	  
	  <select name="select_project" id="select_project">
        <option value=""><?php echo $multilingual_taskf_project; ?></option>
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset_project['id']?>"
		<?php 
		if (isset($_SESSION['ser_project'])) {	
		if (!(strcmp($row_Recordset_project['id'], "{$_SESSION['ser_project']}"))) {
			echo "selected=\"selected\"";
			}
		}
 ?>><?php echo $row_Recordset_project['project_name']?></option>
        <?php
} while ($row_Recordset_project = mysql_fetch_assoc($Recordset_project));
  $rows = mysql_num_rows($Recordset_project);
  if($rows > 0) {
      mysql_data_seek($Recordset_project, 0);
	  $row_Recordset_project = mysql_fetch_assoc($Recordset_project);
  }
?>
      </select>
项目过滤 -->	  


	  <?php if ($pagetabs <> "mtask") {  ?>
<!-- 执行人过滤-->	
	  <select id="select4" name="select4">
        <option value="%"><?php echo $multilingual_taskf_touser; ?></option>
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset2['uid']?>"
		<?php 
		if (isset($_SESSION['ser_touser'])) {	
		if (!(strcmp($row_Recordset2['uid'], "{$_SESSION['ser_touser']}"))) {
			echo "selected=\"selected\"";
			}
		}
else if(!(strcmp($row_Recordset2['uid'], "{$_SESSION['MM_uid']}"))) {
				echo "selected=\"selected\"";
				} ?>><?php echo $row_Recordset2['tk_display_name']?></option>
        <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
      </select>
       
      
	  <?php } ?>

<!-- 提交人过滤 -->	  
	  <select id="select2" name="select2" <?php if ($pagetabs <> "alltask") { echo "style='display:none'"; }?>>
        <option value="%"><?php echo $multilingual_taskf_fromuser; ?></option>
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset2['uid']?>"
		<?php 
		if (isset($_SESSION['ser_fromuser'])) {	
		if (!(strcmp($row_Recordset2['uid'], "{$_SESSION['ser_fromuser']}"))) {
			echo "selected=\"selected\"";
			}
		}
 ?>><?php echo $row_Recordset2['tk_display_name']?></option>
        <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
      </select>

<!-- 创建人过滤       
	  <select  name="create_by" id="create_by" <?php if ($pagetabs <> "alltask") { echo "style='display:none'"; }?>>
      <option value="%"><?php echo $multilingual_taskf_createuser; ?></option>
      <?php
do {  
?>
      <option value="<?php echo $row_Recordset2['uid']?>"
	  <?php 
		if (isset($_SESSION['ser_createuser'])) {	
		if (!(strcmp($row_Recordset2['uid'], "{$_SESSION['ser_createuser']}"))) {
			echo "selected=\"selected\"";
			}
		}
 ?>><?php echo $row_Recordset2['tk_display_name']?></option>
      <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
    </select>
创建人过滤-->

	  <input name="pagetab" id="pagetab" value="<?php echo $pagetabs; ?>" style="display:none" />
	  <input type="submit" name="search" id="search" value="<?php echo $multilingual_global_filterbtn; ?>"  class="button" onclick= "return   searchtask(); " />&nbsp;&nbsp;
<!-- 导出Excel 
	  <input type="button" name="export" id="export" value="<?php echo $multilingual_global_excel; ?>"  class="button" onclick= "return   exportexcel(); " /> 
-->
	  </form></span>
	<?php if($pagetabs == "alltask") { // Show searchbox if page is alltask ?>
	<span>
<form id="form2" name="myform2" method="get" class="taskform">
		  <select  name="searchby" id="searchby" >
		    <option value="tit"><?php echo $multilingual_tasks_title; ?></option>
		    <option value="tid"><?php echo $multilingual_tasks_tid; ?></option>
		    <option value="tag"><?php echo $multilingual_tasks_tag; ?></option>
	      </select>
		  <input type="text" name="inputval" id="inputval" value="" />
		  <input style="display:none" type="text" name="pagetab" value="alltask" />
		  <input style="display:none" type="text" name="select4" value="%" />
		  <input style="display:none" type="text" name="select_year" value="--" />
		  <input style="display:none" type="text" name="textfield" value="--" />
		  <input type="submit" name="search1" id="search1" value="<?php echo $multilingual_global_searchbtn; ?>"  class="button" />
          </form>
		  </span>
<?php }  // Show searchbox if page is alltask ?>
</div>
<?php } // Show search bar ?>
<?php if ($totalRows_Recordset1 > 0) { // Show task list if recordset not empty ?>
<!--table left -->
<div class="tbody_bl" id="tbody_bl">

<table  border="0" cellspacing="0" cellpadding="0" align="center"  class="maintable tasktab_bl" >

 <thead  class="toptable tasktab_tl" >
    <tr>
      <th width="15%;"  class="tasktab_height" ><a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=TID&order=<?php 
	  if ( $sortlist <> "TID"){
	  echo "DESC";
	  }else if( $sortlist == "TID" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>" 
	  <?php 
	  if($sortlist=="TID" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="TID" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>><?php echo $multilingual_default_task_id; ?></a></th>      
      <th width="65%;" >
	  <a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_type&order=<?php 
	  if ( $sortlist <> "csa_type"){
	  echo "DESC";
	  }else if( $sortlist == "csa_type" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>" 
	  <?php 
	  if($sortlist=="csa_type" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_type" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>><?php echo $multilingual_default_task_type; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;
	  
	  <a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_text&order=<?php 
	  if ( $sortlist <> "csa_text"){
	  echo "DESC";
	  }else if( $sortlist == "csa_text" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>" 
	  <?php 
	  if($sortlist=="csa_text" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_text" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>><?php echo $multilingual_default_task_title; ?></a></th>
      <th width="20%"><a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_to_user&order=<?php 
	  if ( $sortlist <> "csa_to_user"){
	  echo "DESC";
	  }else if( $sortlist == "csa_to_user" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>" 
	  <?php 
	  if($sortlist=="csa_to_user" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_to_user" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>><?php echo $multilingual_default_task_to; ?></a></th>
      </tr>
   </thead>
   <tbody>
        <tr >
          <td colspan="3" class="fontbold weekend_style"><?php echo $multilingual_default_task_totalhour; ?></td>
        </tr>
 <?php do { ?>
        <tr  title="<?php echo $row_Recordset1['csa_text']; ?>" >
      <td class="week_style_padtd"   ><?php echo $row_Recordset1['TID']; ?></td>
      <td class="week_style_padtd" ><div  class="text_overflow_150  task_title"><a href="default_task_edit.php?editID=<?php echo $row_Recordset1['TID']; ?>&pagetab=<?php echo $pagetabs; ?>"  target="_parent">[<?php echo $row_Recordset1['task_tpye']; ?>] <?php echo $row_Recordset1['csa_text']; ?></a></div></td>
      <td class="week_style_padtd" >
	  <a href="user_view.php?recordID=<?php echo $row_Recordset1['csa_to_user']; ?>" target="_parent">
	  <?php echo $row_Recordset1['tk_display_name1']; ?></a></td>
      </tr>
    <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>  
    </tbody>

  </table>
  
</div>
<!--table right -->
<div class="tbody_br"  id="tbody_br"  >
  <table  border="0" cellspacing="0" cellpadding="0" align="center"  class="maintable tasktab_br" >
   
     <thead  class="toptable " >
    <tr>
        <th rowspan="2" width="100px">
	  <a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_remark2&order=<?php 
	  if ( $sortlist <> "csa_remark2"){
	  echo "DESC";
	  }else if( $sortlist == "csa_remark2" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>" 
	  <?php 
	  if($sortlist=="csa_remark2" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_remark2" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>>
	  <?php echo $multilingual_default_task_status; ?></a></th>
      <th rowspan="2" width="80px" class="tasktab_height"><?php echo $multilingual_default_task_planpv; ?></th>
<!-- 实际用时 
      <th rowspan="2" width="80px" class="tasktab_height"><?php echo $multilingual_default_task_hourac; ?></th>
 -->       
	  
      <th rowspan="2" width="110px">
	  <a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_plan_et&order=<?php 
	  if ( $sortlist <> "csa_plan_et"){
	  echo "DESC";
	  }else if( $sortlist == "csa_plan_et" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>" 
	  <?php 
	  if($sortlist=="csa_plan_et" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_plan_et" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>>

	  <?php echo $multilingual_default_task_planend; ?></a></th>
	  
      <th rowspan="2" width="200px">
	  <a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_project&order=<?php 
	  if ( $sortlist <> "csa_project"){
	  echo "DESC";
	  }else if( $sortlist == "csa_project" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>" 
	  <?php 
	  if($sortlist=="csa_project" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_project" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>>
	  <?php echo $multilingual_default_task_project; ?></a></th>

      <th rowspan="2" width="80px">
	  <a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_from_user&order=<?php 
	  if ( $sortlist <> "csa_from_user"){
	  echo "DESC";
	  }else if( $sortlist == "csa_from_user" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>#fromsite" 
	  <?php 
	  if($sortlist=="csa_from_user" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_from_user" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>>
	  <?php echo $multilingual_default_task_from; ?></a></th>
      <th rowspan="2" width="70px">
	  <a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_priority&order=<?php 
	  if ( $sortlist <> "csa_priority"){
	  echo "DESC";
	  }else if( $sortlist == "csa_priority" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>#fromsite" 
	  <?php 
	  if($sortlist=="csa_priority" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_priority" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>>
	  <?php echo $multilingual_default_task_priority; ?></a></th>
      <th rowspan="2" width="80px">
	  <a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_temp&order=<?php 
	  if ( $sortlist <> "csa_temp"){
	  echo "DESC";
	  }else if( $sortlist == "csa_temp" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>#fromsite" 
	  <?php 
	  if($sortlist=="csa_temp" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_temp" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>>
	  <?php echo $multilingual_default_tasklevel; ?></a></th>
      <th rowspan="2" width="112px">
	  <a href="<?php echo $pagenames; ?>?<?php echo $current_url; ?>&sort=csa_last_update&order=<?php 
	  if ( $sortlist <> "csa_last_update"){
	  echo "DESC";
	  }else if( $sortlist == "csa_last_update" && $orderlist == "DESC"){
	  echo "ASC";
	  } else {
	  echo "DESC";
	  }
	  ?>#fromsite" 
	  <?php 
	  if($sortlist=="csa_last_update" && $orderlist=="ASC"){
	  echo "class='sort_asc'";
	  } else if ($sortlist=="csa_last_update" && $orderlist=="DESC"){
	  echo "class='sort_desc'";
	  }
	  ?>>
	  <?php echo $multilingual_global_lastupdate; ?>
	  </a>
	  </th>
      
          <th colspan="8" class="weekbig_style">  <!-- 标记colspan="14" -->
<?php
$DAY = date("d");
$time = $YEAR."-".$MONTH."-".$DAY;
if (isset($_GET['getday'])) {
  $time = $_GET['getday'];
}
$time = strtotime( $time);
?>
<div class="float_left task_weeklog_right"><a name="fromsite">&nbsp;</a></div>
<div class="float_left task_weeklog_div"> 
<div class="task_weeklog_left">
</th>

<!-- 日期 
</div>
</div>
<div class="float_right task_weeklog_right"><a name="logsite">&nbsp;</a></div>
	  </th>
      </tr>
    <tr>
      <th width="111px" colspan="2"><?php echo $multilingual_global_sun; 
if($YEAR <> "0000" && $MONTH <> "00"){
echo date(" m/d", strtotime("last Sunday", $time));}?></th>
      <th width="111px" colspan="2"><?php echo $multilingual_global_mon; 
if($YEAR <> "0000" && $MONTH <> "00"){
echo date(" m/d", strtotime("last Sunday +1 days", $time));}?>
</th>
      <th width="111px" colspan="2"><?php echo $multilingual_global_tues; 
if($YEAR <> "0000" && $MONTH <> "00"){
echo date(" m/d", strtotime("last Sunday +2 days", $time));}?></th>
      <th width="111px" colspan="2"><?php echo $multilingual_global_wed; 
if($YEAR <> "0000" && $MONTH <> "00"){
echo date(" m/d", strtotime("last Sunday +3 days", $time));}?></th>
      <th width="111px" colspan="2"><?php echo $multilingual_global_thur; 
if($YEAR <> "0000" && $MONTH <> "00"){
echo date(" m/d", strtotime("last Sunday +4 days", $time));}?></th>
      <th width="111px" colspan="2"><?php echo $multilingual_global_fir; 
if($YEAR <> "0000" && $MONTH <> "00"){
echo date(" m/d", strtotime("last Sunday +5 days", $time));}?></th>
      <th width="111px" colspan="2"><?php echo $multilingual_global_sat; 
if($YEAR <> "0000" && $MONTH <> "00"){
echo date(" m/d", strtotime("last Sunday +6 days", $time));}?></th>
    </tr>

-->
   </thead>     
<tbody>
     <tr class="fontbold  weekend_style"> 
         <td class="week_style_padtd">&nbsp;</td>
         <td class="week_style_padtd">&nbsp;</td> 
         <td class="week_style_padtd">
       </td>       
       <td class="week_style">&nbsp;</td>
       <td class="week_style_padtd  task_title" >&nbsp;</td>
       
	   <td class="week_style_padtd">&nbsp;</td>
	   <td class="week_style_padtd">&nbsp;</td>
       <td class="week_style_padtd">&nbsp;</td>
       
<!--删除       <td class="week_style_padtd">&nbsp;</td>
        
        <td class="week_style_padtd">&nbsp;</td>
         <td  class="week_style week_style_padtd">
      
<?php
$sumbd = date("Ymd", strtotime("last Sunday", $time));
$out_sumbd = "
<script type='text/javascript'>
if (typeof(sumbd$sumbd)!='undefined'){
document.write(sumbd$sumbd)
}
</script>
";
echo $out_sumbd;
?>
&nbsp;</td>
       <td  class="week_style">&nbsp;</td>
       <td class="week_style week_style_padtd">
<?php
$sumbd = date("Ymd", strtotime("last Sunday +1 days", $time));
$out_sumbd = "
<script type='text/javascript'>
if (typeof(sumbd$sumbd)!='undefined'){
document.write(sumbd$sumbd)
}
</script>
";
echo $out_sumbd;
?>
&nbsp;</td>
       <td >&nbsp;</td>
       <td class="week_style_padtd">
<?php
$sumbd = date("Ymd", strtotime("last Sunday +2 days", $time));
$out_sumbd = "
<script type='text/javascript'>
if (typeof(sumbd$sumbd)!='undefined'){
document.write(sumbd$sumbd)
}
</script>
";
echo $out_sumbd;
?>
&nbsp;</td>
       <td >&nbsp;</td>
       <td class="week_style_padtd">
<?php
$sumbd = date("Ymd", strtotime("last Sunday +3 days", $time));
$out_sumbd = "
<script type='text/javascript'>
if (typeof(sumbd$sumbd)!='undefined'){
document.write(sumbd$sumbd)
}
</script>
";
echo $out_sumbd;
?>
&nbsp;</td>
       <td >&nbsp;</td>
       <td class="week_style_padtd">
<?php
$sumbd = date("Ymd", strtotime("last Sunday +4 days", $time));
$out_sumbd = "
<script type='text/javascript'>
if (typeof(sumbd$sumbd)!='undefined'){
document.write(sumbd$sumbd)
}
</script>
";
echo $out_sumbd;
?>
&nbsp;</td>
       <td class="weekend_style" >&nbsp;</td>
       <td class="week_style_padtd weekend_style">
<?php
$sumbd = date("Ymd", strtotime("last Sunday +5 days", $time));
$out_sumbd = "
<script type='text/javascript'>
if (typeof(sumbd$sumbd)!='undefined'){
document.write(sumbd$sumbd)
}
</script>
";
echo $out_sumbd;
?>
&nbsp;</td>
       <td class="weekend_style"  >&nbsp;</td>
       <td class="week_style_padtd weekend_style">
<?php
$sumbd = date("Ymd", strtotime("last Sunday +6 days", $time));
$out_sumbd = "
<script type='text/javascript'>
if (typeof(sumbd$sumbd)!='undefined'){
document.write(sumbd$sumbd)
}
</script>
";
echo $out_sumbd;
?>
&nbsp;</td>
-->

     </tr>
     <?php do { ?>
     <tr>
         <td class="week_style_padtd"  width="100px"><?php echo $row_Recordset1['task_status_display']; ?></td>
         <td class="week_style_padtd" width="80px">
       
       <?php echo $row_Recordset1['csa_plan_hour']; ?>&nbsp;
       </td>
       
<!--  实际用时
       <td class="week_style_padtd" width="80px">
<?php
$sumlog_tid = $row_Recordset1['TID'];
$out_sumlog = "
<script type='text/javascript'>
if (typeof(sum$sumlog_tid)!='undefined'){
document.write(sum$sumlog_tid)
} else {
document.write('0')
}
</script>
";
echo $out_sumlog;
?>&nbsp;
</td>
-->

<td class="week_style_padtd <?php 

		$today = date("Y-m-d");   
		if($today > $row_Recordset1['csa_plan_et'] && strpos($row_Recordset1['task_status_display'], $multilingual_dd_status_stfinish) == false){
	   echo "red";
	   }   
	   ?>" width="70px" >
       
       <?php echo $row_Recordset1['csa_plan_et']; ?>&nbsp;
       </td>

       <td class="week_style_padtd  task_title"  width="200px" >
         <div  class="text_overflow_180 ">
		 <a href="project_view.php?recordID=<?php echo $row_Recordset1['csa_project']; ?>" target="_parent" title="<?php echo $row_Recordset1['project_name_prt']; ?>"><?php echo $row_Recordset1['project_name_prt']; ?></a>
		 </div>
       </td>

       <td class="week_style_padtd"  width="100px">
	   <a href="user_view.php?recordID=<?php echo $row_Recordset1['csa_from_user']; ?>" target="_parent">
	   <?php echo $row_Recordset1['tk_display_name2']; ?></a>
	   </td>
       <td class="week_style_padtd" width="70px" align="center">
	   <?php
switch ($row_Recordset1['csa_priority'])
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
?>
	   </td>
       <td class="week_style_padtd" width="80px" align="center">
	   <?php
switch ($row_Recordset1['csa_temp'])
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
?>
	   </td>
      <td class="week_style_padtd" width="112px"><span 
	   <?php 
		$lonelastday = $row_Recordset1['csa_last_update']; 
		$lastday = substr($lonelastday,0,10);   
		if($lastday > $row_Recordset1['csa_plan_et']){
	   echo "class='red'";
	   }   
	   ?>
	   >
       <?php 
		
	   echo $lastday;
	   ?></span>&nbsp;
       </td>
<!--      <td width="80px" class="weekend_style week_style" >  

<?php
$row_tid = $row_Recordset1['TID'];
$row_userid = $row_Recordset1['csa_to_user'];
$row_pid = $row_Recordset1['csa_project'];
$row_type = $row_Recordset1['csa_type'];
$nowuser = $_SESSION['MM_uid'];

$m1day1 = date("Ymd", strtotime("last Sunday", $time));
$m1day1d = date("Y-m-d", strtotime("last Sunday", $time));

$out_row = "";
echo $out_row;
?>
       </td>  -->
       </tr>
     <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>  
   </tbody>
  </table>
  

</div>
<?php } // Show task list if recordset not empty ?>
<div class="clearboth"></div>
</div>
<?php if ($totalRows_Recordset1 > 0) { // Show nextpage if task list recordset not empty ?>
<table class="rowcon" border="0" align="center">
<tr>
<td>  <table border="0">
  <tr>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>#task"><?php echo $multilingual_global_first; ?></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>#task"><?php echo $multilingual_global_previous; ?></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>#task"><?php echo $multilingual_global_next; ?></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>#task"><?php echo $multilingual_global_last; ?></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
      </td>
<td align="right"><?php echo ($startRow_Recordset1 + 1) ?> <?php echo $multilingual_global_to; ?> <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> (<?php echo $multilingual_global_total; ?> <?php echo $totalRows_Recordset1 ?>)</td>
</tr>
</table>

<?php } // Show nextpage if task list recordset not empty ?>

<?php if ($totalRows_Recordset1 == 0) { // Show tips if recordset empty ?>
<div class="alert" style="margin:6px;">
  <?php echo $multilingual_default_sorrytipup; ?>
</div>
<?php } // Show tips if recordset empty ?>