<? include ('top.html'); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' align='center' valign='top'>

<?PHP
	if (!isset($UserID)) {
		echo ("<script>
		window.alert('로그인 사용자만 이용하실 수 있어요')
		history.go(-1)
		</script>");
		exit;
	}

echo("
<HTML html>
<head>
<title>게시판 입력 폼</title>
  <link href='css/common.css' rel='stylesheet'>
  <link href='css/rest.css' rel='stylesheet'>
 </head>
 <body>
 <div class='content_tit_area clfix first_child no_line'>
 <h2 class='content_tit'>자유게시판</h2>
 </div>
  <div class='wrap_tbl_write tb_write'>
	<form class='_article-form' method='post' action='process.php?board=$board'>
		<table>
			<caption>
			자유게시판 입력 폼 : 작성자, 제목, 첨부, 사진첨부, 내용
			</caption>
			<colgroup>
				<col style='width : 19%;' />
				<col style='width : 81%;' />
			</colgroup>
			<tbody>
				<tr>
					<th scope='row'>작성자</th>
					<td class='ipt_join'>
						<input name='nickname' title='작성자 계정' class='ipt_txt' style='width: 271px;' type='text' readonly='readonly' value= '");
						$UserName;	echo("' />
					</td>
				</tr>
				<tr>
					<th scope='row'>제목</th>
					<td>
						<input name='title' title='제목' class='ipt_txt _article-title' style='width: 684px;' type='text' placeholder='제목을 입력해주세요' data-exception='제목은 50글자를 초과할 수 없습니다.' data-required='제목을 입력해주세요.' data-maxlength='50'>
					</td>
				</tr>
				<tr>
					<th scope='row'>내용</th>
					<td>
						<div class='bx_textarea_first'>
							<div class='fr-box fr-ltr jtbc-theme fr-basic fr-top'>
							<div class='fr-wrapper' dir='ltr'>
								<div class='fr-element fr-view' style='min-height: 193px;' dir='ltr' contenteditable='true' spellcheck='true'></div>
							</div>
						</div>
						<textarea name='content' title='내용' class='_editor-required _article-content' style='height: 193px; display: none; visibility: hidden;' data-required='내용을 입력해주세요.'></textarea>
					</td>
				</tr>
			</tbody>
		</table>
	<div class='tbl_info_txt'>
		<p class='bl_lgray_dot'>저작권 등 타인의 권리를 침해하거나 명예를 훼손하는 게시물은 관련법률에 의해 제재받을 수 있으며, 게시판운영원칙에 따라 임의 삭제될 수 있습니다.</p>
	</div>
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

<? include ("bottom.html"); ?>