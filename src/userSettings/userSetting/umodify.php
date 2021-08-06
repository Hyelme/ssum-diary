<meta charset="UTF-8">
<?PHP include ("../../main/top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' align='center' valign='top'>


<?PHP
  
$con = mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb", $con);
	
$result = mysql_query("select * from member where uid='$UserID'", $con);
	
$uname = mysql_result($result, 0, "uname");
$email = mysql_result($result, 0, "email");
$zip = mysql_result($result, 0, "zipcode");
$addr1 = mysql_result($result, 0,  "addr1");
$addr2 = mysql_result($result, 0,  "addr2");
$mphone = mysql_result($result, 0, "mphone");
	
echo ("<HTML html>
		<head>
		<script src='https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js'></script>
		<link href='../../css/common.css' rel='stylesheet'>
		<link href='../../css/rest.css' rel='stylesheet'>
		<script language='Javascript'>
			function sample6_execDaumPostcode() {
			new daum.Postcode({
				oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullAddr = ''; // 최종 주소 변수
                var extraAddr = ''; // 조합형 주소 변수

                // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    fullAddr = data.roadAddress;

                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    fullAddr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                if(data.userSelectedType === 'R'){
                    //법정동명이 있을 경우 추가한다.
                    if(data.bname !== ''){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있을 경우 추가한다.
                    if(data.buildingName !== ''){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('zipcode').value = data.zonecode; //5자리 새우편번호 사용
                document.getElementById('addr1').value = fullAddr;

                // 커서를 상세주소 필드로 이동한다.
                document.getElementById('addr2').focus();
				 }
			}).open();
		}
		</script>
		<style>

		.join {
			margin-top : 50px;
		}

		.joinForm {
			margin-top : 20px;
		}

		.idoverlap img {
			margin-bottom : -14px;
		}

		.zipsearch img {
			margin-bottom : -14px;
		}

		.logo {
			margin-left:20px;
		}

		#addr1, #addr2 {
			margin-top : 4px;
		}
		</style>
	</head>
	<body>

		<div class='content_tit_area clfix first_child no_line'>
			<h2 class='content_tit'>회원정보 수정</h2>
		</div>
		<div class='wrap_tbl_write tb_write'>
			<form class='_article-form' method='post' action='uregister.php'>
				<table>
					<caption>
					회원정보 수정 폼 : 아이디, 이름, 비밀번호, 비밀번호 확인, 휴대전화, 이메일, 집주소
					</caption>
					<colgroup>
						<col style='width : 19%;' />
						<col style='width : 81%;' />
					</colgroup>
					<tbody>
					<tr>
						<th scope='row'>아이디</th>
						<td class='ipt_join'>$UserID</td>
					</tr>
					<tr>
						<th scope='row'>이름</th>
						<td class='ipt_join'>$UserName</td>
					</tr>
					<tr>
						<th scope='row'>비밀번호</th>
						<td class='ipt_join'>
							<input type='password' name=upass1 class='ipt_txt' style='height:50px; width:500px;'>
						</td>
					</tr>
					<tr>
						<th scope='row'>비밀번호확인</th>
						<td class='ipt_join'>
							<input type='password' name=upass2 class='ipt_txt' style='height:50px; width:500px;'>
						</td>
					</tr>
					<tr>
						<th scope='row'>휴대전화</th>
						<td class='ipt_join'>
							<input type='text' name=mphone class='ipt_txt' style='height:50px; width:500px;' value=$mphone>
						</td>
					</tr>
					<tr>
						<th scope='row'>이메일</th>
						<td class='ipt_join'>
							<input type='text' name=email class='ipt_txt' style='height:50px; width:500px;' value=$email>
						</td>
					</tr>
					<tr>
						<th scope='row'>집주소</th>
						<td class='ipt_join'>
							<input type='text' name=zipcode id='zipcode' value='$zipcode' style='height:50px; width:347px;' readonly = readonly><a href='javascript:sample6_execDaumPostcode()'><img src='images/우편번호검색.png' width='150px'></a><br>
							<input type='text' name=addr1 id='addr1' value='$addr1' style='height:50px; width:330px;'>
							<input type='text' name=addr2 id='addr2' value='$addr2' style='height:50px; width:167px;'>
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
		<br><br>
	 </body>
	</html>
");

?>


</td></tr>
</table>
<?PHP include ("../../main/bottom.html");   ?>