// 클릭된 셀을 찾아서 반환합니다.

// 인덱스로 찾지 않아도 되므로 소스가 복잡해지지 않습니다.
function getObj() {
   var obj = event.srcElement
   while (obj.tagName != 'TD') obj = obj.parentElement
   return obj
}

// 클릭된 셀의 오른쪽에 로우 수만큼 셀을 넣습니다.

function inCol() {
   var obj = getObj()
   var r = tbl.rows

   for (var i = 0; i < r.length; i++) {
      var c = r(i).insertCell(obj.cellIndex + 1)
      if (i == 0)
         c.innerHTML = "<input type=button onclick='dlCol()' value='-'>"
     
   }
}

// 클릭된 셀의 아래쪽에 로우를 추가하고 셀 수만큼 넣습니다.
function inRow() {
   var a = tbl.rows.length;
   var idx = getObj().parentElement.rowIndex + a
   var r = tbl.insertRow(idx)
   for (var i = 0; i < tbl.rows[0].cells.length; i++) {
      var c = tbl.rows[idx].insertCell(i)
      if (i == 0) {
		  c.innerHTML = "<table class='addRoute' border='0'><tr align='center'><td align='center'>▼</td></tr><tr><td><input type='text' name='route"+a+"' class='addRouteInput'></td></tr></table>";
      }a++;
   }
}

// 클릭된 셀이 위치한 로우의 셀들을 삭제합니다.
function dlRow() {
   //var idx = getObj().parentElement.rowIndex;
	if(tbl.rows.length > 1){
		tbl.deleteRow(tbl.rows.length-1);
	}
}


// 클릭된 셀이 위치한 셀들을 삭제합니다.
function dlCol() {
   var idx = getObj().cellIndex
   for (var i = 0; i < tbl.rows.length; i++) {
      tbl.rows(i).deleteCell(idx)
   }
}