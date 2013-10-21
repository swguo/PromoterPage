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
<title>聯絡人資料</title>
<?php
	

$num = $_GET[IDD];

		if(isset($num)){
	
			$colname_Recordset1 = "-1";
			
			mysql_select_db($database_CaseMeg, $CaseMeg);

			$query_RecordsetContact = "DELETE FROM promoter WHERE IDD = '".$num."'";
			
			$RecordsetContact = mysql_query($query_RecordsetContact, $CaseMeg) or die(mysql_error());
			
			
        	
			

					
					mysql_close($CaseMeg);
				//}
			
		}else{
			
			
		}

?>
</head>

<body onload="window.location='PromoterVeiw.php'">
</body>
</html>

