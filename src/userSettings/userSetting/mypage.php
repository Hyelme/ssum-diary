<meta charset="UTF-8">
<?PHP include ("../../main/top.html"); ?>
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
<link href='../../css/common.css' rel='stylesheet'>
<link href='../../css/rest.css' rel='stylesheet'>
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

echo ("</tbody></table><br><br></body></html>");

mysql_close($con);	

?>

</td></tr>
</table>
<?PHP include ("../../main/bottom.html");   ?>
