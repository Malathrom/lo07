var count = 1;
function addFields() {
    var button = document.getElementById("trigger");
    var container = document.getElementById("container");
    count++;
    document.getElementById('countline').value = count;
    var newdiv = document.createElement("tr");
    newdiv.innerHTML = "<td name=" + "numele" + count + ">" + count + "</td>";
    newdiv.innerHTML += "<input id='numele' name='numele" + count + "' type='hidden' value=" + count + " />"
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "numsem" + count + "></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 80%;'name=" + "label" + count + "></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "sigle" + count + "></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "categorie" + count + "></td>";
    newdiv.innerHTML += "<td><select class='form-control' name='affectation" + count +  "' style='width: 115%'><option>TC</option><option>BR</option><option>TCBR</option><option>FCBR</option></select></td>"
    newdiv.innerHTML += "<td><select class='form-control'name=" + "utt" + count + " style='width: 115%'><option>Y</option><option>N</option></select></td>";
    newdiv.innerHTML += "<td><select class='form-control'name=" + "profil" + count + " style='width: 110%'><option>Y</option><option>N</option></select></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "credit" + count + "></td>";
    newdiv.innerHTML += "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" + "resultat" + count + "></td>";
    container.appendChild(newdiv);
}
