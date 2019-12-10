<meta charset="utf-8">
<?PHP
 
$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$temp = mysql_query("select * from place where id=$id");

$filename = mysql_result($temp, 0, "filename");



$result = mysql_query("delete from place where id=$id",$con);

if($filename) {
unlink("./file/$filename");
}

if(!$result) {

echo("
	<script>
	window.alert('게시글 삭제에 실패했습니다.');
	history.go(-1)
	</script>
");
exit;

}else {

echo("
	<script>
	window.alert('글이 삭제 되었습니다.');
	</script>
");

}
// 삭제된 글보다 글 번호가 큰 게시물은 글 번호를 1씩 감소
$tmp = mysql_query("select id from place order by id desc", $con);
$last = mysql_result($tmp, 0, "id");     // 가장 마지막 글 번호 추출

$i = $id + 1;       // 삭제된 글의 번호보다 1이 큰 글 번호부터 변경
while($i <= $last):
	mysql_query("update place set id=id-1 where id=$i", $con);
	$i++;
endwhile;

mysql_close($con);

// 글 삭제 결과를 보여주기 위한 글 목록 보기 프로그램 호출
echo("<meta http-equiv='Refresh' content='0; url=plshow.php?board=place'>");

?>
