<%
  String memid = (String)session.getAttribute("$UserID");
%>

 function idCheck(memid, currentPage){
  if(memid == "null"){
   alert("�α��� �� ��밡���� ���� �Դϴ�.");
   location.href="../login.html";
  }
  else{
   location.href="../board/freeboard/input.php";
  }
 }