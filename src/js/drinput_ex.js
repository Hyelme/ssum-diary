

function delRow() {

	tb1.deleteRow(tb1.clickedRowIndex);
	alert(tb1.clickedRowIndex);
}

function inRowLast() {
	
	if(fNum > 5000) {	return false;	}
	else {
		if(document.getElementById) {
			var tbl = document.getElementById("tb1");
		} else {
			var tbl = document.all["tb1"];
		}

		var tRow = tbl.insertRow();

		tRow.onmouseover = function() {
			tb1.clickedRowIndex = this.rowIndex
		}

		
		var uploadOBJ = "<table cellSpacing='5' cellPadding='5' border='0' align='center'>"
		var uploadOBJ += "<tr><td><input type='text' name='test' value='$list[id]'></td></tr>";
		var uploadOBJ = "</table>";

		tRow.insertCell().innerHTML = uploadOBJ;

		fNum++;
	}
}