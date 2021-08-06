<meta charset="UTF-8">

<?PHP
 
if (!$writer){
	echo("
		<script>
		window.alert('이름이 없습니다. 다시 입력하세요')
		history.go(-1)
		</script>
	");
	exit;
}

if (!$topic){
	echo("
		<script>
		window.alert('제목이 없습니다. 다시 입력하세요')
		history.go(-1)
		</script>
	");
	exit;
}

if (!$content){
	echo("
		<script>
		window.alert('내용이 없습니다. 다시 입력하세요')
		history.go(-1)
		</script>
	");
	exit;
}

$con = mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$maint = mysql_query("select * from famous_rest where id=$id", $con);

if(!$userfile) {
	// 기존 필드값을 유지할 항목을 추출함
	$space = mysql_result($maint, 0, "space");
	$hit = mysql_result($maint, 0, "hit");

	$wdate = date("Y-m-d");

	$result = mysql_query("update famous_rest set writer='$writer', topic='$topic', content='$content', hit=$hit, wdate='$wdate', space=$space where id=$id", $con);
} else {
	$tmp = mysql_query("select filename from famous_rest where id=$id",$con);
	$fname = mysql_result($tmp, 0, "filename");
	$savedir = "./file";
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

// 기존 필드값을 유지할 항목을 추출함
$space = mysql_result($maint, 0, "space");
$hit = mysql_result($maint, 0, "hit");

$wdate = date("Y-m-d");

// 변경 내용을 테이블에 저장함
$result = mysql_query("update famous_rest set writer='$writer', topic='$topic', content='$content', hit=$hit, wdate='$wdate', filename='$userfile_name', filesize='$userfile_size', space=$space where id=$id", $con);
}
mysql_close($con);

if(!$result) {
	echo("
		<script>
		window.alert('게시글 수정에 실패했습니다')
		history.go(-1)
		</script>");
		exit;
} else {
	echo("
	<script>
	window.alert('게시글을 수정했습니다')
	</script>");
}


echo("<meta http-equiv='Refresh' content='0; url=frshow.php?board=famous_rest'>");

?>
