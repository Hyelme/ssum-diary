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

$con = mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$maint = mysql_query("select * from diarycover where dname='$dname'", $con);
if(!$coverfile) {

	$hit = mysql_result($maint, 0, "hit");

	$wdate = date("Y.m.d H:i:s",time());
	$dname = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $dname);
	
	$result = mysql_query("update diarycover set wdate='$wdate', writer='$writer', dname='$dname', country1='$country1', country2='$country2', tdate1='$tdate1', tdate2='$tdate2', covercolor='$covercolor', hit=$hit where dname='$dname'", $con);
} else {
	$tmp = mysql_query("select coverfile from diarycover where dname='$dname'",$con);
	$fname = mysql_result($tmp, 0, "coverfile");
	$savedir = "./cover";
	unlink("$savedir/$fname");

	$temp = $coverfile_name;
	if(file_exists("$savedir/$temp")) {
		echo("<script>
				window.alert('동일한 파일 이름이 서버에 존재합니다.')
				history.go(-1)
				</script>
		");
	} else {
		copy($coverfile,"$savedir/$temp");
		unlink($coverfile);
	}

// 기존 필드값을 유지할 항목을 추출함
$hit = mysql_result($maint, 0, "hit");

$wdate = date("Y.m.d H:i:s",time());
$dname = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $dname);

// 변경 내용을 테이블에 저장함
$result = mysql_query("update diarycover set wdate='$wdate', writer='$writer', dname='$dname', country1='$country1', country2='$country2', tdate1='$tdate1', tdate2='$tdate2', coverfile='$coverfile_name', covercolor='$covercolor', hit=$hit where dname='$dname'", $con);
}
mysql_close($con);

if(!$result) {
	echo("
		<script>
		window.alert('다이어리 커버 수정에 실패했습니다')
		history.go(-1)
		</script>");
		exit;
} else {
	echo("
	<script>
	window.alert('다이어리 커버를 수정했습니다')
	</script>");
}

echo("<meta http-equiv='Refresh' content='0; url=dcmain.php'>");

?>
