<?PHP

$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result = mysql_query("select * from testboard order by id desc", $con);
$total = mysql_num_rows($result);

echo("
<HTML html>
<head>
<link href='css/freeboard.css' rel='stylesheet'>
</head>
<body>
 <div class='wrap_tbl tb_info'>
		<table>
			<caption>���� �Խ��� : No, ����, �ۼ���, �ۼ���, ��ȸ��
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
					<th scope='col'>����</th>
					<th class='writer' scope='col'>�ۼ���</th>
					<th scope='col'>�ۼ���</th>
					<th scope='col'>��ȸ��</th>
				</tr>
			</thead>
			<tbody>
");
						
				if (!$total){
					echo("
						<tr><td class='none_contents' colspan=5>���� ��ϵ� ���� �����ϴ�.</td></tr>
					");
				} else {
					if ($cpage=='') $cpage=1; // $cpage -  ���� ������ ��ȣ
					$pagesize = 5;              // $pagesize - �� �������� ����� ��� ����

					$totalpage = (int)($total/$pagesize);

					if (($total%$pagesize)!=0) $totalpage = $totalpage + 1;

					$counter=0;

					while($counter<$pagesize):
					$newcounter=($cpage-1)*$pagesize+$counter; // ���� ��� ���ڵ� ī����
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
						$t = $t . "&nbsp;";     // �亯 ���� ��� ���� �� �κп� ������ ä��
					}

					echo("
						<tr>
							<td class='no'>$id</td>
							<td class='title'>$t<a href=content.php?board=$board&id=$id>$topic</a></td>
							<td class='writer'>$writer</td>
							<td align=center>$wdate</td>
							<td align=center>$hit</td>
						</tr>
					");

					$counter = $counter + 1;
					endwhile;
  
					echo("</tbody>");
		   
					// ȭ�� �ϴܿ� ������ ��ȣ ���
					if ($cblock=='') $cblock=1; // $cblock - ���� ������ ��ϰ�
					$blocksize = 3;             // $blocksize - ȭ��� ����� ������ ��ȣ ����

					$pblock = $cblock - 1;  // ���� ����� ���� ��� - 1
					$nblock = $cblock + 1;  // ���� ����� ���� ��� + 1
		
					// ���� ����� ù ������ ��ȣ
					$startpage = ($cblock - 1) * $blocksize + 1;	

					$pstartpage = $startpage - 1;  // ���� ����� ������ ������ ��ȣ
					$nstartpage = $startpage + $blocksize;  // ���� ����� ù ������ ��ȣ

					if ($pblock > 0) // ���� ����� �����ϸ� [�������] ��ư�� Ȱ��ȭ
					
					echo ("[<a href=show.php?board=$board&cblock=$pblock&cpage=$pstartpage>�������</a>] ");

					// ���� ��Ͽ� ���� ������ ��ȣ�� ���	
					$i =   $startpage;
					
					while($i < $nstartpage):
						if ($i > $totalpage) break;  // ������ �������� ��������� ������
					
						echo ("[<a href=show.php?board=$board&cblock=$cblock&cpage=$i>$i</a>]");
						$i = $i + 1;
					endwhile;
	 
					// ���� ����� ���� �������� ��ü ������ ������ ������ [�������] ��ư Ȱ��ȭ  
					 if ($nstartpage <= $totalpage)   
						echo ("[<a href=show.php?board=$board&cblock=$nblock&cpage=$nstartpage>�������</a>] ");

					echo ("</td></tr></table>");
				}
				echo("<div class='btn_area right'>
							<a class='btns board gray' href='input.php?board=$board'>
								<em class='ico_writing'></em>�۾���
							</a>
						</div>
					</div>
					<div class='paging'>
						<ul class='clfix _pagination' data-total='16' data-current = '1' data-per-page ='10' ></div>");
				echo("</div></body></html>");
	
				mysql_close($con);

?>