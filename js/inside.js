var isCtrl = false;
var nbreq = 0;

document.onkeyup=function(e){ 
	if(e.which == 27) {
		isCtrl=false; 
	}
}

document.onkeydown=function(e){
	if(e.which == 27) {
		isCtrl=true;
	}
	if(e.which == 27 && isCtrl == true) {
		pop_close()
	}
}

function pop(titre){
	document.getElementById('pop_titre').innerHTML = titre;
	document.getElementById('notif').style.display = "block";
}

function pop_close(){
	document.getElementById('notif').style.display = "none";
}

function loading(){
	nbreq++;
	document.getElementById("loading").style.display = "block";
}

function stop_loading(){
	nbreq--;
	if (nbreq<=0) {
		nbreq = 0;
		document.getElementById("loading").style.display = "none";
	}
}