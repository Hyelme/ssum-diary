<meta charset="UTF-8">
<? include ("top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' valign='top'>
<?PHP
$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result1 = mysql_query("select * from diarycover where writer='$UserName' order by dname='$dname'",$con);
$result2 = mysql_query("select * from diary where dname='$dname'",$con);

$dname = mysql_result($result1, 0, "dname");
$dname = mysql_result($result1, 0, "dname");

echo("
<html lang='ko'>
 <head>
  <meta charset='UTF-8'>
  <link href='css/common.css' rel='stylesheet'>
  <link href='css/rest.css' rel='stylesheet'>
  <title>다이어리 신청</title>
 </head>
 <body>
  <div class='content_tit_area clfix first_child no_line'>
		<h2 class='content_tit'>다이어리 신청 하기</h2>
  </div>
  <div class='dcinput_wrap'>
	<form method=post action='#'>
		<select name=>
			<option value='' selected='selected'>다이어리 선택</option>");
			

echo("
		</select>
	</form>
  </div>
");

?>