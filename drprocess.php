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

if(!$route) {
	echo("
		<script>
		window.alert('경로를 입력해주세요.');
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
/*
if(!$route1) {
	$route = $route0;
}else if(!$route2) {
	for($i=0; $i < 2; $i++){
		$route = $route0 + " > " + $route1;}
	}
*/

$con = mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

/*
$result = mysql_query("select * from diary order by sdate", $con);
$total = mysql_num_rows($result);
*/

$arr = explode(' ',$route);
if($arr.length == 1) {
	$route = $arr;
} else if($arr.length > 1) {
	for($i = 0; $i < $arr.length; $i++) {
		if($i == 0) {
			$route = $arr[$i];
		}else{
			$route = $route . " → " . $arr[$i];
		}
	}
}

$result1 = mysql_query("select * from diarycover where writer='$UserName'", $con);
$dname = mysql_result($result1, 0, "dname");

$result3 = mysql_query("select * from diary where dname='$dname'", $con);
$total=mysql_num_rows($result3);

if (!$total){
	$id = 1;
} else {
	$id = $total + 1;
}

mysql_query("insert into diary(id,dname,dday,sdate,content,photo,route) values($id, '$dname', '$dday', '$sdate', '$content', '$photo','$route'",$con);

mysql_close($con);

echo("<meta http-equiv='Refresh' content='0; url=dmain.php?dname=$dname'>");

?>