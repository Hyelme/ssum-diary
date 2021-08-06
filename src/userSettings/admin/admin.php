<meta charset="UTF-8">
<? include ("../../main/top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' valign='top'>

<?PHP
echo("
<HTML html>
<head>
<link href='../../css/common.css' rel='stylesheet'>
<link href='../../css/rest.css' rel='stylesheet'>
</head>
<body>
	<div class='content_tit_area clfix first_child no_line'>
		<h2 class='content_tit'>관리 메뉴</h2>	
	</div>
	<div class='wrap_tbl tb_info'>
		<table>
			<caption>관리메뉴 : 회원관리[회원목록조회]
			</caption>
			<tr><th width='140' align='center'><font size='2'><b>[회 원 관 리]</b></th>
			</tr>
			<tr><th align='center'><a href='membershow.php'><font size='2'>회원 목록 조회</a></th>
			</tr>	  
		</table>
	</div>
</body>
</html>
");
?>

</td></tr>
</table>
<?PHP include ("../../main/bottom.html");   ?>