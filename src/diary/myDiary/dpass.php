<meta charset="UTF-8">

<?PHP
 
$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result=mysql_query("select writer from diarycover where dname='$dname'",$con);
$result2 = mysql_query("select * from diary where dname='$dname'",$con);
$writer=mysql_result($result,0,"writer");
$content = mysql_result($result2, 0, "content");
$userfile = mysql_result($result2, 0, "userfile");
$route = mysql_result($result2, 0, "route");

if ($writer != $UserName) {
	echo   ("<script>
		window.alert('작성자 본인만 이용 가능한 서비스 입니다.');
		history.go(-1);
		</script>");
	exit;		
} else {                  // 암호가 일치하는 경우
    switch ($mode) {
        case 0:          // 수정 프로그램 호출
			echo("<meta http-equiv='Refresh' content='0; url=./writeContent/dwmodify.php?id=$id&dname=$dname'>");
			//echo("<meta http-equiv='Refresh' content='0; url=dconmodify.php?dname=$dname'>");
            break;
        case 1:
			echo("<meta http-equiv='Refresh' content='0; url=./imageContent/dpmodify.php?id=$id&dname=$dname'>");
			break;
		case 2:
			echo("<meta http-equiv='Refresh' content='0; url=./routeContent/drmodify.php?id=$id&dname=$dname'>");
			break;
		case 3:         // 삭제 프로그램 호출
			echo("<meta http-equiv='Refresh' content='0; url=./diaryCover/dcondelete.php?id=$id&dname=$dname'>");
            break;
    }   	   
}  

mysql_close($con);


?>
