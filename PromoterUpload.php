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
			
			
			if(isset($n)){
				echo "updata";
					$database = "promoter";
					Update($database,'IDD',$_POST['IDD'],$n);
					Update($database,'Name',$_POST['Name'],$n);
					Update($database,'NickName',$_POST['NickName'],$n);
					Update($database,'Department',$_POST['Department'],$n);
					Update($database,'Investiture',$_POST['Investiture'],$n);
					Update($database,'BirthDay',$_POST['BirthDay'],$n);
					Update($database,'IndentityCardID',$_POST['IndentityCardID'],$n);
					Update($database,'Telephone',$_POST['Telephone'],$n);
					Update($database,'Extension',$_POST['Extension'],$n);
					Update($database,'Fax',$_POST['Fax'],$n);
					Update($database,'Mobilephone',$_POST['Mobilephone'],$n);
					Update($database,'Address',$_POST['Address'],$n);
					Update($database,'E_Mail',$_POST['E_Mail'],$n);
					
					

			
			}else{
				echo "insert";
			$query_RecordsetContact = 
			"insert into promoter (
			IDD,
			Name,
			NickName,
			Department,
			Investiture,
			BirthDay,
			IndentityCardID,
			Telephone,
			Extension,
			Fax,
			Mobilephone,			
			Address
			) values (
				'$_POST[IDD]',
				'$_POST[Name]',
				'$_POST[NickName]',
				'$_POST[Department]',
				'$_POST[Investiture]',
				'$_POST[BirthDay]',
				'$_POST[IndentityCardID]',
				'$_POST[Telephone]',
				'$_POST[Extension]',
				'$_POST[Fax]',
				'$_POST[Mobilephone]',			
				'$_POST[Address]');";
				$RecordsetSinup = mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			}
			
			
			
        	

					
					mysql_close($CaseMeg);
				//}
				
		}else{
			
			
		}
?>
</head>

<body onload="window.location='PromoterVeiw.php'">
</body>
</html>

