<meta charset='UTF-8'>
<? include ("../../../main/top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' valign='top'>

<?PHP
$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result = mysql_query("select * from diarycover where writer='$UserName' order by wdate desc", $con);
$total = mysql_num_rows($result);

if (!isset($UserID)) {
		echo ("<script>
		window.alert('로그인 후 이용 가능한 서비스 입니다.')
		location.href='../../../userSettings/signIn/login.html';
		</script>");
		exit;
	}

echo("
	<html lang='ko'>
	 <head>
	 <title>Diary-main-show 예제</title>
	 <link href='../../../css/Diary.css' rel='stylesheet'>
	 </head>
	 <body>
		<div class='Dmain'>
			<div class='Dmain_title' align='center'>
				<h1>"); 
				echo $UserName;
			echo("
				's Diary</h1>
			</div>
			<div class='Diary_array_wrap'>");

			 if (!$total){
				 echo("<div class='none_diary'>아직 등록된 다이어리가 없습니다.</div>");
			}else{ 
				$counter = 0;

				while ($counter < $total) :
				
				$coverfile = mysql_result($result, $counter, "coverfile");
				$dname = mysql_result($result, $counter, "dname");
				$tdate1 = mysql_result($result, $counter, "tdate1");
				$array1 = explode('-',$tdate1);
				$tdate1 = $array1[0] . "." . $array1[1] . "." . $array1[2];
				$tdate2 = mysql_result($result, $counter, "tdate2");
				$array2 = explode('-',$tdate2);
				$tdate2 = $array2[0] . "." . $array2[1] . "." . $array2[2];
				$covercolor = mysql_result($result, $counter, "covercolor");

				echo("<a href='../myDiary/dmain.php?dname=$dname'>
						<div class='Diary_cover' align='center' style='background-color:");
				echo $covercolor;
				echo("'>  
					<img src='../../../cover/$coverfile'><br>
					<div class='Diary_cover_right' style='background-color:");
				echo $covercolor;
				echo("'>
						<div class='Diary_cover_right_dot'>
						</div>
					</div>");

				echo $dname;
				echo("<br>");
				echo $tdate1;
				echo(" - ");
				echo $tdate2;

				echo("</div></a>"); 
				

				if(($counter % 4) == 0)
					echo("<div class='line_change'></div>");

				$counter = $counter +1;

				endwhile;
				}

				echo("
				</div>
				<div class='Dmain_addDiary2'>
					  <a href='dcinput.php'>
					  <input type='button' class='addButton' value='+'></a> 
					  </div>
			 </div>
			 </body>
			</html>");

mysql_close($con);

?>
</td></tr>
</table>
<? include ("../../../main/bottom.html");?>