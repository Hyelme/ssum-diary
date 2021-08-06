<meta charset="UTF-8">
<?PHP
if(!$sdate) {
	echo("
		<script>
		window.alert('날짜를 선택해주세요.');
		history.go(-1)
		</script>
	");
	exit;
}

if(!$content) {
	echo("
		<script>
		window.alert('내용을 입력해주세요.');
		history.go(-1)
		</script>
	");
	exit;
}

if(!$dday) {
	echo("
		<script>
		window.alert('디데이를 입력해주세요.');
		history.go(-1)
		</script>
	");
	exit;
}

$con = mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result1 = mysql_query("select * from diarycover where writer='$UserName' and dname='$dname'", $con);
$dname = mysql_result($result1, 0, "dname");

$result3 = mysql_query("select * from diary where dname='$dname'", $con);
$total=mysql_num_rows($result3);

if (!$total){
	$id = 1;
} else {
	$id = $total + 1;
}

$result2 = mysql_query("insert into diary(id, dname, dday, sdate, content, userfile, route) values($id, '$dname', $dday, '$sdate', '$content', '$userfile', '$route')",$con);

mysql_close($con);

if(!$result2) {
	echo("
		  <script>
		  window.alert('글을 추가하지 못했습니다. 다시 시도해주세요.');
		  history.go(-1)
		  </script>
	");
	exit;
} else {
	echo("
		  <script>
		  window.alert('새로운 글이 추가되었습니다');
		  </script>
	");
}
echo("<meta http-equiv='Refresh' content='0; url=dmain.php?dname=$dname'>");

?>