<meta charset="UTF-8">
<? include ("top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' valign='top'>

<?PHP

if ($UserID != 'admin') {
	echo ("<script>
		window.alert('관리자만 접근 가능한 기능입니다')
		history.go(-1)
		</script>");
    exit;
} 

echo ("
<HTML html>
<head>
<link href='css/common.css' rel='stylesheet'>
<link href='css/rest.css' rel='stylesheet'>
</head>
<body>
	<div class='content_tit_area clfix first_child no_line'>
		<h2 class='content_tit'>다이어리 신청 내역</h2>	
	</div>");
	  	  
$con = mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb", $con);
	
$result = mysql_query("select * from receivers order by buydate desc", $con);
$total = mysql_num_rows($result);

echo ("
	<div class='wrap_tbl tb_info'>
	
	<table>
		<caption>다이어리 신청 내역 : 주문일자[주문번호], 주문내역, 금액, 주문상태변경
		</caption>
		<colgroup>
			<col style = 'width : 20%;' />
			<col style = 'width : 50%;' />
			<col style = 'width : 18%;' />
			<col style = 'width : 12%;' />
		</colgroup>
		<thead>
			<tr>
				<th scope='col'>신청일자[신청번호]</th>
				<th class='writer' scope='col'>신청내역</th>
				<th scope='col'>금액</th>
				<th scope='col'>주문상태</th>
			</tr>
		</thead>
		<tbody>
");	

if ($total > 0) {	

	$counter = 0;
		
	while($counter < $total) :

		$session =  mysql_result($result, $counter, "session");
		$buydate = mysql_result($result, $counter, "buydate");
		$ordernum = mysql_result($result, $counter, "ordernum");
		$status = mysql_result($result, $counter, "status");
			 
		switch ($status) {
			case 1:
				$tstatus = "주문신청";
				break;
			case 2:
				$tstatus = "주문접수";
				break;
			case 3: 
				$tstatus = "배송준비중";
				break;
			case 4:
				$tstatus = "배송중";
				break;
			case 5:
				$tstatus = "배송완료";
				break;
			case 6:
				$tstatus = "구매완료";
				break;
		}
		  
		$subresult = mysql_query("select * from orderlist where ordernum='$ordernum'",   $con);
		$subtotal = mysql_num_rows($subresult);

		$subcounter=0;
		$totalprice=0;

		while ($subcounter < $subtotal) :
			$pcode = mysql_result($subresult, $subcounter, "pcode");
			$quantity = mysql_result($subresult, $subcounter, "quantity");
			$tmpresult = mysql_query("select * from product where code='$pcode'", $con);
			$pname = mysql_result($tmpresult, 0, "name");
			$price = mysql_result($tmpresult, 0, "price2");
		   
			$subtotalprice = $quantity * $price;
			$totalprice = $totalprice + $subtotalprice;
			$subcounter++;
		endwhile;
		
		$items = $subtotal - 1;
		
		echo ("<tr>
				<th class='no' scope='col'><font size=2>$buydate<br>[$ordernum]</a></th>
				<th class='writer' scope='col'>$pname</th>
				<th scope='col'>$totalprice 원</th>
				<th align=center scope='col'>
		");
		if ($status < 6) { 
			echo ("<a href=changestatus.php?ordernum=$ordernum>$tstatus</a></th></tr>");
		} else {
		  echo ("<b>$tstatus</b></th></tr>");
		}
		
		$counter++;

	endwhile;

} else {
       echo ("<tr><td class='none_contents' colspan=5>신청 내역이 존재하지 않습니다</td></tr>");
}

echo ("</tbody></table>
	   <div class='btn_area right'>
		<a id='writing' class='btns board gray' href='admin.php'>
		뒤로가기</a>
	   </div><br><br></body></html>");

mysql_close($con);

?>

</td></tr>
</table>
<?PHP include ("bottom.html");   ?>
