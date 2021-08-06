<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>여행을 담다, 쑴 일기 아이디/비밀번호 찾기</title>
	<link href="../../css/Mystyle.css" rel="stylesheet">
  </head>
  <body>
	<div id="logopage">
		<a href = "../../main/Fmain.html">
			<img alt='logo' src='../../images/ssum_logo2.png'>
		</a>
	</div>
	<div id="findidpwForm">
		<div id="findid">
			<font size=3><b>사용자 ID 찾기</b>
			<form method=post action=findid.php onsubmit="if(!this.uname.value ||   !this.email.value) return false;">
				<input type=text size=20 name=uname placeholder="이름(실명)" style="height:40px; width:450px;"><br>
				<input type=text size=40 name=email placeholder="e-mail" style="height:40px; width:450px;"><br>
				<input type=submit value="ID 찾기">
			</form>
		</div>
		<div id="findpw">
			<font size=3><b>사용자 비밀번호 찾기</b>
			<form method=post action=findpw.php onsubmit="if(!this.uid.value ||   !this.uname.value || !this.email.value) return false;">
				<input type=text size=20 name=uid placeholder="아이디" style="height:40px; width:450px;"><br>
				<input type=text size=20 name=uname placeholder="이름(실명)" style="height:40px; width:450px;"><br>
				<input type=text size=40 name=email placeholder="e-mail" style="height:40px; width:450px;"><br>
				<input type=submit value="PW 찾기">
			</form>
		</div>
	</div>
  </body>
</html>
 