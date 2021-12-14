window.addEventListener("load", function(){

    //DESORDENO LOS VALORES Y LOS METO EN LAS CELDAS
    var valoresDisorder=desordenar(valoresOrder);

    for(i=0; i<celdas.length; i++){
        celdas[i].innerHTML=valoresDisorder[i];
    }

    //ONCLICKS DE CADA CELDA
    celdas[0].onclick=function(){
        if(celdas[1].innerHTML==""){
            celdas[1].innerHTML=celdas[0].innerHTML;
            celdas[0].innerHTML="";
        } else if (celdas[4].innerHTML==""){
            celdas[4].innerHTML=celdas[0].innerHTML;
            celdas[0].innerHTML="";
        }
    }

    celdas[1].onclick=function(){
        if(celdas[0].innerHTML==""){
            celdas[0].innerHTML=celdas[1].innerHTML;
            celdas[1].innerHTML="";
        } else if (celdas[2].innerHTML==""){
            celdas[2].innerHTML=celdas[1].innerHTML;
            celdas[1].innerHTML="";
        } else if(celdas[5].innerHTML==""){
            celdas[5].innerHTML=celdas[1].innerHTML;
            celdas[1].innerHTML="";
        }
    }

    celdas[2].onclick=function(){
        if(celdas[1].innerHTML==""){
            celdas[1].innerHTML=celdas[2].innerHTML;
            celdas[2].innerHTML="";
        } else if (celdas[3].innerHTML==""){
            celdas[3].innerHTML=celdas[2].innerHTML;
            celdas[2].innerHTML="";
        } else if(celdas[6].innerHTML==""){
            celdas[6].innerHTML=celdas[2].innerHTML;
            celdas[2].innerHTML="";
        }
    }

//    this.document.getElementsByTagName("tr").onclick=function(){
//        celdas[0].innerHTML="prueba";
//    }


})

//METODOS GENERALES
//DEVUELVE TRUE SI LOS INNERHTMLS DEL ARRAY ESTÁN ORDENADOS
function estaOrdenado(a){
    var result=true;

    for(i=0; i<a.length; i++){

        if(a[i]!=i){
            result=false;
            break;
        }
    }

    return result;
}

function pintarExamen(a){
    var codigoExamen="";

    for(let i=0; i<preguntas.length; i++){
        codigoExamen = codigoExamen;
    }

    return codigoExamen;

}