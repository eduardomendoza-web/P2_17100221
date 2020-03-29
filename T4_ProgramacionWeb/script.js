function calcularSerie(number1, number2, cantidad) {
    var res = "Los " + cantidad + " términos de la serie son:\n" + number1 +"\n" + number2;
    var x = 0;
    do {
        var termino = number1 + number2;
        number1 = number2;
        number2 = termino;
        res = res + "\n" + termino;  
        x++; 
    }
    while (x < cantidad - 2)
    document.getElementById("serie").value = res;
    return;
}

function limpiarFormularios() {
    document.getElementById("valor1").value = '';
    document.getElementById("valor2").value = '';
    document.getElementById("cantidad").value = '';    
    document.getElementById("serie").value = '';
}