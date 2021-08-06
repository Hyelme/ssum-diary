<meta charset="UTF-8">
<? include ("top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' valign='top'>
<?PHP

$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result1 = mysql_query("select * from diarycover where dname='$dname'", $con);
$result2 = mysql_query("select * from diary where dname='$dname' order by dday",$con);
$total = mysql_num_rows($result2);

$writer = mysql_result($result1, 0, "writer");
$dname = mysql_result($result1, 0, "dname");
$tdate1 = mysql_result($result1, 0, "tdate1");
$tdate2 = mysql_result($result1, 0, "tdate2");
$hit = mysql_result($result1, 0, "hit");

$hit = $hit +1;
mysql_query("update diarycover set hit=$hit where dname='$dname' and tdate1='$tdate1'",$con);

echo("
<HTML html>
<head>
<link href='../css/common.css' rel='stylesheet'>
<link href='../css/rest.css' rel='stylesheet'>
<link href='../css/Diary.css' rel='stylesheet'>
<script src='../js/hiddenBtn.js'></script>
</head>
<body>
	<div class='content_tit_area clfix first_child no_line'>
		<h2 class='content_tit'>");
		echo $writer;
		echo("'s ");
		echo $dname;
  echo("</h2>
	<div class='btn_area right'>
		<a id='writing' class='btns board gray' href='Fmain.html'>
		뒤로가기</a>
	</div>
	</div>
	<div class='wrap_tbl_write tb_write'>
	<table>
	<colgroup>
		<col style='width : 10%;' />
		<col style='width : 90%;' />
	</colgroup>
	<tbody>
		<tr>
			<th colspan = 2><font class='indate' color='#4591ce' size=4>In Date</font><font size=4>");
			echo $tdate1;
	  echo("</font></th>
		</tr>");

		if(!$total){
			echo("<tr colspan=2><td colspan=2 class='none_diary'>새로운 이야기가 없습니다.</td></tr>");
		}else{
			$counter = 0;

			while($counter < $total) :

				$dday = mysql_result($result2, $counter, "dday");
				$sdate = mysql_result($result2, $counter, "sdate");
				$content = mysql_result($result2, $counter, "content");
				$content = nl2br($content);
				$userfile = mysql_result($result2, $counter, "userfile");
				$route = mysql_result($result2, $counter, "route");
			
				echo("<tr>
						<th scope='row'>Day ");
				echo $dday;			
				echo("</th>");
				if($content) {
						echo("<td style='word-break:break-all;'>$content</td>");
					} elseif($userfile) {
						echo("<td><img src='./diarypt/$userfile' width='300px' border=0></td>");
					}else {
						echo("<td style='word-break:break-all;'>$route</td>");
					} 
			echo("</tr>");
			$counter = $counter +1;

			endwhile;
		}
echo("<tr>
		<th colspan = 2><font class='indate' color='#4591ce' size=4>Out Date</font><font size=4>");
		echo $tdate2;
echo("</font></th>
	  </tr>				
	</tbody>
	</table>
</body>
</html>");
?>
</td></tr>
</table>
<? include ("bottom.html");?>