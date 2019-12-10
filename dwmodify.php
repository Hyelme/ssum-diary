<meta charset="UTF-8">
<? include ("top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' valign='top'>

<?PHP
$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result = mysql_query("select * from diarycover where dname='$dname'",$con);
$result2 = mysql_query("select * from diary where id=$id and dname='$dname'",$con);

$tdate1 = mysql_result($result, 0, "tdate1");
$tdate2 = mysql_result($result, 0, "tdate2");
$sdate = mysql_result($result2, 0, "sdate");
$content = mysql_result($result2, 0, "content");

echo("<html>
		<head>
		<title>다이어리 글 수정</title>
		<link href='css/common.css' rel='stylesheet'>
		<link href='css/rest.css' rel='stylesheet'>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js'></script> 
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js'></script> 
		<link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css' rel='stylesheet'> 


		<style>
		#datepicker {
			border:none;
		}

		.datepick img{
			float:left;
			width:23px;
			margin-top:8px;
			margin-right:5px;
		}

		.datepick input {
			float:left;
			height:25px;
			margin-top:10px;
			font-size:18px; 
			font-weight:400;
		}
		
		#dday {
			border:none;
			float:right;
			font-size:20px; 
			width: 80px; 
			height:30px;
		}

		::-ms-clear { display: none; }

		</style>
		</head>
		<body onmouseover='dday()' onchange='dday()'>
		 <div class='content_tit_area clfix first_child no_line'>
			<h2 class='content_tit'>다이어리 글 수정</h2>
		 </div>
		 <div class='wrap_tbl_write tb_write'>
			<form method='post' action='dwmprocess.php?dname=$dname&id=$id' class='_article-form'>
			<table>
				<caption>
					다이어리 글 입력 폼 : 디데이, 날짜, 내용
				</caption>
				<colgroup>
				<col style='width : 14%;' />
				<col style='width : 86%;' />
				</colgroup>
				<tbody>
					<tr>
						<th scope='row'><font size=4>Day</font>&nbsp;<input name='dday' id='dday' style='margin-top:-4px;'></th>
						<td scope='row' class='datepick'>
							<img src='images/calender-s.png'><input name='sdate' id='datepicker' readonly=readonly onfocus='this.blur()'>
						</td>
					</tr>
						<script type='text/javascript'>

						$(function() {
							$('#datepicker').datepicker({
								dateFormat: 'yy-mm-dd',
								minDate: new Date('");
								echo $tdate1;
								echo("'),
								maxDate: new Date('");
								echo $tdate2;
								echo ("'),
								defaultDate: new Date('");
								echo $sdate;
								echo ("')
							})

							var d = new Date('");
							echo $sdate;
							echo ("');
							$('#datepicker').datepicker( 'setDate' , d );

						});

						</script>

						<script type='text/javascript'>

						function dday() {
							var targetdate = '");
							echo $tdate1;
							echo ("';
							var currentdate = document.getElementById('datepicker').value;
							var arr1 = targetdate.split('-');
							var arr2 = currentdate.split('-');
							var dat1 = new Date(arr1[0], arr1[1], arr1[2]);
							var dat2 = new Date(arr2[0], arr2[1], arr2[2]);
							var diff = dat2 - dat1;
							var dDay = 24 * 60 * 60 * 1000;

							var a = document.getElementById('dday');
							var b = (parseInt(diff/dDay)+1);
							
							a.value = b;
						}
						window.onload=dday();
						</script>
					<tr>
						<td colspan=2>
							<div class='bx_textarea_first' style='margin-left:15px;'>
								<div class='fr-box fr-ltr jtbc-theme fr-basic fr-top'>
								<div class='fr-wrapper' dir='ltr'>
								</div>
							</div>
							<textarea name='content' class='_editor-required _article-content' style='height: 500px; ' data-required='내용을 입력해주세요.'>$content</textarea>
						</td>
					</tr>
				</tbody>
			</table>
			<div class='btn_area right'>
				<input type='button' class='btns board_white _article-confirm-list' onclick='history.back()' value='취소'><em class='ico_cancel'></em>
				<input type='submit' class='btns board gray _article-post' value='등록'><em class='ico_regi'></em>
			</div>
			<br><br>
			</form>
		</div>
		</body>
	  </html>
"); 

?>
</td></tr>
</table>
<? include ("bottom.html");?>