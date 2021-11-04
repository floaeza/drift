// @ts-nocheck
var MenuDate        = document.getElementById('MenuDate'),
    MenuHour        = document.getElementById('MenuHour');

$(document).ready(function() {
    initial();
});

function initial(){
    GetWeather();
}

function MenuSelect(Direction){
    switch (Direction) {
        case 'RIGHT':
            alert('RIGHT');
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