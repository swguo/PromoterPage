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
</head>
    <link type="text/css" rel="stylesheet" href="../../css/bootstrap.css">


<?php
		$num = $_GET['IDD'];
		//echo $num;	

			mysql_select_db($database_CaseMeg, $CaseMeg);
			$query_RecordsetContact = "select * from promoter where IDD ='".$num."'";
			

			$RecordsetAll = mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$row_RecordsetAll = mysql_fetch_assoc($RecordsetAll);
			$totalRows_RecordsetAll = mysql_num_rows($RecordsetAll);

			$sqlc = "select count(*) from promoter";// 計算資料表 nwsuppliers 總筆數
			$rsc = mysql_query($sqlc, $CaseMeg) or die(mysql_error());
		 	list($totalNum) = mysql_fetch_row($rsc);
		 //echo $totalNum;
		 
	

?>

<body>
<h4><a href="#" >資料首頁</a> > <a href="#" >系統檔案維護</a> > <a href="PromoterVeiw.php" >承辦人/處理人/代理人</a> > <?php  if($num){ ?> <a href="#" >資料編輯</a><?php }else{?> <a href="#" >新增資料</a><?php } ?>

    <form action="<?php if(isset($num)){?>PromoterUpload.php?n=<?php echo $num ?><?php }else{?>PromoterUpload.php<?php }?>" method="post"  style="width:auto" name="form2" enctype="multipart/form-data" >
    <table width="986" border="0">
    <tr>
      <td width="225"><?php echo date('Y年 m月 d日'); 
	  $weekarray=array("日","一","二","三","四","五","六");
	  
	  echo $date."  (星期".$weekarray[date("w")].")";?></td>
    </tr>
    </table>

    <table width="850" border="0">
      <?php
	  $number = "PR000000";
	  $totalNum = $totalNum+1;
	   
	  ?>
     <tr>
    	<td colspan="5"><div class="well form-search" ><strong>1. 輸入基本資料</strong></div></td>
        <td>&nbsp;</td>
    </tr>

        <td><p>*編號: </p></td>
        
        <td colspan="2"><input type="text" name="IDD" id="IDD"  
        value="<?php if(isset($num)){echo $row_RecordsetAll['IDD'];}else{echo addSlashes($number.$totalNum);} ?>"onKeyUp="check(1)" >
        </td>
         
      </tr>
      <tr>
         <td> <p>*名稱</p></td>
        <td><input type="text" name="Name" id="Name" value="<?php echo $row_RecordsetAll['Name']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
         <td>*暱稱 : </td>
        <td colspan="2"><input type="text" name="NickName" id="NickName"  value="<?php echo $row_RecordsetAll['NickName']; ?>" onKeyUp="check(1)" ></td>
      </tr>
       <tr>
         <td>*部門 </td>
        <td colspan="2"><input type="text" name="Department" id="Department" value="<?php echo $row_RecordsetAll['Department']; ?>" onKeyUp="check(1)"></td>
      </tr>
       <tr>
         <td>*職稱: </td>
               
        <td colspan="2"><input type="text" name="Investiture" id="Investiture" value="<?php echo $row_RecordsetAll['Investiture']; ?>" onKeyUp="check(1)"></td>
      </tr>

      <tr>
     <td>*生日: </td>
    <td colspan="2"><input type="text" name="BirthDay" id="BirthDay" placeholder="1999-01-01" value="<?php echo $row_RecordsetAll['BirthDay']; ?>" onKeyUp="check(1)" /></td>
  	</tr>
          <tr>
        <td colspan="5"><div class="well form-search" ><strong>2.輸入身分證字號</strong></div></td>
        <td>&nbsp;</td>
		</tr>
      <tr>
         <td>*身分證字號: </td>
        <td colspan="2"><input type="text" name="IndentityCardID" id="IndentityCardID" placeholder="B123456789" value="<?php echo $row_RecordsetAll['IndentityCardID']; ?>" onKeyUp="check(1)"></td>
      </tr>  
      <tr>
        <td colspan="5"><div class="well form-search" ><strong>3.輸入聯絡資料</strong></div></td>
        <td>&nbsp;</td>
      </tr>

       <tr>
         <td>*電話: </td>
         <td colspan="2"><input type="text" name="Telephone" id="Telephone" placeholder="(04)12345678" value="<?php echo $row_RecordsetAll['Telephone']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
         <td>*分機: </td>
         <td colspan="2"><input type="text" name="Extension" id="Extension" value="<?php echo $row_RecordsetAll['Extension']; ?>" onKeyUp="check(1)" /></td>
      </tr>
       <tr>
         <td>*傳真: </td>
         <td colspan="2"><input type="text" name="Fax" id="Fax" value="<?php echo $row_RecordsetAll['Fax']; ?>" onKeyUp="check(1)" /></td>
      </tr>
       <tr>
         <td>*手機: </td>
         <td colspan="2"><input type="text" name="Mobilephone" id="Mobilephone" value="<?php echo $row_RecordsetAll['Mobilephone']; ?>" onKeyUp="check(1)" /></td>
      </tr>
       <tr>
         <td>*地址: </td>
         <td colspan="2"><input type="text" name="Address" id="Address" placeholder="abc@hient.net" value="<?php echo $row_RecordsetAll['Address']; ?>" onKeyUp="check(1)" /></td>
      </tr>
       <tr>
         <td>*電子郵件: </td>
         <td colspan="2"><input type="text" name="E_Mail" id="E_Mail" value="<?php echo $row_RecordsetAll['E_Mail']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
        <td>*職務代理人</td>
        <td colspan="2"><label type="text" name="" id="" maxlength="200"><?php  ?></label></td>
      </tr>
       <br />
      <tr>
         <td></td>
        <td colspan="2"><input type="submit" name="UpdataSubmit" id="UpdataSubmit"  value="確認"></td>
      </tr>
    </table>
  
    </form>
    </h4>
</div>
    <p>

</body>
</html>
