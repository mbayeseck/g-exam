 function showInput() {
        if ($('#natureIdees :selected').hasClass('non')) {
            document.getElementById("natureAutreIdees").style.visibility = "visible";
        }
        else {
            document.getElementById("natureAutreIdees").style.visibility = "hidden";
        }
 }

 function afficher_cacher(id) {
     if (document.getElementById(id).style.visibility == "hidden") {
         document.getElementById(id).style.visibility = "visible";
         document.getElementById('natureAutreIdees').innerHTML = 'Cacher le texte';
     }
     else {
         document.getElementById(id).style.visibility = "hidden";
         document.getElementById('bouton_' + id).innerHTML = 'Afficher le texte';
     }
     return true;
 }