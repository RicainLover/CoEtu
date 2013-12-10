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

function test()
{
    alert("patate de test");
}

function notif(){
    var xhr = getXhr();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            if (parseInt(xhr.responseText)>0) {
                document.getElementById("notif_img").src = "../img/bell.gif";
            }
            else {
                document.getElementById("notif_img").src = "../img/bell.png";
            }
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/nbnotif.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send();    
}

function voyage(id,nom){
    pop_title(nom);
    var xhr = getXhr();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            pop_set_x(750);
            pop_set_y(500);
            pop_content(xhr.responseText);
            pop_show();
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/voyage.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id=" + id);    
}

function recherche(){
    var r = document.getElementById('rh').value;
    var xhr = getXhr();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('recherche').innerHTML = xhr.responseText;
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/recherche.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("r=" + r);
}

function peronneInfo(id,nom){
    pop_title(nom);
    var xhr = getXhr();
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            pop_content(xhr.responseText);
            pop_show();
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/personneinfon.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id=" + id);
}

function getNewVoyageForm(){
    pop_title("Nouveau voyage");
    var xhr = getXhr();
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            pop_content(xhr.responseText);
            pop_show();
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/voyageform.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send();
}

function getNotification(){
    pop_title("Notifications");
    var xhr = getXhr();
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            pop_content(xhr.responseText);
            pop_show();
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/notif.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send();
}

function getNewMsg(id){
    if (id==-1) {
        return;
    }
    loading();
    var xhr = getXhr();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            if (xhr.responseText!="") {
                document.getElementById('scrollpane').innerHTML += xhr.responseText;
                document.getElementById('scrollpane').scrollTop = document.getElementById('scrollpane').scrollHeight;
            }
            stop_loading();
        }
    }
    xhr.open("POST","../ajax/getNewMsg.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id="+id);
}

function getConversation(selected){
    loading();
    var xhr = getXhr();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('liste').innerHTML = xhr.responseText;
            stop_loading();
        }
    }
    xhr.open("POST","../ajax/allConversation.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("selected="+selected);
}

function sendMsg(id){
    if (id==-1) {
        return;
    }
    var msg = document.getElementById('buffer').value;
    if (msg=="" || msg==" ") {
        return;
    }
    loading();
    var xhr = getXhr();
    document.getElementById('buffer').value = "";
    document.getElementById('scrollpane').innerHTML += "<div class='msg' ><span class='perso'>vous <span class='char'>></span></span><span class='dire'> " + msg + "</span></div>";
    document.getElementById('scrollpane').scrollTop = document.getElementById('scrollpane').scrollHeight;
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            stop_loading();
        }
    }
    xhr.open("POST","../ajax/newMsg.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id="+id+"&msg="+msg);
}

function openConversation(id){
    if (id<0) {
        return;
    }
    current = id;
    loading();
    var selct = document.getElementsByClassName("selected");
    if (selct.length>0) {
        selct[0].setAttribute("class","");
    };
    if (document.getElementById("c" + id)) {
        document.getElementById("c" + id).setAttribute("class","selected");
    };
    var xhr = getXhr();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            if (xhr.responseText!="") {
                document.getElementById('conversation').innerHTML = xhr.responseText;
                if (document.getElementById('scrollpane')) {
                    document.getElementById('scrollpane').scrollTop = document.getElementById('scrollpane').scrollHeight;
                }
            }
            stop_loading();
            document.getElementById('buffer').focus();
        }
    }
    xhr.open("POST","../ajax/openConversation.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id="+id);
}

function getInfoContact(i){
    if (i<0) {
        return;
    };
    current = i;
    var selct = document.getElementsByClassName("selected");
    if (selct.length>0) {
        selct[0].setAttribute("class","");
    };
    if (document.getElementById("c" + i)) {
        document.getElementById("c" + i).setAttribute("class","selected");
    };
    var xhr = getXhr();
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            var leselect = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('contact').innerHTML = leselect;
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/ajaxContact.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id_etu="+i);
}

function getContacts(current){
    var xhr = getXhr();
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            var listecontact = xhr.responseText;
            document.getElementById('liste').innerHTML = listecontact;
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/getContacts.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id="+current);
}

function supprContact(i){
    var xhr = getXhr();
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('contact').innerHTML = "";
            getContacts();
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/supprContact.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id_contact="+i);
}

function faireDemandeAmis(i)
{
    var xhr = getXhr();
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById("buttonAdd").remove();
            document.getElementById("textAdd").innerHTML="Demande de contact envoyé.";
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/demandeAmi.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id_contact="+i);
}

function acceptRequest(i)
{
    var xhr = getXhr();
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            notif();
            document.getElementById("r"+i).remove();
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/accepteContact.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id_contact="+i);
}

function deleteRequest(i)
{
    var xhr = getXhr();
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            notif();
            document.getElementById("r"+i).remove();
            stop_loading();
        }
    }
    loading();
    xhr.open("POST","../ajax/refuseContact.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send("id_contact="+i);
}

