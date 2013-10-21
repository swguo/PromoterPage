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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投稿系統</title>
<?php
	
$n = $_GET[n];
		if($_POST["UpdataSubmit"]=="確認"){
	
					/*if($_POST["role"]==NULL){
						echo "<script>alert('身分欄位未填寫！');</script>" ;
					}elseif($_POST["Name"]==NULL){
						echo "<script>alert('姓名欄位未填寫！');</script>" ;
					}elseif($_POST["Ename"]==NULL){
						echo "<script>alert('英文姓名欄位未填寫！');</script>" ;
					}elseif($_POST["Gender"]==NULL){
						echo "<script>alert('性別欄位未填寫！');</script>" ;
					}elseif($_POST["affiliation"]==NULL){
						echo "<script>alert('所屬單位欄位未填寫！');</script>" ;
					}elseif($_POST["Email"]==NULL){
						echo "<script>alert('E-mail欄位未填寫！');</script>" ;
					}elseif($_POST["class"]==NULL){
						echo "<script>alert('類別欄位未填寫！');</script>" ;
					}elseif($_POST["position"]==NULL){
						echo "<script>alert('摘要欄位未填寫！');</script>" ;
					}elseif($_POST["Cellphone"]==NULL){
						echo "<script>alert('行動電話欄位未填寫！');</script>" ;
					}elseif($_POST["habit"]==NULL){
						echo "<script>alert('用餐習慣欄位未填寫！');</script>" ;
					}elseif($_POST["TWSIAM"]==NULL){
						echo "<script>alert('TWSIAM欄位未填寫！');</script>" ;
					}else{*/
					$colname_Recordset1 = "-1";
			
			mysql_select_db($database_CaseMeg, $CaseMeg);
			
			if(isset($n)){
			$query_RecordsetContact = "update promoter set IDD='$_POST[IDD]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set Name='$_POST[Name]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set Ename='$_POST[Ename]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set NickName='$_POST[NickName]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set SuperIntendent='$_POST[SuperIntendent]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set EsuperIntendent='$_POST[EsuperIntendent]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set WriteTitle='$_POST[WriteTitle]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set EwriteTitle='$_POST[EwriteTitle]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set RelationCustomer='$_POST[RelationCustomer]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set Country='$_POST[Country]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set Address='$_POST[Address]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set EAddress='$_POST[EAddress]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set Telephone='$_POST[Telephone]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set PostalCode='$_POST[PostalCode]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set UnityNumber='$_POST[UnityNumber]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set TrackAddress='$_POST[TrackAddress]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set ETrackAddress='$_POST[ETrackAddress]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set CreditState='$_POST[CreditState]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set Remember='$_POST[Remember]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			$query_RecordsetContact = "update promoter set Refer='$_POST[Refer]' where IDD='".$n."'";
				mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			
			}else{
				
			$query_RecordsetContact = 
			"insert into promoter (
			IDD,
			Name,
			Ename,
			NickName,
			SuperIntendent,
			EsuperIntendent,
			WriteTitle,
			EwriteTitle,
			RelationCustomer,
			Country,
			Address,
			EAddress,
			Telephone,
			PostalCode,
			UnityNumber,
			TrackAddress,
			ETrackAddress,
			CreditState,
			Remember,
			Refer
			) values (
				'$_POST[IDD]',
				'$_POST[Name]',
				'$_POST[Ename]',
				'$_POST[NickName]',
				'$_POST[SuperIntendent]',
				'$_POST[EsuperIntendent]',
				'$_POST[WriteTitle]',
				'$_POST[EwriteTitle]',
				'$_POST[RelationCustomer]',
				'$_POST[Country]',
				'$_POST[Address]',
				'$_POST[EAddress]',
				'$_POST[Telephone]',
				'$_POST[PostalCode]',
				'$_POST[UnityNumber]',
				'$_POST[TrackAddress]',
				'$_POST[ETrackAddress]',
				'$_POST[CreditState]',
				'$_POST[Remember]',
				'$_POST[Refer]');" ;
				$RecordsetSinup = mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			}
			
			
			
        	

					
					mysql_close($CaseMeg);
				//}
				
		}else{
			
			
		}
?>
</head>

<body onload="window.location='CustomerVeiw.php'">
</body>
</html>

