// @ts-nocheck
var MenuDate        = document.getElementById('MenuDate'),
    MenuHour        = document.getElementById('MenuHour'),
    ;

$(document).ready(function() {
    initial();
});

function initial(){
    GetWeather();
}

function MenuSelect(Direction){
    switch (Direction) {
        case 'RIGHT':
            console.log(getArrayinX(6));
            break;    
        case 'LEFT':
            alert('LEFT');
            break;
        case 'UP':
            alert('UP');
            break;
        case 'DOWN':
            alert('DOWN');
            break;
    }

}

function MenuRight(){
    MenuSelect('RIGHT');
}

function MenuLeft(){
    MenuSelect('LEFT');
}

function MenuDown(){
    MenuSelect('DOWN');
}

function MenuUp(){
    MenuSelect('UP');
}

//Utilidades
function getArrayinX(lenght) {
    var arreglo = []
    var x = 0;
    for (x = 0; x < lenght; x++) {
        arreglo.push(x)
    }
    return arreglo;
  }