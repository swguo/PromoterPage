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
    
<style type="text/css">
body{
	font-family: "標楷體", "DFKai-sb", serif;
	
	
}
body div form table tr td {
	font-size: 16px;
	color: #333;
	line-height:30px;
	font-family: "微軟正黑體", "Microsoft JhengHei", "新細明體", "PMingLiU", "細明體", "MingLiU", "標楷體", "DFKai-sb", serif;
	
}
</style>

<?php
		$num = $_GET['IDD'];
		//echo $num;	

			mysql_select_db($database_CaseMeg, $CaseMeg);
			$query_RecordsetContact = "select * from promoter where IDD ='".$num."'";
			

			$RecordsetAll = mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$row_RecordsetAll = mysql_fetch_assoc($RecordsetAll);
			$totalRows_RecordsetAll = mysql_num_rows($RecordsetAll);
			
		
			$query_CountryCode = "select * from country";
			$CountryCodeAll = mysql_query($query_CountryCode, $CaseMeg) or die(mysql_error());

			$sqlc = "select count(*) from promoter";// 計算資料表 nwsuppliers 總筆數
			$rsc = mysql_query($sqlc, $CaseMeg) or die(mysql_error());
		 	list($totalNum) = mysql_fetch_row($rsc);
		 //echo $totalNum;
		 
$possible ="ABCDEFGHIJKLMNOPQRSTUVWXYZ"."_0123456789"."abcdefghijklmnopqrstuvwxyz";
		
	$str = ""; 
	while(strlen($str) < 3) {$str .= substr($possible, (rand() % strlen($possible)), 1);}
	
	
	$cfeIdname = $str.time(); 
	

?>

