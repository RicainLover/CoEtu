function getXhr()
{
    //alert("patate");
    var xhr = null; 
 
    if(window.XMLHttpRequest){ // Firefox et autres
        xhr = new XMLHttpRequest();
    }
    else if(window.ActiveXObject){ // Internet Explorer 
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    else { // XMLHttpRequest non supporté par le navigateur 
        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
        xhr = false; 
    }
    return xhr;
}

function getInfoContact(i)
{
    var xhr = getXhr();
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            var leselect = xhr.responseText;
            var option = "<div class=\"option\"><a href=\"\">oublier</a></div>";
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('contact').innerHTML = leselect;

            document.getElementById('contact').innerHTML += option;
        }
    }
    xhr.open("POST","../ajax/ajaxContact.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id_etu="+i);
}