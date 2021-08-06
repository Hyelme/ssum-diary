<meta charset="utf-8">
<? include ("top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' valign='top'>

<?PHP
 
$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result=mysql_query("select * from testboard where id=$id",$con);

// 각 필드에 해당하는 데이터를 뽑아 내는 과정
$id=mysql_result($result,0,"id");
$writer=mysql_result($result,0,"writer");
$topic=mysql_result($result,0,"topic");
$hit=mysql_result($result,0,"hit");

$hit = $hit +1;   //조회수를 하나 증가
mysql_query("update testboard set hit=$hit where id=$id",$con);

$wdate=mysql_result($result,0,"wdate");
$content=mysql_result($result,0,"content");
$content = nl2br($content);


// 테이블로부터 읽은 내용을 화면에 디스플레이
echo("
	<HTML html>
		<head>
		<link href='css/common.css' rel='stylesheet'>
		<link href='css/rest.css' rel='stylesheet'>
		</head>
		<body>
		<div class='content_area' id='skip_pass'>
			<div class='content_tit_area clfix first_child no_line'>
			<h2 class='content_tit'>자유게시판</h2>
		</div>
		<div class='wrap_tbl_view _article-detail-wrap _fallback-exclude-wrap'>
			<div class='tb_view _article-wrap'>
				<table>
				<tr>
					<th><span class='veiw_tit'>no. $id</span></th>
					<th><h3 class='veiw_tit'> $topic </h3></th>
				</tr>
				</table>
				<div class='view_info'> 
					<div class='view_info_txt'> 
						<strong class='content_info'> $writer </strong>
						<span class='content_info'> $wdate </span> 
						<span class='content_info'> 조회 $hit </span>
					</div>
				</div>
				<div class='view_cont'> 
					<div class='view_cont_txt fr-view' style='word-break:break-all;'>$content</div> 
				</div> 
			</div> 
			<div class='btn_area justify'> 
				<div class='left'>
					<a class='btns board_white' href='fbpass.php?board=testboard&id=$id&mode=0'>수정</a>
					<a class='btns board_white' href='fbpass.php?board=testboard&id=$id&mode=1'>삭제</a>
				</div> 
				<a class='btns board_white' href='fbreply.php?board=testboard&id=$id'>답글쓰기</a>
				<a class='btns board gray' href='fbinput.php?board=testboard'>글쓰기</a>
				<a class='btns board_white _article-list' href='fbshow.php?board=testboard'>목록</a>
			</div> 
			<br><br>
		</div>
		</body>
	</html>
");

?>
</td></tr>
</table>
<? include ("bottom.html");?>