<body>
<h4><a href="#" >資料首頁</a> > <a href="#" >系統檔案維護</a> > <a href="PromoterVeiw.php" >承辦人/處理人/代理人</a> > <?php  if($num){ ?> <a href="#" >資料編輯</a><?php }else{?> <a href="#" >新增資料</a><?php } ?>
<div style="height:800px">
    <form action="<?php if(isset($num)){?>PromoterUpload.php?n=<?php echo $num ?><?php }else{?>PromoterUpload.php<?php }?>" method="post"  style="width:auto" name="form2" enctype="multipart/form-data" >
    <table width="986" border="0">
    <tr>
      <td width="225"><?php echo date('Y年 m月 d日'); 
	  $weekarray=array("日","一","二","三","四","五","六");
	  
	  echo $date."  (星期".$weekarray[date("w")].")";?></td>
      <td width="104"><input type="button" id="input2" <?php if(isset($num)){ }else{?> disabled="disabled"  <?php } ?>value="檢閱附表" onClick="window.open('../../AttachmentView.php?IDD=<?php echo $num ?>','上傳附件','width=400,height=300');"/></td>
      <td width="150"><input type="button" id="input4" <?php if(isset($num)){ }else{?> disabled="disabled"  <?php } ?>value="聯絡人" onClick="window.open('../../ContactPage/ContactEdit.php?IDD=<?php echo $num ?>','上傳附件','width=400,height=300');" /></td>
      <td width="217"><input type="button" id="input6" value="接洽日期" /></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="button" id="input3" value="客戶權限" /></td>
      <td><input type="button" id="input5" value="複製" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="5"> <p>1. 輸入基本資料</p></td>
        <td>&nbsp;</td>
        
    </tr>
    </table>
    <div id="main">
    <table width="850" border="0">
      <tr >
      <?php
	  $number = "CU000000";
	  $totalNum = $totalNum+1;
	   
	  ?>
        
      <tr>
        <td><p>*客戶編號: </p></td>
        <td colspan="2"><input type="text" name="IDD" id="IDD" 
        value="<?php if(isset($num)){echo $row_RecordsetAll['IDD'];}else{echo addSlashes($number.$totalNum);} ?>"onKeyUp="check(1)" >
        </td>
         
      </tr>
      <tr>
         <td> <p>*客戶名稱</p></td>
        <td><input type="text" name="Name" id="Name" value="<?php echo $row_RecordsetAll['Name']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
         <td>*客戶名稱(英): </td>
        <td colspan="2"><input type="text" name="Ename" id="Ename" value="<?php echo $row_RecordsetAll['Ename']; ?>" onKeyUp="check(1)">
        </td>
      </tr>
      <tr>
         <td>*暱稱 : </td>
        <td colspan="2"><input type="text" name="NickName" id="NickName"  value="<?php echo $row_RecordsetAll['NickName']; ?>" onKeyUp="check(1)" >
        </td>
      </tr>
       <tr>
         <td>*代表人: </td>
        <td colspan="2"><input type="text" name="SuperIntendent" id="SuperIntendent" value="<?php echo $row_RecordsetAll['SuperIntendent']; ?>" onKeyUp="check(1)"></td>
      </tr>
       <tr>
         <td>*代表人(英): </td>
               
        <td colspan="2"><input type="text" name="EsuperIntendent" id="EsuperIntendent" value="<?php echo $row_RecordsetAll['EsuperIntendent']; ?>" onKeyUp="check(1)">
       </td>
      
       		
       
      </tr>
      <tr>
     <td>*收據抬頭: </td>
    <td colspan="2"><input type="text" name="WriteTitle" id="WriteTitle" value="<?php echo $row_RecordsetAll['WriteTitle']; ?>" onKeyUp="check(1)" /></td>
  	</tr>
      <tr>
         <td>*收據抬頭(英): </td>
        <td colspan="2"><input type="text" name="EwriteTitle" id="EwriteTitle" value="<?php echo $row_RecordsetAll['EwriteTitle']; ?>" onKeyUp="check(1)"></td>
      </tr>  
       <tr>
         <td>*相關客戶: </td>
        <td colspan="2">
        
        <textarea rows"3" cols="15" name="RelationCustomer" id="RelationCustomer"> <?php echo $row_RecordsetAll['RelationCustomer']; ?> 
        
        </textarea>
        </td>
      </tr>
      <tr>
        <td><strong>2.輸入聯絡資料</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>*國家</td>
        <td>
        <script>
        function getopt(){
			
		document.form2.Country.value = document.form2.CountrySelect.value;
		}
        function compareopt(){
			
		return document.form2.Country.value;
		}
        
        </script>
          <input type="text" name="Country" id="Country" value="<?php echo $row_RecordsetAll['Country']; ?>"onKeyUp="check(1)" />
          
          <select name="CountrySelect" id="CountrySelect" size="1" onChange="getopt()">
            <?php
			while($row_CountryCode = mysql_fetch_assoc($CountryCodeAll))
			{
				echo "<option ".(($row_CountryCode['IDD'] == $row_RecordsetAll['Country'])?'selected="selected"':"")."". $row_CountryCode['CountryName']." value=".$row_CountryCode['IDD'].">".$row_CountryCode['CountryName']."</option>\n";
			}
			?>
          </select>
          TW(國籍輸入或下拉式資料選擇)</td>
      </tr>
      <tr>
        <td>*地址</td>
        <td colspan="2"><input type="text" name="Address" id="Address" value="<?php echo $row_RecordsetAll['Address']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
         <td>*地址(英)</td>
        <td colspan="2"><input type="text" name="EAddress" id="EAddress" value="<?php echo $row_RecordsetAll['EAddress']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
        <td>*電話</td>
        <td colspan="2"><input type="text" name="Telephone" id="Telephone" value="<?php echo $row_RecordsetAll['Telephone']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
        <td>*郵遞區號</td>
        <td colspan="2"><input type="text" name="PostalCode" id="PostalCode" value="<?php echo $row_RecordsetAll['PostalCode']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
        <td>*統一編號</td>
        <td colspan="2"><input type="text" name="UnityNumber" id="UnityNumber" value="<?php echo $row_RecordsetAll['UnityNumber']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
        <td>*發票地址</td>
        <td colspan="2"><input type="text" name="TrackAddress" id="TrackAddress" value="<?php echo $row_RecordsetAll['TrackAddress']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
        <td>*發票地址(英)</td>
        <td colspan="2"><input type="text" name="ETrackAddress" id="ETrackAddress" value="<?php echo $row_RecordsetAll['ETrackAddress']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
        <td>*信用狀態</td>
        <td colspan="2"><input type="text" name="CreditState" id="CreditState" value="<?php echo $row_RecordsetAll['CreditState']; ?>" onKeyUp="check(1)" /></td>
      </tr>
      <tr>
        <td>*備註</td>
        <td colspan="2">
        <textarea  rows"3" cols="15" name="Remember" id="Remember" ><?php echo $row_RecordsetAll['Remember']; ?>
        </textarea>
        
        </td>
      </tr>
      <tr>
        <td>*接洽中</td>
        <?php $default = $row_RecordsetAll['Refer'];?>
        <td colspan="2"><select name="Refer" id="Refer" size="1"   onChange="check(1)">
          <option  selected="<?php if($default == 'Y'){echo 'selected';}?>" value="Y" >Y</option>
          <option selected="<?php if($default == 'N'){echo 'selected';}?>" value="N" >N</option>
        </select>
        (Y/N 預設值為N)</td>
      </tr>
       <br />
      <tr>
         <td></td>
        <td colspan="2"><input type="submit" name="UpdataSubmit" id="UpdataSubmit"  value="確認"></td>
      </tr>
    </table>
    </div>
    </form>
    </h4>
</div>
    <p>

</body>
</html>
