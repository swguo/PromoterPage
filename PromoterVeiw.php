<?php 

	//require_once('../../Connections/CaseMeg.php'); 

    // 資料庫連結
    require_once("../../Connections/connect.php");  
    $link=create_connection();  


?>

<?php
/*$sql = " SELECT promoter.IDD,Name ,NickName,Address,country.CountryName,Telephone from promoter 
			LEFT JOIN country 
			ON country.IDD = promoter.Country 
			WHERE  Name='".$_POST['search']."'";
*/
if($_POST["search"]){
	
            //取出資料欄位CompanyName , ContactName , ContactTitle
			
            $sql = " SELECT IDD,Name ,NickName,Address,Country,Telephone from promoter 			
			WHERE  Name='".$_POST['search']."'";
			 $sqlc = "select count(*) from promoter where Name='".$_POST['search']."'"; // 計算資料表 nwsuppliers 總筆數
	
}else{
            $sql = " SELECT IDD,Name ,NickName,Address,Country,Telephone from promoter ";
			
			$sqlc = "select count(*) from promoter";// 計算資料表 nwsuppliers 總筆數
}

            $rsq = execute_sql("casemeg", $sql, $link);
			 //計算總筆數
    		$rsc = execute_sql("casemeg", $sqlc, $link);
     		 list($totalNum) = mysql_fetch_row($rsc);
		//echo $totalNum;
		
		
?>
<?php
    // 判斷Page傳來指定的頁數，以決定本頁顯示的資料
    if (isset($_POST['page']))
        $nowPage = $_POST['page'];
    
    if (!isset($nowPage)) 
        $nowPage = 1;

    // 判斷pern傳來的值，以決定顯示的資料筆數
    if (isset($_POST['pern']))
        $perNum = $_POST['pern'];
    
    if (!isset($perNum)) 
        $perNum = 5;  // 每頁顯示 5 筆（每次取5筆資料）
  
   
  
    //若資料庫中無任何資料
    if($totalNum == 0)
    {
        echo "目前沒有資料";
        exit;
    }
  
    //開始起始指標
    $startId = ($nowPage - 1)* $perNum;
  
    //該頁實際顯示資料筆數目
    if(($startId+$perNum)>$totalNum) {
        $realPerNum = $totalNum - $startId;
    }else{
        $realPerNum = $perNum;
    }
  
    //總頁數
    if($totalNum % $perNum == 0){
        $totalPage = $totalNum / $perNum;
    }else{
        $totalPage = intval($totalNum / $perNum)+1;
    }
  
    //第一頁
    $firstPage=1;
  
    //最後一頁
    $lastPage = $totalPage;  
  
    //上一頁
    if($nowPage > 1){
        $forwardPage = $nowPage - 1;
        $firstPgLink = "<li><a href=\"javascript:chg(1, $perNum);\">第一頁</a></li>";
        $forPgLink = "<li><a href=\"javascript:chg($forwardPage, $perNum);\">《  </a></li>";
    }else{
        $forwardPage = false;
        $firstPgLink = "";
        $forPgLink = "";
    } 

    //下一頁
    if($nowPage < $totalPage){
        $nextPage = $nowPage + 1;
        $lastPgLink = "<li><a href=\"javascript:chg($lastPage, $perNum);\">最後一頁</a></li>";
        $nextPgLink = "<li><a href=\"javascript:chg($nextPage, $perNum);\"> 》 </a></li>";
    }else{  
        $nextPage =  false;
        $nextPgLink = "";
        $lastPgLink = "";
    }

?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>客戶資料檢視</title>
</head>
    <link type="text/css" rel="stylesheet" href="../../css/bootstrap.css">
        <script language="JavaScript">
            function chg(np, n){
                document.sd.page.value=np;
                document.sd.pern.value=n;
                document.sd.submit();
            }
        </script>
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


<body>
<h4><a href="#" >資料首頁</a> > <a href="#" >系統檔案維護</a> > <a href="PromoterVeiw.php" >客戶資料</a> > <a href="#" >檢視資料</a></h4>
<hr />
<form action="PromoterVeiw.php" method="post" >
<input type="text" name="search" id="search" value=""  />
<input type="submit"  value="搜尋"  />


</form>

<input type="button"  value="新增"  onclick="location.href='PromoterEdit.php'"/>
    <form action="PromoterVeiw.php" method="post" name="sd">
        <input type="hidden" name="page"> 
        <input type="hidden" name="pern">   
    </form>
