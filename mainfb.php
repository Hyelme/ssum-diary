<meta charset="utf-8">

<?PHP

$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);
/*mysql_query("set session character_set_connection=utf8;"); 
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;"); */

$result = mysql_query("select * from testboard order by id desc", $con);
$total = mysql_num_rows($result);

echo("
<HTML html>
<head>
<link href='css/common.css' rel='stylesheet'>
<link href='css/rest.css' rel='stylesheet'>
</head>
<body>
 <div class='wrap_tbl tb_info'>
		<table>
			<caption>자유 게시판 : No, 제목, 작성자, 작성일, 조회수
			</caption>
			<colgroup>
				<col style = 'width : 65%;' />
				<col style = 'width : 15%;' />
				<col style = 'width : 20%;' />
			</colgroup>
			<thead>
				<tr>
					<th scope='col'>제목</th>
					<th class='writer' scope='col'>작성자</th>
					<th scope='col'>작성일</th>
				</tr>
			</thead>
			<tbody>
");
						
				if (!$total){
					echo("
						<tr><td class='none_contents' colspan=5>아직 등록된 글이 없습니다.</td></tr>
						</tbody>
						</table>
					");
		
				} else {
					if ($cpage=='') $cpage=1; // $cpage -  현재 페이지 번호
					$pagesize = 5;              // $pagesize - 한 페이지에 출력할 목록 개수

					$totalpage = (int)($total/$pagesize);

					if (($total%$pagesize)!=0) $totalpage = $totalpage + 1;

					$counter=0;

					while($counter<$pagesize):
					$newcounter=($cpage-1)*$pagesize+$counter; // 실제 결과 레코드 카운터
					if ($newcounter == $total) break; 

					$id=mysql_result($result,$newcounter,"id");
					$topic=mysql_result($result,$newcounter,"topic");
					$writer=mysql_result($result,$newcounter,"writer");
					$wdate=mysql_result($result,$newcounter,"wdate");
					$space=mysql_result($result,$newcounter,"space");

					$t="";
					
					if ($space>0) {
						for ($i=0 ; $i<=$space ; $i++)
						$t = $t . "&nbsp;";     // 답변 글의 경우 제목 앞 부분에 공백을 채움
					}

					echo("
						<tr>
							<th class='title' scope='col'>$t<a href=fbcontent.php?board=testboard&id=$id target='_top'>$topic</a></th>
							<th class='writer' scope='col'>$writer</th>
							<th align=center scope='col'>$wdate</th>
						</tr>
					");

					$counter = $counter + 1;
					endwhile;
  
					echo("
						</tbody>
						</table>
					");
				}

				echo("</div></body></html> ");
	
				mysql_close($con);

?>
