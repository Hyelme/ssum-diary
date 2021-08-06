<meta charset="UTF-8">
<? include ("../../main/top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' valign='top'>
<?PHP

$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result1 = mysql_query("select * from diarycover where writer='$UserName' and dname='$dname'", $con);
$result2 = mysql_query("select * from diary where dname='$dname' order by dday asc ,id asc",$con);
$total = mysql_num_rows($result2);

$dname = mysql_result($result1, 0, "dname");
$tdate1 = mysql_result($result1, 0, "tdate1");
$tdate2 = mysql_result($result1, 0, "tdate2");
$country1 = mysql_result($result1, 0, "country1");
$country2 = mysql_result($result1, 0, "country2");
$hit = mysql_result($result1, 0, "hit");

$hit = $hit +1;
mysql_query("update diarycover set hit=$hit where writer='$UserName' and dname='$dname' and tdate1='$tdate1'",$con);

echo("
<HTML html>
<head>
<link href='../../css/common.css' rel='stylesheet'>
<link href='../../css/rest.css' rel='stylesheet'>
<link href='../../css/Diary.css' rel='stylesheet'>
<script src='../../js/hiddenBtn.js'></script>
</head>
<body>
	<div class='content_tit_area clfix first_child no_line'>
		<h2 class='content_tit'>");
		echo $dname;
  echo("</h2><h4 class='content_tit3'>[ ");
  
		echo $country1;
		echo(" - ");
		echo $country2;
  echo(" ]</h4>
	<div class='btn_area justify'>
		<a class='btns board_white' href='./diaryCover/dcpass.php?dname=$dname&mode=0'>커버 수정</a>
		<a class='btns board_white' href='./diaryCover/dcpass.php?dname=$dname&mode=1'>Diary 삭제</a>
		<a id='writing' class='btns board gray' href='dcmain.php'>
		뒤로가기</a>
	</div>
	</div>
	<div class='wrap_tbl_write tb_write'>
	<table>
	<colgroup>
		<col style='width : 10%;' />
		<col style='width : 80%;' />
		<col style='width : 10%;' />
	</colgroup>
	<tbody>
	  <form method='post' action='dcondelete.php?dname=$dname'>
		<tr>
			<th colspan = 3><font class='indate' color='#4591ce' size=4>In Date</font><font size=4>");
			echo $tdate1;
	  echo("</font></th>
		</tr>");

		if(!$total){
			echo("<tr><td class='none_diary' colspan=2>새로운 이야기를 작성해주세요.</td></tr>");
		}else{
			$counter = 0;

			while($counter < $total) :

				$id = mysql_result($result2, $counter, "id");
				$dday = mysql_result($result2, $counter, "dday");
				$sdate = mysql_result($result2, $counter, "sdate");
				$content = mysql_result($result2, $counter, "content");
				$content = nl2br($content);
				$userfile = mysql_result($result2, $counter, "userfile");
				$route = mysql_result($result2, $counter, "route");
				$route = nl2br($route);
			
				echo("<tr>
						<th scope='row'>Day ");
				echo $dday;			
				echo("</th>");

					if($content) {
						echo("<td style='word-break:break-all;'>$content</td>
							  <td align='center'><font size=2><a href='dpass.php?id=$id&dname=$dname&mode=0'>[수정]</a> / <a href='dpass.php?id=$id&dname=$dname&mode=3'>[삭제]</a></font></td>");
					} elseif($userfile) {
						echo("<td><img src='./diarypt/$userfile' width='300px' border=0></td>
							  <td align='center'><font size=2><a href='dpass.php?id=$id&dname=$dname&mode=1'>[수정]</a> / <a href='dpass.php?id=$id&dname=$dname&mode=3'>[삭제]</a></font></td>");
					}elseif($route) {
						echo("<td style='word-break:break-all;'>$route</td>
							  <td align='center'><font size=2><a href='dpass.php?id=$id&dname=$dname&mode=2'>[수정]</a> / <a href='dpass.php?id=$id&dname=$dname&mode=3'>[삭제]</a></font></td>");
					} 
			echo("</tr>");
			$counter = $counter +1;

			endwhile;
		}
echo("</form><tr>
		<th colspan = 3><font class='indate' color='#4591ce' size=4>Out Date</font><font size=4>");
		echo $tdate2;
echo("</font></th>
	  </tr>				
	</tbody>
	</table>
	</div>
	<div class='Dmain_addDiary'>
		<table>
			<tr>
				<td>
				<div id='hiddenTB' style='display:none'>
					<a href='./routeContent/drinput2.php?dname=$dname'><input class='subBtn' type='button' value='경로'></a>
					<a href='./writeContent/dwinput.php?dname=$dname'><input class='subBtn' type='button' value='글'></a>
					<a href='./imageContent/dpinput.php?dname=$dname'><input class='subBtn' type='button' value='사진'></a>
				</div>
				</td>
				<td>
				<input type='button' id='BT' class='addButton' value='+' onclick='view()'> 
				</td>
			</tr>
		</table>
	</div>
</body>
</html>");
?>
</td></tr>
</table>
<? include ("../../main/bottom.html");?>