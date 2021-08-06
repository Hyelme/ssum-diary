<meta charset="utf-8">
<? include ("top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' align='center' valign='top'>


<?PHP


if (!isset($UserID)) {
		echo ("<script>
		window.alert('로그인 후 이용 가능한 서비스 입니다.')
		location.href='login.html';
		</script>");
		exit;
	}


$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result=mysql_query("select * from diarycover where dname='$dname'",$con);

// 수정하고자 하는 원본 게시물에서 수정 가능한 항목을 추출함
$dname=mysql_result($result,0,"dname");
$writer=mysql_result($result,0,"writer");
$country1=mysql_result($result,0,"country1");
$country2=mysql_result($result,0,"country2");
$tdate1 = mysql_result($result,0,"tdate1");
$tdate2 = mysql_result($result,0,"tdate2");
$coverfile = mysql_result($result,0,"coverfile");
$covercolor = mysql_result($result,0,"covercolor");

echo("
<html>
		<head>
		<title>Diary Cover 등록</title>
		<link href='css/common.css' rel='stylesheet'>
		<link href='css/rest.css' rel='stylesheet'>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js'></script> 
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js'></script> 
		<link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css' rel='stylesheet'> 
		    
		<link rel='stylesheet' type='text/css' href='css/spectrum.css'>
		<link rel='stylesheet' type='text/css' href='ccs/docs.css'>
		<script type='text/javascript' src='js/spectrum.js'></script>

		<style>
	
		::-ms-clear { display: none; }

		</style>
 </head>
 <body>
 <div class='content_tit_area clfix first_child no_line'>
	<h2 class='content_tit'>Diary cover 수정하기</h2>
</div>
  <div class='wrap_tbl_write tb_write'>
		<form method='post' action='dcmprocess.php?dname=$dname' enctype='multipart/form-data' class='_article-form'>
		<table>
			<caption>
				Diary cover 입력 폼 : 다이어리 제목, 작성자, 다녀온 국가 및 지역, 기간, cover 사진 선택, 공개여부
			</caption>
			<colgroup>
				<col style='width : 19%;' />
				<col style='width : 81%;' />
			</colgroup>
			<tbody>
				<tr>
					<th scope='row'>Diary 제목</th>
					<td class='ipt_join'>
						<input type='text' name=dname title='다이어리 제목' class='ipt_txt' style='width: 500px; height:30px;' readonly='readonly' value='$dname'>
					</td>
				</tr>
				<tr>
					<th scope='row'>작성자</th>
					<td class='ipt_join'>
						<input name='writer' class='ipt_txt' style='width: 271px; height : 30px;' type='text' readonly='readonly' value= '$writer'>
					</td>
				</tr>
				<tr>
					<th scope='row'>나라-지역</th>
					<td>
						<input type='text' name=country1 title='다녀온 국가' class='ipt_txt _article-title' style='width: 247px; height:30px;' value='$country1'/>
						<input type='text' name=country2 title='다녀온 지역' class='ipt_txt _article-title' style='width: 248px; height:30px;' value='$country2' />
					</td>
				</tr>
				<tr>
					<th scope='row'>기간</th>
					<td>
						<input name=tdate1 id='datepicker1' class='ipt_txt' readonly onfocus='this.blur()' style='width: 100px; height:30px;' value='$tdate1'> - <input name=tdate2 id='datepicker2' class='ipt_txt' readonly onfocus='this.blur()' style=' width: 100px; height:30px;' value='$tdate2'>
					</td>
					</th>
				</tr>
				<script type='text/javascript'>
					$(function() {
						$('#datepicker1').datepicker({
							dateFormat: 'yy-mm-dd'
						})
					});
	
					$(function() {
						$('#datepicker2').datepicker({
							dateFormat: 'yy-mm-dd'
						})
					});
				</script>
				<tr>
					<th scope='row'>커버 사진</th>
					<td>
						<input type='file' name='coverfile' maxlength = 80 style='width: 500px; height:30px;'>
					</td>
					</th>
				</tr>
				<tr>
					<th scope='row'>표지색상</th>
					<td>
						<input type='color' id=covercolor name='covercolor' class='ipt_txt style='height:30px;' value='$covercolor'>
						<em id='basic-log'></em>
					</td>
					</th>
				</tr>
			</tbody>
		</table>
	<div class='tbl_info_txt'>
		<p class='bl_lgray_dot'>저작권 등 타인의 권리를 침해하거나 명예를 훼손하는 게시물은 관련법률에 의해 제재받을 수 있으며, 게시판운영원칙에 따라 임의 삭제될 수 있습니다.</p>
	</div>
	<div class='btn_area right'>
		<input type='button' class='btns board_white _article-confirm-list' onclick='history.go(-1)' value='취소'><em class='ico_cancel'></em>
		<input type='submit' class='btns board gray _article-post' value='수정완료'><em class='ico_regi'></em>
	</div>
	</form>
  </div>
  <br><br>
 </body>
</html>
");

mysql_close($con);
?>

</td></tr>
</table>
<? include ("bottom.html"); ?>