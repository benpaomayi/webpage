<?php require_once('config/tank_config.php'); ?>
<?php require_once('session_unset.php'); ?>
<?php require_once('session.php'); ?>
<?php require_once('default_fun_huankuan_MY.php'); ?>
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


if ((isset($_POST["huankuan_insert"])) && ($_POST["huankuan_insert"] == "form1")) {
$huankuan = new_huankuan( $_POST['tk_hk_pd'], $_POST['tk_bx_qr'], $_POST['tk_bx_rq'], $_POST['tk_hk_qr'],$_POST['tk_hk_rq'], $project_id, $taskid);	
//测试tk_project的还款状态
$projecthuankuan=new_projecthuankuan( $_POST['tk_hk_qr'],$taskid);
//
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
<title>还款信息</title>
<link type="text/css" href="skin/themes/base/ui.base.css" rel="stylesheet" />
<link type="text/css" href="skin/themes/base/ui.theme.css" rel="stylesheet" />
<link href="skin/themes/base/lhgcheck.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="srcipt/lhgcheck.js"></script>
<script type="text/javascript" src="skin/jquery-1.3.2.js"></script>
<script type="text/javascript" src="skin/ui/ui.core.js" charset="utf-8"></script>
<script type="text/javascript" src="skin/ui/ui.datepicker_<?php echo $language; ?>.js" charset="utf-8"></script>
<script type="text/javascript">

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
<form name="form1" method="post" id="form1" >
<table width="380" border="0" align="center" cellpadding="5" bgcolor= "#eeeeee">
<tr>
    <td width="40%">是否需要还款：</td>
  <td valign="top"><select name="tk_hk_pd">                            
                <option value="是" ><?php echo "是"; ?></option>
                <option value="否" SELECTED=“SELECTED”><?php echo "否"; ?></option>
    </select></td>
</tr>
<tr>
    <td>报销状态确认：</td>
<td valign="top"><select name="tk_bx_qr">                            
                <option value="已报销" ><?php echo "已报销"; ?></option>
                <option value="未报销" SELECTED=“SELECTED”><?php echo "未报销"; ?></option>
    </select></td>
</tr>

<tr>
    <td>报销日期:</td>
    <td><input name="tk_bx_rq" type="text" id="datepicker6" ></td>
</tr>

<tr>
    <td>还款状态确认：</td>
<td valign="top"><select name="tk_hk_qr">                            
                <option value="已还款" ><?php echo "已还款"; ?></option>
                <option value="未还款" SELECTED=“SELECTED”><?php echo "未还款"; ?></option>
    </select></td>
</tr>
<tr>
    <td>还款日期:</td>
    <td><input name="tk_hk_rq" type="text" id="datepicker8" ></td>
</tr>
<tr>
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
<input type="hidden" name="huankuan_insert" value="form1" />
</form>
</body>
</html>
