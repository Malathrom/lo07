var count = 1;
function addFields() {
    var button = document.getElementById("trigger");
    var container = document.getElementById("container");
    count++;

    var newdiv = document.createElement("tr");
    newdiv.innerHTML = "<td name="+"numele"+count +">" + count + "</td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "numsem" + count + "></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 80%;'name=" + "label" + count + "></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "sigle" + count + "></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "categorie" + count + "></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "affectation" + count + "></td>";
    newdiv.innerHTML += "<td><select class='form-control'name=" + "utt" + count + " style='width: 115%'><option>Oui</option><option>Non</option></select></td>";
    newdiv.innerHTML += "<td><select class='form-control'name=" + "profil" + count + " style='width: 110%'><option>Oui</option><option>Non</option></select></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "credit" + count + "></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "resultat" + count + "></td>";
    container.appendChild(newdiv);
}