<h4>
    <table class="table table-striped table-bordered table-condensed" align='center' >
        <tr align='center' > 
        <td nowrap width='10'>客戶名稱</td>
        <td nowrap width='10'></td>
        <td nowrap width='10'></td>
        <td nowrap width='10'>暱稱</td>
        <td nowrap width='10'>地址</td>
		<td nowrap width='10'>國家</td>
		<td nowrap width='10'>電話</td>
        </tr>
        <?php

            //顯示資料
            for($i=$startId;$i<$startId+$realPerNum;$i++){
                mysql_data_seek($rsq,$i);
               list( $CusIDD , $CusName, $CusNickName,$CusAddress,$CusCounty,$CusTelephone ) = mysql_fetch_row($rsq);
        ?>
        <tr align='center'>
            <td nowrap ><a href="PromoterShow.php?IDD=<?php echo $CusIDD ;?>"><?php echo $CusName;?></a></td>
            <td nowrap ><input type="button" name="Edit" id="Edit" value="編輯" onClick="if(confirm('您確定編輯?'))window.location.href='PromoterEdit.php?IDD=<?php echo $CusIDD; ?>';else return false"/> </td>
        	<td nowrap ><input type="button" name="Delete" id="Delete" value="刪除" onClick="if(confirm('確定要刪除?'))window.location.href='PromoterDelete.php?IDD=<?php echo $CusIDD; ?>';else return false" /></td>
            <td nowrap ><?php echo $CusNickName;?></td>
            <td nowrap ><?php echo $CusAddress;?></td>    
            <td nowrap ><?php echo $CusCounty;?></td>    
            <td nowrap ><?php echo $CusTelephone;?></td>    
        </tr>
        <?php } ?>
    </table>
  
    <form>
        <div class="pagination pagination-centered">
        <ul>
            <?php echo $firstPgLink; //第一頁 ?> 
            <?php echo $forPgLink; //上一頁 ?>
            <?php 
                $limitPage = 2; //顯示該頁+-頁碼數
                $minPage = $nowPage - $limitPage < 1 ? 1 : $nowPage - $limitPage; //顯示最小頁碼
                $maxPage = $nowPage + $limitPage > $totalPage ? $totalPage : $nowPage + $limitPage; //顯示最大頁碼

                //顯示換頁頁碼
                for($x = $minPage ; $x <= $maxPage ; $x++)
                {
                    $li = "<li>";
                    if ($x == $nowPage)
                        $li = "<li class=\"active\">";
                    $PgLink = $li . "<a href=\"javascript:chg($x, $perNum);\">$x</a></li>";
                    echo $PgLink;
                }
            ?>
   
            <?php echo $nextPgLink; //下一頁 ?>
            <?php echo $lastPgLink; //最後一頁 ?>
            <li><a>共<?php echo $totalPage; //總頁數 ?>頁</a></li>
            <li><a>（<?php echo $totalNum; //總資料筆數 ?> 筆資料）</a></li>
            <li><a style="border-style: none;">
            <?php 
                if($totalPage == 1){ 
                    echo "";
                }
                //快速換頁下拉式選單
                else{     
                    $pageFast="<select name=\"pageFast\" onChange=\"chg(this.form.pageFast.value, this.form.perNum.value);\" style=\"width: 90px;\" >";
                    for($i=1;$i<=$totalPage;$i++){
                        $pageFast.="<option value=\"".$i."\"";
                    if($i==$nowPage) $pageFast.=" selected";
                    $pageFast.=">第".$i."頁</option>";        
                }             
                $pageFast.="</select>";
                echo $pageFast;
                }
            ?>       
                </a>
            </li>
            <li><a style="border-style: none;">

            <?php
     
                if ($totalPage == 1)
                {
                    $pagePerNum = "<select name=\"perNum\" onChange=\"chg(1, this.form.perNum.value);\" style=\"width: 110px;\" >";
                }
                else
                {
                    $pagePerNum = "<select name=\"perNum\" onChange=\"chg(this.form.pageFast.value, this.form.perNum.value);\" style=\"width: 110px;\" >";
                }
                $pnList = array(5, 10, 20, 50, 100, 200); //每頁所顯示的資料筆數
                $pnCount = count($pnList);
    
                //下拉式顯示資料筆數
                for ($i = 0; $i < $pnCount; $i ++)
                {
                    $pagePerNum .= "<option value=\"" . $pnList[$i] . "\"";
                    if($pnList[$i] == $perNum) $pagePerNum .= " selected";
                    $pagePerNum .= ">顯示" . $pnList[$i] . "筆</option>";    
                }
     
                $pagePerNum .= "</select>";
     
                echo $pagePerNum;
            ?>      
                </a>
            </li>
        </ul>
        </div>    
    </form>  
 
</h4>
</body>
</html>
<?php
?>
