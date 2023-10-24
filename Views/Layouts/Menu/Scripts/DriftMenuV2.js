// @ts-nocheck
var MenuList            = document.getElementById('MenuList'),
    MenuListChildren    = MenuList.children;

$(document).ready(function() {
    initial();
});

function initial(){
    GetWeather();
}

function MenuSelect(Direction){
    switch (Direction) {
        case 'RIGHT':
            var position = getFocusPosition(MenuListChildren);
            if (position+1 > MenuListChildren.length-1) {
                MenuListChildren[position].className = 'col';
                MenuListChildren[0].className = 'col focus';
            } else {
                MenuListChildren[position].className = 'col';
                MenuListChildren[position+1].className = 'col focus';
            }
            break;    
        case 'LEFT':
            var position = getFocusPosition(MenuListChildren);
            if (position-1 < 0) {
                MenuListChildren[position].className = 'col';
                MenuListChildren[MenuListChildren.length-1].className = 'col focus';
            } else {
                MenuListChildren[position].className = 'col';
                MenuListChildren[position-1].className = 'col focus';
            }
            break;
        case 'UP':
            var position = getFocusPosition(MenuListChildren);
            if (position-1 < 0) {
                MenuListChildren[position].className = 'col';
                MenuListChildren[MenuListChildren.length-1].className = 'col focus';
            } else {
                MenuListChildren[position].className = 'col';
                MenuListChildren[position-1].className = 'col focus';
            }
            break;
        case 'DOWN':
            var position = getFocusPosition(MenuListChildren);
            if (position+1 > MenuListChildren.length-1) {
                MenuListChildren[position].className = 'col';
                MenuListChildren[0].className = 'col focus';
            } else {
                MenuListChildren[position].className = 'col';
                MenuListChildren[position+1].className = 'col focus';
            }
            break;
        case 'ENTER':
            var position = getFocusPosition(MenuListChildren),
                text     = MenuListChildren[position].children[0].innerHTML;
            if (text == 'LIVE TV') {
                GoPage('tv.php', '1', 'Tv');
            }else if(text == 'KITCHEN + MEZCAL BAR'){
                GoPage('content.php', '11', 'Kitchen');
            }else if (text == 'POOL') {
                GoPage('content.php', '15', 'Pool');
            }else if (text == 'YOGA') {
                GoPage('content.php', '12', 'Yoga');
            }else if (text == 'SURF') {
                GoPage('content.php', '13', 'Surf');
            }else if (text == 'CONTACT') {
                GoPage('content.php', '14', 'Contact');
            }
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
function MenuOk(){
    MenuSelect('ENTER');
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
        if (List[x].classList.contains('focus')) {
            position = x;
        }
    }
    return position;
}