<meta charset="utf-8">
<?PHP
error_reporting(E_ALL^ E_WARNING);

 
$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$temp = mysql_query("select * from diarycover where dname='$dname'");

$coverfile = mysql_result($temp, 0, "coverfile");

$result = mysql_query("delete from diarycover where dname='$dname'",$con);

if($coverfile) {
	$temp = $coverfile;
	unlink("./cover/$temp");
}

$temp2 = mysql_query("select * from diary where dname='$dname'");
$userfile = mysql_result($temp2, 0, "userfile");

mysql_query("delete from diary where dname='$dname'",$con);

if($userfile) {
	$temp = $userfile;
	unlink("./file/$temp");
}

if(!$result) {
echo("
	<script>
	window.alert('다이어리 삭제에 실패했습니다.');
	history.go(-1)
	</script>
");
exit;

}else {

echo("
	<script>
	window.alert('다이어리가 삭제 되었습니다.');
	</script>
");

}

mysql_close($con);

// 글 삭제 결과를 보여주기 위한 글 목록 보기 프로그램 호출
echo("<meta http-equiv='Refresh' content='0; url=dcmain.php'>");

?>
