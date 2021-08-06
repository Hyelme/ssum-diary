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

$result = mysql_query("update diary set dday='$dday', sdate='$sdate', content='$content' where id='$id' and dname='$dname'", $con);

mysql_close($con);

if(!$result) {
	echo("
		<script>
		window.alert('수정에 실패했습니다')
		history.go(-1)
		</script>");
		exit;
} else {
	echo("
	<script>
	window.alert('글을 수정했습니다')
	</script>");
}



echo("<meta http-equiv='Refresh' content='0; url=../dmain.php?dname=$dname'>");

?>
