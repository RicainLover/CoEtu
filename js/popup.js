var isEsc = false;

document.onkeyup=function(e){ 
	if(e.which == 27) {
		isEsc=false; 
	}
}

document.onkeydown=function(e){
	if(e.which == 27) {
		isEsc=true;
	}
	if(e.which == 27 && isEsc == true) {
		pop_close();
	}
}

function pop_show(){
	document.getElementById('pop').style.display = "block";
}

function pop_close(){
	document.getElementById('pop').style.display = "none";
}

function pop_title(title){
	document.getElementById('pop_titre').innerHTML = title;
}

function pop_content(cont){
	document.getElementById('pop_cont').innerHTML = cont;
}