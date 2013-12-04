var nbreq = 0;

setInterval(function(){notif()},5000);

function trysearch(){
	if (document.getElementById("recherche")) {
		recherche();
	}
	else {
		document.getElementById('form_search').submit();
	}
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
