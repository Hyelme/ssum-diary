<meta charset="utf-8">
<? include ("top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' align='center' valign='top'>

<?PHP
	if ($UserID != "admin") {
		echo   ("<script>
			window.alert('관리자만 이용 가능한 서비스 입니다.');
			history.go(-1);
			</script>");
		exit;
	}

echo("
<HTML html>
<head>
<title>공지사항 입력 폼</title>
  <link href='css/common.css' rel='stylesheet'>
  <link href='css/rest.css' rel='stylesheet'>
 </head>
 <body>
 <div class='content_tit_area clfix first_child no_line'>
 <h2 class='content_tit'>공지사항</h2>
 </div>
  <div class='wrap_tbl_write tb_write'>
	<form class='_article-form' method='post' action='ntprocess.php?board=notice'>
		<table>
			<caption>
			공지사항 입력 폼 : 작성자, 제목, 내용
			</caption>
			<colgroup>
				<col style='width : 19%;' />
				<col style='width : 81%;' />
			</colgroup>
			<tbody>
				<tr>
					<th scope='row'>작성자</th>
					<td class='ipt_join'>
						<input id='writer' name='writer' title='작성자 계정' class='ipt_txt' style='width: 271px;' type='text' readonly='readonly' value= '");
						echo ($UserName);	echo("' />
					</td>
				</tr>
				<tr>
					<th scope='row'>제목</th>
					<td>
						<input name='topic' title='제목' class='ipt_txt _article-title' style='width: 684px;' type='text' placeholder='제목을 입력해주세요' data-maxlength='50'>
					</td>
				</tr>
				<tr>
					<th scope='row'>내용</th>
					<td>
						<div class='bx_textarea_first'>
							<div class='fr-box fr-ltr jtbc-theme fr-basic fr-top'>
							<div class='fr-wrapper' dir='ltr'>
							</div>
						</div>
						<textarea name='content' class='_editor-required _article-content' style='height: 193px; ' data-required='내용을 입력해주세요.'></textarea>
					</td>
				</tr>
			</tbody>
		</table>
	<div class='btn_area right'>
		<input type='button' class='btns board_white _article-confirm-list' onclick='history.back()' value='취소'><em class='ico_cancel'></em>
		<input type='submit' class='btns board gray _article-post' value='등록'><em class='ico_regi'></em>
	</div>
	</form>
  </div>
 </body>
</html>
");
?>

</td></tr>
</table>
<? include ("bottom.html"); ?>