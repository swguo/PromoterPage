<?php require_once('../../Connections/CaseMeg.php'); ?>
<?php
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

?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投稿系統</title>
<link type="text/css" rel="stylesheet" href="../../css/bootstrap.css">
</head>


<?php
		$num = $_GET['IDD'];
	//	echo $num;	

			mysql_select_db($database_CaseMeg, $CaseMeg);
			$query_RecordsetContact = "select * from promoter where IDD ='".$num."'";
			$RecordsetAll = mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$row_RecordsetAll = mysql_fetch_assoc($RecordsetAll);
			$totalRows_RecordsetAll = mysql_num_rows($RecordsetAll);
?>

<body>
<h4><a href="#" >資料首頁</a> > <a href="#" >系統檔案維護</a> > <a href="PromoterVeiw.php" >承辦人/處理人/代理人</a> > <a href="#" >瀏覽資料</a></h4>
<hr />
    <form action="PromoterVeiw.php" method="post"  style="width:auto" name="form2" enctype="multipart/form-data" >
    <div id="main">
    <table width="850" border="0">
    	<td colspan="5"><div class="well form-search" ><strong>1. 基本資料</strong></div></p></td>
        <td>&nbsp;</td>
      <tr>
        <td>*編號:</td>
        <td colspan="2"><label type="text" name="IDD" id="IDD" 
        maxlength="200"><?php if(isset($num)){echo $row_RecordsetAll['IDD'];}else{echo $cfeIdname;} ?></label> 
        </td>
         
      </tr>
      <tr>
         <td>*姓名</td>
        <td><label type="text" name="Name" id="Name" maxlength="200"><?php echo $row_RecordsetAll['Name']; ?></label></td>
      </tr>
      <tr>
         <td>*部門: </td>
        <td colspan="2"><label type="text" name="Department" id="Department" maxlength="200"><?php echo $row_RecordsetAll['Department']; ?></label>
        </td>
      </tr>
      <tr>
         <td>*職稱 : </td>
        <td colspan="2"><label type="text" name="Investiture" id="Investiture"  maxlength="200"><?php echo $row_RecordsetAll['Investiture']; ?></label> 
        </td>
      </tr>
       <tr>
         <td>*生日: </td>
        <td colspan="2"><label type="text" name="BirthDay" id="BirthDay" maxlength="200"><?php echo $row_RecordsetAll['BirthDay']; ?></label></td>
      </tr>
       <tr>
         <td>*身分證字號: </td>
        <td colspan="2"><label type="text" name="IndentityCardID" id="IndentityCardID" maxlength="200"><?php echo $row_RecordsetAll['IndentityCardID']; ?></label>
       </td>
      </tr>
      <tr>
     <td>*電話: </td>
    <td colspan="2"><label type="text" name="Telephone" id="Telephone" maxlength="200"><?php echo $row_RecordsetAll['Telephone']; ?></label></td>
  	</tr>
      <tr>
         <td>*分機: </td>
        <td colspan="2"><label type="text" name="Extension" id="Extension" maxlength="200"><?php echo $row_RecordsetAll['Extension']; ?></label></td>
      </tr>  
       <tr>
         <td>*傳真: </td>
        <td colspan="2"><label type="text" name="Fax" id="Fax" maxlength="200" ><?php echo $row_RecordsetAll['Fax']; ?></label></td>
      </tr>
       <tr>
         <td>手機: </td>
        <td colspan="2"><label type="text" name="Mobilephone" id="Mobilephone" maxlength="200" ><?php echo $row_RecordsetAll['Mobilephone']; ?></label></td>
      </tr>
      <tr>
        <td>*地址</td>
        <td colspan="2"><label type="text" name="Address" id="Address" maxlength="200" ><?php echo $row_RecordsetAll['Address']; ?></label></td>
      </tr>
      <tr>
        <td>*電子郵件</td>
        <td colspan="2"><label type="text" name="E_Mail" id="E_Mail" maxlength="200"><?php echo $row_RecordsetAll['E_Mail']; ?></label></td>
      </tr>
      <tr>
        <td>*職務代理人</td>
        <td colspan="2"><label type="text" name="" id="" maxlength="200"><?php  ?></label></td>
      </tr>
       <br />
      <tr>
         <td></td>
        <td colspan="2"><input type="submit" name="UpSubmit" id="UpSubmit"  value="上一頁"></td>
      </tr>
    </table>
    </div>
    </form>
</div>
</body>
</html>
