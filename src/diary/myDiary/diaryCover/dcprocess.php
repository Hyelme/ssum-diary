<meta charset="UTF-8">

<?PHP

if(!$dname) {
	echo("
		<script>
		window.alert('제목을 입력해주세요');
		history.go(-1)
		</script>
	");
	exit;
}

if(!$country1) {
	echo("
		<script>
		window.alert('다녀온 나라를 입력해주세요');
		history.go(-1)
		</script>
	");
	exit;
}

if(!$country2) {
	echo("
		<script>
		window.alert('다녀온 지역을 입력해주세요');
		history.go(-1)
		</script>
	");
	exit;
}

if(!$tdate1) {
	echo("
		<script>
		window.alert('여행 시작 날짜를 선택해주세요');
		history.go(-1)
		</script>
	");
	exit;
}

if(!$tdate2) {
	echo("
		<script>
		window.alert('여행 종료 날짜를 선택해주세요');
		history.go(-1)
		</script>
	");
	exit;
}

if($tdate1 > $tdate2) {
	echo("
		<script>
		window.alert('여행 시작일은 종료일보다 늦을 수 없습니다.');
		history.go(-1)
		</script>
	");
	exit;
}

if(!$coverfile) {
	echo("
		<script>
		window.alert('커버 사진을 선택해주세요');
		history.go(-1)
		</script>
	");
	exit;
}else {
	$savedir = "./cover";
	$temp = $coverfile_name;
	if (file_exists("$savedir/$temp")) {
		echo("
			<script>
			window.alert('서버에 동일한 파일이 이미 존재합니다.');
			history.go(-1)
			</script>
		");
		exit;
	} else {
		copy($coverfile, "$savedir/$temp");
		unlink($coverfile);
	}
}

$wdate = date("Y.m.d H:i:s",time());

$dname = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $dname);

$con = mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result = mysql_query("select * from diarycover where dname='$dname'",$con);
$total = mysql_num_rows($result);
	
if ($total == 0) {
} else {
	echo("
		<script>
		window.alert('이미 사용중인 제목입니다');
		history.go(-1)
		</script>
	");
	exit;
}

$result=mysql_query("insert into diarycover(wdate, writer, dname, country1, country2, tdate1, tdate2, coverfile, covercolor, hit) values('$wdate', '$writer', '$dname', '$country1', '$country2', '$tdate1', '$tdate2', '$coverfile_name', '$covercolor', 0)", $con);

mysql_close($con);

if(!$result) {
	echo("
		  <script>
		  window.alert('다이어리를 추가하지 못했습니다. 다시 시도해주세요.');
		  history.go(-1)
		  </script>
	");
	exit;
} else {
	echo("
		  <script>
		  window.alert('다이어리가 추가되었습니다');
		  </script>
	");
	echo("<meta http-equiv='Refresh' content='0; url=dcmain.php'>");
}

?>