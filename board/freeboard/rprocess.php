﻿<?PHP
 
if(!$writer){
	echo("
		<script>
		window.alert('이름이 없습니다. 다시 입력하세요.')
		history.go(-1)
		</script>
	");
	exit;
}

$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

// 답변 글은 원본 글보다 깊이가 1 증가됨
$result=mysql_query("select space from testboard where id=$id", $con);
$space=mysql_result($result, 0, "space");
$space=$space+1;

$wdate=date("Y-m-d"); // 단변 글을 쓴 날짜 저장

// 답변글이 추가되면 글의 개수가 하나 증가하므로 글 번호를 정리
$tmp = mysql_query("select id from testboard", $con);
$total = mysql_num_rows($tmp);

while($total >= $id):
	mysql_query("update testboard set id=id+1 where id=$total", $con);
	$total--;
endwhile;

// 원래 글 번호 위치에 답변 글을 삽입함
mysql_query("insert into   testboard(id, writer, topic, content, hit, wdate, space) values ($id, '$writer', '$topic','$content', 0, '$wdate',   $space)", $con);

mysql_close($con);

echo("<meta http-equiv='Refresh' content='0; url=fbshow.php?board=testboard'>");

?>
