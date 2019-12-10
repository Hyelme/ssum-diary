<meta charset="UTF-8">
<?PHP
$con=mysql_connect("localhost","hyelme","pw4hyelme");

if($con)
	echo "서버연결 성공";
else
	echo "서버연결 실패";

echo "<br>";

$db = mysql_select_db("hyelmedb",$con);

if($db)
	echo "DB연결 성공";
else
	echo "DB연결 실패";

echo "<br>";

$query = mysql_query("select * from member where uid='".$_POST['uid']."'",$con);
$total = mysql_num_rows($query);

if($total)
	echo $_POST['uid']." 있음";
else
	echo $_POST['uid']." 없음";
?>