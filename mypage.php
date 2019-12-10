<meta charset="UTF-8">
<?PHP include ("top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' align='center' valign='top'>

<?PHP
 
$con = mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb", $con);
$result = mysql_query("select * from member where uid='$UserID'", $con);
	
$uid = mysql_result($result, 0, "uid");
$uname = mysql_result($result, 0, "uname");
$email = mysql_result($result, 0, "email");
$zip = mysql_result($result, 0, "zipcode");
$addr1 = mysql_result($result, 0, "addr1");
$addr2 = mysql_result($result, 0, "addr2");
$mphone = mysql_result($result, 0, "mphone");



echo("
<HTML html>
<head>
<link href='css/common.css' rel='stylesheet'>
<link href='css/rest.css' rel='stylesheet'>
</head>
<body>
	<div class='content_tit_area clfix first_child no_line'>
		<h2 class='content_tit'>마이페이지</h2>	
	</div>
	<div class='wrap_tbl_write tb_write'>
	<table>
		<caption>
		마이페이지_회원정보 폼 : 아이디, 이름, 휴대전화, 이메일, 주소
		</caption>
		<colgroup>
			<col style='width : 19%;' />
			<col style='width : 81%;' />
		</colgroup>
		<tbody>
			<tr>
				<th scope='row'>아이디</th>
				<td class='ipt_join'>	");
					echo ($uid);	
echo("
				</td>
			</tr>
			<tr>
				<th scope='row'>이름</th>
				<td class='ipt_join'>	");
					echo ($uname);	
echo("
				</td>
			</tr>
			<tr>
				<th scope='row'>휴대전화</th>
				<td class='ipt_join'>	");
					echo ($mphone);	
echo("
				</td>
			</tr>
			<tr>
				<th scope='row'>이메일</th>
				<td class='ipt_join'>	");
					echo ($email);	
echo("
				</td>
			</tr>
			<tr>
				<th scope='row'>주소</th>
				<td class='ipt_join'>	");
					echo ('(' . $zip . ') ' . $addr1 . ' ' . $addr2);	
echo("
				</td>
			</tr>
		</tbody>
	</table>
	<div class='btn_area right'>
		<a href='umodify.php'><input type='button' class='btns board gray _article-post' value='정보수정'><em class='ico_regi'></em></a>
	</div>
</div>
	</br></br>
");
/*
$result = mysql_query("select * from receivers where id='$UserID' order by buydate desc", $con);
$total = mysql_num_rows($result);

echo ("
	<div class='content_tit_area clfix first_child no_line'>
		<h2 class='content_tit2'>다이어리 신청 내역</h2>	
	</div>
	<div class='wrap_tbl tb_info'>
		<table border=0>
			<tr><td>* <font color=red size=2>주문 물품이 배송 이전 단계이면 온라인으로 주문/취소가 가능합니다.</font><br>
					* <font size=2>배송중이거나 구매 완료된 제품에 대한 반품 및 환불 요청은 당사 고객센터(전화: 061-222-2222)로 문의바랍니다.</font></td></tr>
		</table>
		<table>
			<caption>다이어리 신청 내역 : 주문일자[주문번호], 주문내역, 금액, 주문상태
			</caption>
			<colgroup>
				<col style = 'width : 20%;' />
				<col style = 'width : 60%;' />
				<col style = 'width : 13%;' />
				<col style = 'width : 7%;' />
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
		$session = mysql_result($result, $counter, "session");
		$buydate = mysql_result($result, $counter, "buydate");
		$ordernum = mysql_result($result, $counter, "ordernum");
		$status = mysql_result($result, $counter, "status");
		$oldstatus = $status;
	 
		switch ($status) {
		  case 1:
				$status = "주문신청";
				break;
		  case 2:
				$status = "주문접수";
				break;
		  case 3: 
				$status = "배송준비중";
				break;
		  case 4:
				$status = "배송중";
				break;
		  case 5:
				$status = "배송완료";
				break;
		  case 6:
				$status = "처리완료";
				break;
		}
	 
		// JSP 수정 내용: 주문 번호로 orderlist 검색함
		//$subresult = mysql_query("select * from orderlist where session='$session'", $con);
		$subresult = mysql_query("select * from orderlist where ordernum='$ordernum'", $con);

		$subtotal =  mysql_num_rows($subresult);

        $subcounter=0;
        $totalprice=0;

        while ($subcounter <   $subtotal) :
             $pcode = mysql_result($subresult, $subcounter, "pcode");
             $quantity = mysql_result($subresult, $subcounter, "quantity");
      
             $tmpresult = mysql_query("select * from product where code='$pcode'", $con);
             $pname = mysql_result($tmpresult, 0, "name");
			 $price = mysql_result($tmpresult, 0, "price");
       
             $subtotalprice = $quantity * $price;
             $totalprice = $totalprice + $subtotalprice;
             $subcounter++;
        endwhile;
	
		$items = $subtotal - 1;
	
        echo ("
			<tr>
				<th class='no' scope='col'><font size=2>$buydate<br>[$ordernum]</th>
				<th class='writer' scope='col'>$pname</th>
				<th scope='col'>$totalprice 원</th>
				<th align=center scope='col'>$status
		");
      
		if ($oldstatus < 4) echo ("<br><div class='btn_area right'>
										<a id='writing' class='btns board gray' href='ordercancel.php?ordernum=$ordernum'>주문취소</a>
									   </div>");

		echo ("</th></tr>");

		$counter++;
	endwhile;

} else {

	echo ("<tr><td class='none_contents' colspan=5>신청 내역이 없습니다.</td></tr>");

}
*/

echo ("</tbody></table><br><br></body></html>");

mysql_close($con);	

?>

</td></tr>
</table>
<?PHP include ("bottom.html");   ?>
