function showHint(hint, id) {
	if (id.length == 0) { 
		return;
    } else {
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				// alert(hint);
				fillSelect(hint, this.responseText);
            }
        };
        xmlhttp.open("GET", "hint.php?hint="+hint+"&id=" + id, true);
        xmlhttp.send();
    }
}
function fillSelect(select_id, data) {
	// alert(data);
	var select = document.getElementById(select_id);
	select.innerHTML = "";
	var tmp = JSON.parse(data);
	var res = eval('('+tmp+')');
	for(var t in tmp) {
		var row = res[t];
		var option = document.createElement('option');
		option.value = row.id;
		option.text = row.nom;
		select.appendChild(option);
	}
} 