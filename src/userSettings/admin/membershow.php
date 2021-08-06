<meta charset="UTF-8">
<? include ("../../main/top.html"); ?>
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

$con = mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",   $con);
	
$result = mysql_query("select * from member order by uname", $con);
$total = mysql_num_rows($result);

echo ("
<HTML html>
<head>
<link href='../../css/common.css' rel='stylesheet'>
<link href='../../css/rest.css' rel='stylesheet'>
</head>
<body>
	<div class='content_tit_area clfix first_child no_line'>
		<h2 class='content_tit'>회원 목록 관리</h2>	
	</div>
");
	   
$i = 0;	

echo ("
	<div class='wrap_tbl tb_info'>
		<table>
			<caption>회원 목록 : ID, 이름, 주소, 전화번호, 이메일, 승인상태
			</caption>
			<colgroup>
				<col style = 'width : 8%;' />
				<col style = 'width : 8%;' />
				<col style = 'width : 50%;' />
				<col style = 'width : 15%;' />
				<col style = 'width : 14%;' />
				<col style = 'width : 5%;' />
			</colgroup>
			<thead>
				<tr>
					<th scope='col'>ID</th>
					<th class='writer' scope='col'>이름</th>
					<th scope='col'>주소</th>
					<th scope='col'>전화번호</th>
					<th scope='col'>이메일</th>
					<th scope='col'>승인</th>
				</tr>
			</thead>
			<tbody>
");	

while($i < $total):
	$uid = mysql_result($result, $i, "UID");
	$uname = mysql_result($result, $i, "UNAME");
	$zipcode = mysql_result($result, $i, "ZIPCODE");
	$addr1 = mysql_result($result, $i, "ADDR1");
	$addr2 = mysql_result($result, $i, "ADDR2");
	$mphone = mysql_result($result, $i, "MPHONE");
	$email = mysql_result($result, $i, "EMAIL");
	$approved = mysql_result($result, $i, "APPROVED");

	$address = "[" . $zipcode .   "]" . "&nbsp;" . $addr1 . "&nbsp;" .   $addr2;
	
    echo ("
	<tr>
		<th class='no' scope='col'><font size=2>$uid</th>
		<th class='writer' scope='col'>$uname</th>
		<th scope='col'>$address</th>
		<th scope='col'>$mphone</th>
		<th scope='col'>$email</th>
	");
		
	if ($approved == 0) {
		echo ("<th scope='col'><a href=memberchange.php?uid=$uid><font size=2>대기</a></th></tr>");
	} else {
		echo ("<th scope='col'><a href=memberchange.php?uid=$uid><font size=2>완료</a></th></tr>");
	}
	      
	$i++;
endwhile;

echo ("</tbody></table>
	   <div class='btn_area right'>
			<a id='writing' class='btns board gray' href='admin.php'>
			뒤로가기</a>
	   </div><br><br></body></html>");
mysql_close($con);

?>

</td></tr>
</table>
<?PHP include ("../../main/bottom.html");   ?>
