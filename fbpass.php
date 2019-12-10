<meta charset="UTF-8">

<?PHP
 
$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result=mysql_query("select writer from testboard where id=$id",$con);
$writer=mysql_result($result,0,"writer");

if ($writer != $UserName && $UserID != "admin") {            // 암호가 일치하지 않는 경우(관리자로 로그인 시 삭제,수정 가능)
	echo   ("<script>
		window.alert('작성자 본인만 이용 가능한 서비스 입니다.');
		history.go(-1);
		</script>");
	exit;		
} else {                  // 암호가 일치하는 경우
    switch ($mode) {
        case 0:          // 수정 프로그램 호출
            echo("<meta http-equiv='Refresh' content='0; url=fbmodify.php?board=testboard&id=$id'>");
            break;
        case 1:          // 삭제 프로그램 호출
            echo("<meta http-equiv='Refresh' content='0; url=fbdelete.php?board=testboard&id=$id'>");
            break;
    }   	   
}  

mysql_close($con);


?>
