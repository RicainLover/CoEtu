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

//window.onload=function(){
//	document.getElementsByTagName('body')[0].innerHTML += "<div id='pop' style='display:none;' ><div><h3><span id='pop_titre'></span><a href='#' onclick='pop_close()'><img src='../img/close.png' style='height:17px;'/></a></h3><div id='pop_cont'></div></div></div>";
//}

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