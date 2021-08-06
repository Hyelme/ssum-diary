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

if(!$userfile) {
	echo("
		<script>
		window.alert('사진을 선택해주세요.');
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

	$tmp = mysql_query("select userfile from diary where dname='$dname' and id='$id'",$con);
	$fname = mysql_result($tmp, 0, "userfile");
	$savedir = "../../../diarypt";
	unlink("$savedir/$fname");

	$temp = $userfile_name;
	if(file_exists("$savedir/$temp")) {
		echo("<script>
				window.alert('동일한 파일 이름이 서버에 존재합니다.')
				history.go(-1)
				</script>
		");
	} else {
		copy($userfile,"$savedir/$temp");
		unlink($userfile);
	}

$result = mysql_query("update diary set dday='$dday', sdate='$sdate', userfile='$userfile_name' where id='$id' and dname='$dname'", $con);

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
	window.alert('사진을 수정했습니다')
	</script>");
}


echo("<meta http-equiv='Refresh' content='0; url=../dmain.php?dname=$dname'>");


?>
