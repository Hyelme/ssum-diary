<meta charset="utf-8">
<? include ('../main/top.html'); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' align='center' valign='top'>

<?PHP

$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);
/*mysql_query("set session character_set_connection=utf8;"); 
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;"); */


$result = mysql_query("select * from place order by id desc", $con);
$total = mysql_num_rows($result);

echo("
<HTML html>
<head>
<link href='../css/common.css' rel='stylesheet'>
<link href='../css/rest.css' rel='stylesheet'>
<title>여행지 공유 게시판</title>
</head>
<body>
 <div class='content_tit_area clfix first_child no_line'>
			<h2 class='content_tit'>여행지 공유 게시판</h2>
</div>
 <div class='wrap_tbl tb_info'>
		<table>
			<caption>여행지 공유 게시판 : No, 제목, 작성자, 작성일, 조회수
			</caption>
			<colgroup>
				<col style = 'width : 8%;' />
				<col style = 'width : 55%;' />
				<col style = 'width : 15%;' />
				<col style = 'width : 13%;' />
				<col style = 'width : 9%;' />
			</colgroup>
			<thead>
				<tr>
					<th scope='col'>No.</th>
					<th scope='col'>제목</th>
					<th class='writer' scope='col'>작성자</th>
					<th scope='col'>작성일</th>
					<th scope='col'>조회수</th>
				</tr>
			</thead>
			<tbody>
");
						
				if (!$total){
					echo("
						<tr><td class='none_contents' colspan=5>아직 등록된 글이 없습니다.</td></tr>
						</tbody>
						</table>
							<div class='btn_area right'>
								 <a id='writing' class='btns board gray' href='plinput.php?board=place'>
								 글쓰기</a>
							</div>
					");
		
				} else {
					if ($cpage=='') $cpage=1; // $cpage -  현재 페이지 번호
					$pagesize = 10;              // $pagesize - 한 페이지에 출력할 목록 개수

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
					$hit=mysql_result($result,$newcounter,"hit");
					$space=mysql_result($result,$newcounter,"space");

					$t="";
					
					if ($space>0) {
						for ($i=0 ; $i<=$space ; $i++)
						$t = $t . "&nbsp;";     // 답변 글의 경우 제목 앞 부분에 공백을 채움
					}

					echo("
						<tr>
							<th class='no' scope='col'>$id</td>
							<th class='title' scope='col'>$t<a href=plcontent.php?board=place&id=$id>$topic</a></td>
							<th class='writer' scope='col'>$writer</td>
							<th align=center scope='col'>$wdate</td>
							<th align=center scope='col'>$hit</td>
						</tr>
					");

					$counter = $counter + 1;
					endwhile;
  
					echo("
						</tbody>
						</table>
						<div class='btn_area right'>
								 <a id='writing' class='btns board gray' href='plinput.php?board=place'>
								 글쓰기
								 </a>
							</div>
					");

					// 화면 하단에 페이지 번호 출력
					if ($cblock=='') $cblock=1; // $cblock - 현재 페이지 블록값
					$blocksize = 3;             // $blocksize - 화면상에 출력할 페이지 번호 개수

					$pblock = $cblock - 1;  // 이전 블록은 현재 블록 - 1
					$nblock = $cblock + 1;  // 다음 블록은 현재 블록 + 1
		
					// 현재 블록의 첫 페이지 번호
					$startpage = ($cblock - 1) * $blocksize + 1;	

					$pstartpage = $startpage - 1;  // 이전 블록의 마지막 페이지 번호
					$nstartpage = $startpage + $blocksize;  // 다음 블록의 첫 페이지 번호

					if ($pblock > 0) // 이전 블록이 존재하면 [이전블록] 버튼을 활성화
					
					echo ("<a href=plshow.php?board=place&cblock=$pblock&cpage=$pstartpage><strong>〈</strong></a> ");

					// 현재 블록에 속한 페이지 번호를 출력	
					$i =   $startpage;
					
					while($i < $nstartpage):
						if ($i > $totalpage) break;  // 마지막 페이지를 출력했으면 종료함
					
						echo ("<a href=plshow.php?board=place&cblock=$cblock&cpage=$i><strong>$i</strong></a>");
						$i = $i + 1;
					endwhile;
	 
					// 다음 블록의 시작 페이지가 전체 페이지 수보다 작으면 [다음블록] 버튼 활성화  
					 if ($nstartpage <= $totalpage)   
						echo ("<a href=plshow.php?board=place&cblock=$nblock&cpage=$nstartpage><strong>〉</strong></a>");

				}

				echo("</div></body></html> ");
	
				mysql_close($con);

?>

</td></tr>
</table>
<? include ("../main/bottom.html"); ?>