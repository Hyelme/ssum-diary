﻿<?PHP
 
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

$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result = mysql_query("select * from testboard where id=$id", $con);

// 기존 필드값을 유지할 항목을 추출함
$space = mysql_result($result, 0, "space");
$hit = mysql_result($result, 0, "hit");

$wdate = date("Y-m-d");	//글 수정한 날짜 저장

// 변경 내용을 테이블에 저장함
mysql_query("update $board set  writer='$writer', passwd='$passwd', topic='$topic', content='$content', hit=$hit, wdate='$wdate', space=$space where id=$id", $con);

echo("<meta http-equiv='Refresh' content='0; url=show.php?board=$board'>");

mysql_close($con);

?>
