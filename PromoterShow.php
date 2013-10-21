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
	//	echo $num;	

			mysql_select_db($database_CaseMeg, $CaseMeg);
			$query_RecordsetContact = "select * from promoter where IDD ='".$num."'";
			

			$RecordsetAll = mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$row_RecordsetAll = mysql_fetch_assoc($RecordsetAll);
			$totalRows_RecordsetAll = mysql_num_rows($RecordsetAll);
			
			
			$query_CountryCode = "select * from country";
			$CountryCodeAll = mysql_query($query_CountryCode, $CaseMeg) or die(mysql_error());
	

?>

<body>
    <form action="PromoterVeiw.php" method="post"  style="width:auto" name="form2" enctype="multipart/form-data" >
    <table width="986" border="0">
    <tr>
      <td width="225"><?php echo date('Y年 m月 d日'); 
	  $weekarray=array("日","一","二","三","四","五","六");
	  
	  echo $date."  (星期".$weekarray[date("w")].")";?></td>
    <tr>
    	<td colspan="5"> <p>1. 輸入基本資料</p></td>
        <td>&nbsp;</td>
        
    </tr>
    </table>
    <div id="main">
    <table width="850" border="0">
      <tr >
        <td valign="middle" ><p>*編　　號: </p></td>
        <td colspan="2"><label name="ID" id="ID" 
         maxlength="200"><?php if(isset($num)){echo $row_RecordsetAll['ID'];}else{echo $cfeIdname;} ?></label></td>
      </tr>
      <tr>
        <td><p>*客戶編號: </p></td>
        <td colspan="2"><label type="text" name="IDD" id="IDD" 
        maxlength="200"><?php if(isset($num)){echo $row_RecordsetAll['IDD'];}else{echo $cfeIdname;} ?></label> 
        </td>
         
      </tr>
      <tr>
         <td> <p>*客戶名稱</p></td>
        <td><label type="text" name="Name" id="Name" maxlength="200"><?php echo $row_RecordsetAll['Name']; ?></label></td>
      </tr>
      <tr>
         <td>*客戶名稱(英): </td>
        <td colspan="2"><label type="text" name="Ename" id="Ename" maxlength="200"><?php echo $row_RecordsetAll['Ename']; ?></label>
        </td>
      </tr>
      <tr>
         <td>*暱稱 : </td>
        <td colspan="2"><label type="text" name="NickName" id="NickName"  maxlength="200"><?php echo $row_RecordsetAll['NickName']; ?></label> 
        </td>
      </tr>
       <tr>
         <td>*代表人: </td>
        <td colspan="2"><label type="text" name="SuperIntendent" id="SuperIntendent" maxlength="200"><?php echo $row_RecordsetAll['SuperIntendent']; ?></label></td>
      </tr>
       <tr>
         <td>*代表人(英): </td>
               
        <td colspan="2"><label type="text" name="EsuperIntendent" id="EsuperIntendent" maxlength="200"><?php echo $row_RecordsetAll['EsuperIntendent']; ?></label>
       </td>
      
       		
       
      </tr>
      <tr>
     <td>*收據抬頭: </td>
    <td colspan="2"><label type="text" name="WriteTitle" id="WriteTitle" maxlength="200"><?php echo $row_RecordsetAll['WriteTitle']; ?></label></td>
  	</tr>
      <tr>
         <td>*收據抬頭(英): </td>
        <td colspan="2"><label type="text" name="EwriteTitle" id="EwriteTitle" maxlength="200"><?php echo $row_RecordsetAll['EwriteTitle']; ?></label></td>
      </tr>  
       <tr>
         <td>*相關客戶: </td>
        <td colspan="2">
        
        <textarea rows"3" cols="15" disabled="disabled" name="RelationPromoter" id="RelationPromoter"> <?php echo $row_RecordsetAll['RelationPromoter']; ?> 
        
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
          <label type="text" name="Country" id="Country" maxlength="200"><?php echo $row_RecordsetAll['Country']; ?></label>
          
          <select name="CountrySelect" id="CountrySelect" size="1" disabled="disabled" onChange="getopt()">
            <?php
			while($row_CountryCode = mysql_fetch_assoc($CountryCodeAll))
			{
				echo "<option ".(($row_CountryCode['CountryName'] == $row_RecordsetAll['Country'])?'selected="selected"':"")."". $row_CountryCode['CountryName']." vaule=".$row_CountryCode['IDD'].">".$row_CountryCode['CountryName']."</option>\n";
			}
			?>
          </select>
          TW(國籍輸入或下拉式資料選擇)</td>
      </tr>
      <tr>
        <td>*地址</td>
        <td colspan="2"><label type="text" name="Address" id="Address" maxlength="200" ><?php echo $row_RecordsetAll['Address']; ?></label></td>
      </tr>
      <tr>
         <td>*地址(英)</td>
        <td colspan="2"><label type="text" name="EAddress" id="EAddress" maxlength="200"><?php echo $row_RecordsetAll['EAddress']; ?></label></td>
      </tr>
      <tr>
        <td>*電話</td>
        <td colspan="2"><label type="text" name="Telephone" id="Telephone" maxlength="200"><?php echo $row_RecordsetAll['Telephone']; ?></label></td>
      </tr>
      <tr>
        <td>*郵遞區號</td>
        <td colspan="2"><label type="text" name="PostalCode" id="PostalCode" maxlength="200"><?php echo $row_RecordsetAll['PostalCode']; ?></label></td>
      </tr>
      <tr>
        <td>*統一編號</td>
        <td colspan="2"><label type="text" name="UnityNumber" id="UnityNumber" maxlength="200"><?php echo $row_RecordsetAll['UnityNumber']; ?></label></td>
      </tr>
      <tr>
        <td>*發票地址</td>
        <td colspan="2"><label type="text" name="TrackAddress" id="TrackAddress" maxlength="200"><?php echo $row_RecordsetAll['TrackAddress']; ?></label></td>
      </tr>
      <tr>
        <td>*發票地址(英)</td>
        <td colspan="2"><label type="text" name="ETrackAddress" id="ETrackAddress" maxlength="200"><?php echo $row_RecordsetAll['ETrackAddress']; ?></label></td>
      </tr>
      <tr>
        <td>*信用狀態</td>
        <td colspan="2"><label type="text" name="CreditState" id="CreditState" maxlength="200"><?php echo $row_RecordsetAll['CreditState']; ?></label></td>
      </tr>
      <tr>
        <td>*備註</td>
        <td colspan="2">
        <textarea  rows"3" cols="15" disabled="disabled" name="Remember" id="Remember" ><?php echo $row_RecordsetAll['Remember']; ?>
        </textarea>
        
        </td>
      </tr>
      <tr>
        <td>*接洽中</td>
        <?php $default = $row_RecordsetAll['Refer'];?>
        <td colspan="2"><select name="Refer" id="Refer" size="1"  disabled="disabled" onChange="check(1)">
          <option  select="<?php if($default == 'Y'){echo 'selected';}?>" value="Y" >Y</option>
          <option select="<?php if($default == 'N'){echo 'selected';}?>" value="N" >N</option>
        </select>
        (Y/N 預設值為N)</td>
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
