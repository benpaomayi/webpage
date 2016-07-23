<?php require_once('config/tank_config.php'); ?>
<?php require_once('session_unset.php'); ?>
<?php require_once('session.php'); ?>
<?php require_once('default_fun_jiekuan_MY.php'); ?>
<?php
$restrictGoTo = "user_error3.php";
if ($_SESSION['MM_rank'] < "3") {   
  header("Location: ". $restrictGoTo); 
  exit;
}


$taskid = $_GET['taskid'];
$nowuserid = $_SESSION['MM_uid'];
$nowuser = $_SESSION['MM_Displayname'];

$to_user = "-1";
if (isset($_POST['csa_to_user'])) {
  $to_user= $_POST['csa_to_user'];
}

$title = "-1";
if (isset($_POST['csa_text'])) {
  $title= $_POST['csa_text'];
}

$project_id = "-1";
if (isset($_GET['projectID'])) {
  $project_id = $_GET['projectID'];
}

$project_url = "-1";
if (isset($_GET['formproject'])) {
  $project_url= $_GET['formproject'];
}



$user_url = "-1";
if (isset($_GET['touser'])) {
  $user_url= $_GET['touser'];
}

//for wbs!
$wbs_id = "-1";
if (isset($_GET['wbsID'])) {
  $wbs_id = $_GET['wbsID'];
}

//提交附件csa_remark1
if ( empty( $_POST['csa_remark1'] ) ){
	$csa_remark1 = "'',";
}else{
	$csa_remark1 = sprintf("%s,", GetSQLValueString(str_replace("%","%%",$_POST['csa_remark1']), "text"));
}


if ((isset($_POST["jiekuan_insert"])) && ($_POST["jiekuan_insert"] == "form1")) {
$jiekuan = new_jiekuan( $_POST['tk_hk_zt'], $_POST['tk_jk_ly'], $_POST['tk_jkr'], $_POST['tk_jk_jinban'],$_POST['tk_hk_ren'],$_POST['tk_jk_rq'], $project_id, $taskid);	

//提交附件
$insertSQL = sprintf("INSERT INTO tk_document (tk_doc_title, tk_doc_edit, tk_doc_attachment,tk_doc_class1) VALUES ( '借款单扫描件',%s,$csa_remark1 $taskid  )",
		GetSQLValueString($_POST['tk_doc_edit'], "text")
                );
mysql_select_db($database_tankdb, $tankdb);
$Resulttijiao= mysql_query($insertSQL, $tankdb) or die(mysql_error());

$updateGoTo = "log_finish.php";
if (isset($_SERVER['QUERY_STRING'])) {
	$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
	$updateGoTo .= $_SERVER['QUERY_STRING'];
}
header(sprintf("Location: %s", $updateGoTo));

}

?>

<html>
<head>
<title>借款信息</title>
<link type="text/css" href="skin/themes/base/ui.base.css" rel="stylesheet" />
<link type="text/css" href="skin/themes/base/ui.theme.css" rel="stylesheet" />
<link href="skin/themes/base/lhgcheck.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="srcipt/lhgcheck.js"></script>
<script type="text/javascript" src="skin/jquery-1.3.2.js"></script>
<script type="text/javascript" src="skin/ui/ui.core.js" charset="utf-8"></script>
<script type="text/javascript" src="skin/ui/ui.datepicker_<?php echo $language; ?>.js" charset="utf-8"></script>
<script type="text/javascript">
function jiekuandan()
{
	window.location="file_add.php?projectid=<?php echo $taskid; ?>&pid=0&pagetab=allfile" ;
}

	$(function() {
		$("#datepicker").datepicker({showOn: 'button', buttonImage: 'skin/themes/base/images/calendar.gif', buttonImageOnly: true});
	
	
    $('#datepicker6').datepicker({
			changeMonth: true,
			changeYear: true
		});
		$('#datepicker8').datepicker({
			changeMonth: true,
			changeYear: true
		});
		
		});
    </script>
    
<script charset="utf-8" src="editor/kindeditor.js"></script>
<script charset="utf-8" src="editor/lang/zh_CN.js"></script>    
 <script type="text/javascript"> 
 var P = window.parent, D = P.loadinndlg();   
 function closreload(url)
 {
     if(!url)
 	    P.reload();    
 }
 
 function over()
 {
     P.cancel();
 }
 
 function shuaxin()
 {   
	 document.getElementById("tijiao").click();
     
 } 
  
 </script>  
</head>
<body>
<form action="<?php echo $editFormAction; ?>" name="form1" method="post" id="form1" >
<table width="380" border="0" align="center" cellpadding="5" bgcolor= "#eeeeee">

<tr>
    <td>借款人：</td>
    <td><input name="tk_jkr" type="text" id="tk_jkr" ></td>
</tr>
<tr>
    <td>借款经办人：</td>
    <td><input name="tk_jk_jinban" type="text" id="tk_jk_jinban" ></td>
</tr>
<tr>
    <td>借款日期:</td>
    <td><input name="tk_jk_rq" type="text" id="datepicker6" ></td>
</tr>

<tr>
    <td>借款项目来源：</td>
    <td><input name="tk_jk_ly" type="text" id="tk_jk_ly"  /></td>
</tr>
<tr>
    <td width="40%">账号：</td>  
    <td><input type="text" name="tk_hk_zt"    /></td>
  
</tr>



<tr>
    <td>开户银行:</td>
    <td><input name="tk_hk_ren" type="text" id="tk_hk_ren" ></td>
</tr>
<!-- 
<tr>
<td>
<input name="button" type="button" value="提交借款单" onclick="jiekuandan()" ></td>
</td>
</tr>
 -->
 <tr valign="baseline" style="display:none;">
      <td><input name="tk_doc_edit" type="text" class="gray" value="<?php echo "{$_SESSION['MM_uid']}"; ?>" size="32" readonly="readonly" /></td>
    </tr>
    
  <tr>
            <td valign="top"><?php echo $multilingual_upload_attachment; ?></td>
            <td valign="top"><input type="text" name="csa_remark1" id="csa_remark1" value="" size="30" placeholder="<?php echo $multilingual_upload_attachment; ?>" />
            <input class="mouse_hover" value="上传借款单扫描件" type="button" onClick="window.open('upload_file.php','<?php echo $multilingual_global_upload; ?>','width=450,height=235')" >
			
			</td>
          </tr> 
         
        
<tr>
    <td colspan="2" align="center">
      
          <input type="button"  id="btn_tijao" value="提交" onclick="shuaxin()">        
      <input type="submit" name="tijiao" id="tijiao" value="提交"  style="display:none">
       <!--   
      <input type="submit" name="tijiao" id="tijiao" value="提交"  >
      -->
      <input  type="button" value="取消" onclick="over()"/>
      <!--  
      <input type="reset" name="reset" value="重置"></td>
      -->
</tr>
</table>
<input type="hidden" name="jiekuan_insert" value="form1" />
</form>
</body>
</html>