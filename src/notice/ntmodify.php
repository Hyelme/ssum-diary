<meta charset="utf-8">
<? include ("../main/top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' align='center' valign='top'>


<?PHP


if (!isset($UserID)) {
		echo ("<script>
		window.alert('로그인 후 이용 가능한 서비스 입니다.')
		location.href='../userSettings/signIn/login.html';
		</script>");
		exit;
	}


$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result=mysql_query("select * from notice where id=$id",$con);

// 수정하고자 하는 원본 게시물에서 수정 가능한 항목을 추출함
$writer=mysql_result($result,0,"writer");
$topic=mysql_result($result,0,"topic");
$content=mysql_result($result,0,"content");
	

echo("
<HTML html>
<head>
<title>공지사항 수정 폼</title>
  <link href='../css/common.css' rel='stylesheet'>
  <link href='../css/rest.css' rel='stylesheet'>
 </head>
 <body>
 <div class='content_tit_area clfix first_child no_line'>
 <h2 class='content_tit'>공지사항</h2>
 </div>
  <div class='wrap_tbl_write tb_write'>
	<form class='_article-form' method='POST' action='ntmprocess.php?board=notice&id=$id'>
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
						<input name='topic' title='제목' class='ipt_txt _article-title' style='width: 684px;' type='text' placeholder='제목을 입력해주세요' data-maxlength='50' value='$topic'>
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
						<textarea name='content' class='_editor-required _article-content' style='height: 193px; ' data-required='내용을 입력해주세요.'>$content</textarea>
					</td>
				</tr>
			</tbody>
		</table>
	<div class='btn_area right'>
		<input type='button' class='btns board_white _article-confirm-list' onclick='history.go(-2)' value='취소'><em class='ico_cancel'></em>
		<input type='submit' class='btns board gray _article-post' value='수정완료'><em class='ico_regi'></em>
	</div>
	</form>
  </div>
 </body>
</html>
");

mysql_close($con);
?>

</td></tr>
</table>
<? include ("../main/bottom.html"); ?>