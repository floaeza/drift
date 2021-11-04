// @ts-nocheck
var MenuDate            = document.getElementById('MenuDate'),
    MenuHour            = document.getElementById('MenuHour'),
    MenuList            = document.getElementById('MenuList'),
    MenuListChildren    = MenuList.children;

$(document).ready(function() {
    initial();
});

function initial(){
    GetWeather();
}

function MenuSelect(Direction){
    debugger
    switch (Direction) {
        case 'RIGHT':
            var position = getFocusPosition(MenuListChildren);
            if (position+1 > MenuListChildren.length) {
                MenuListChildren[position].className = 'MenuNodes';
                MenuListChildren[0].className = 'MenuNodes focus';
            } else {
                MenuListChildren[position].className = 'MenuNodes';
                MenuListChildren[position+1].className = 'MenuNodes focus';
            }
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
function getFocusPosition(List){
    var position = -1;
    for (var x = 0; x < List.length; x++) {
        if (List[x].className == 'MenuNodes focus') {
            position = x;
        }
    }
    return position;
}