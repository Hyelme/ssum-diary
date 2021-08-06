<meta charset="UTF-8">
<? include ("../../../main/top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' valign='top'>
<?PHP
echo("<html>
		<head>
		<title>Diary Cover 등록</title>
		<link href='../../../css/common.css' rel='stylesheet'>
		<link href='../../../css/rest.css' rel='stylesheet'>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js'></script> 
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js'></script> 
		<link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css' rel='stylesheet'> 
		    
		<link rel='stylesheet' type='text/css' href='../../../css/spectrum.css'>
		<link rel='stylesheet' type='text/css' href='../../../ccs/docs.css'>
		<script type='text/javascript' src='../../../js/spectrum.js'></script>

		<style>
	
		::-ms-clear { display: none; }

		</style>
		</head>
		<body>
		 <div class='content_tit_area clfix first_child no_line'>
			<h2 class='content_tit'>Diary 만들기</h2>
		 </div>
		 <div class='wrap_tbl_write tb_write'>
			<form method='post' action='dcprocess.php?' enctype='multipart/form-data' class='_article-form'>
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
							<input type='text' name=dname title='다이어리 제목' class='ipt_txt' style='width: 500px; height:30px;' placeholder='다이어리 제목을 입력해주세요' /><h1 class='warning_txt'>(한 번 등록한 다이어리 제목은 바꿀 수 없으니 신중하게 정하시길 바랍니다.)</h1>
						</td>
					</tr>
					<tr>
					<th scope='row'>작성자</th>
					<td class='ipt_join'>
						<input name='writer' class='ipt_txt' style='width: 271px; height : 30px;' type='text' readonly='readonly' value= '");
						echo ($UserName);	echo("'>
					</td>
					</tr>
					<tr>
						<th scope='row'>나라-지역</th>
						<td>
							<input type='text' name=country1 title='다녀온 국가' class='ipt_txt _article-title' style='width: 247px; height:30px;' placeholder='방문한 국가를 입력해주세요' />
							<input type='text' name=country2 title='다녀온 지역' class='ipt_txt _article-title' style='width: 248px; height:30px;' placeholder='방문한 지역를 입력해주세요' />
						</td>
					</tr>
					<tr>
						<th scope='row'>기간</th>
						<td>
							<input name=tdate1 id='datepicker1' class='ipt_txt' readonly onfocus='this.blur()' style='width: 100px; height:30px;'> - <input name=tdate2 id='datepicker2' class='ipt_txt' readonly onfocus='this.blur()' style=' width: 100px; height:30px;'>
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
							<input type='file' name=coverfile maxlength = 80 style='width: 500px; height:30px;'>
						</td>
						</th>
					</tr>
					<tr>
						<th scope='row'>표지색상</th>
						<td>
							<input type='color' id=covercolor name='covercolor' class='ipt_txt style='height:30px;' value='#f00'>
							<em id='basic-log'></em>

						</td>
						</th>
					</tr>
				</tbody>
			</table>
				<div class='btn_area right'>
					<input type='submit' class='btns board gray _article-post' value='추가'><em class='ico_regi'></em>
					<input type='button' class='btns board_white _article-confirm-list' onclick='history.back()' value='취소'><em class='ico_cancel'></em>
				</div>
			</form>
		</div>
		</body>
	  </html>");
?>
</td></tr>
</table>
<? include ("../../../main/bottom.html");?>