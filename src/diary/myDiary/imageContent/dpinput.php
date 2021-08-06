<meta charset="utf-8">
<? include ("../../../main/top.html"); ?>
<table border='0' width='95%' align='center'>
<tr height='70'></tr>
<tr height='600'>
<td width='90%' align='center' valign='top'>

<?PHP

$con =   mysql_connect("localhost","hyelme","pw4hyelme");
mysql_select_db("hyelmedb",$con);

$result = mysql_query("select * from diarycover where dname='$dname'",$con);

$tdate1 = mysql_result($result, 0, "tdate1");
$tdate2 = mysql_result($result, 0, "tdate2");

	
echo("
		<html>
		<head>
		<title>Diary 사진 추가</title>
		<link href='../../../css/common.css' rel='stylesheet'>
		<link href='../../../css/rest.css' rel='stylesheet'>
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
			<h2 class='content_tit'>다이어리 사진 추가</h2>
		 </div>
		 <div class='wrap_tbl_write tb_write'>
			<form method='post' action='dpprocess.php?dname=$dname' class='_article-form' enctype='multipart/form-data'>
			<table>
				<caption>
					다이어리 경로 입력 폼 : 디데이, 날짜, 경로
				</caption>
				<colgroup>
				<col style='width : 14%;' />
				<col style='width : 86%;' />
				</colgroup>
				<tbody>
					<tr>
						<th scope='row'><font size=4>Day</font>&nbsp;<input name='dday' id='dday' style='margin-top:-4px;'></th>
						<td scope='row' class='datepick'>
							<img src='../../../images/calender-s.png'><input name='sdate' id='datepicker' readonly=readonly onfocus='this.blur()'>
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
								echo $tdate1;
								echo ("')
							})

							var d = new Date('");
							echo $tdate1;
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
							<th scope='row'>첨부파일</th>
							<td>
								<input type='file' name='userfile' class='ipt_txt' style='height : 30px; width: 400px; '>
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
<? include ("../../../main/bottom.html"); ?>