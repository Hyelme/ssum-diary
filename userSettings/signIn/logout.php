<?php
ob_start() ;
?>
<meta charset="utf-8">
<?PHP
  
// $con = mysql_connect("localhost","hyelme","pw4hyelme");
//mysql_select_db("hyelmedb",$con);
	
// mysql_query("delete from shoppingbag where id='$UserID'", $con);
// mysql_close($con);
	
 SetCookie("UserID", "", time());
 SetCookie("UserName", "", time());

// SetCookie("Session", "", time());
	 
echo ("<meta http-equiv='Refresh' content='0; url=Fmain.html'>");

?>
