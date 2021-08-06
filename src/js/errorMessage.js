<%
  String memid = (String)session.getAttribute("$UserID");
%>

 function idCheck(memid, currentPage){
  if(memid == "null"){
   alert("로그인 후 사용가능한 서비스 입니다.");
   location.href="../login.html";
  }
  else{
   location.href="../board/freeboard/input.php";
  }
 }