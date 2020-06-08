function busquedaAutor(){
    var codAutor = document.getElementById("buscar").value;
    console.log("Aquii");
    if (codAutor == "") {
        console.log("Aquii3");
        codAutor.getElementById("informacion").innerHTML = "";
        } else {
        if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
    
        document.getElementById("informacion").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET","../controlador/busquedaAutor.php?codAutor="+codAutor,true);
        xmlhttp.send();
        }
        return false;   
}