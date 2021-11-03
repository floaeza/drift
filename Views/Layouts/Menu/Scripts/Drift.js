// @ts-nocheck
var MenuDate        = document.getElementById('MenuDate'),
    MenuHour        = document.getElementById('MenuHour'),
    Title           = document.getElementById('Title')



createMenu();

function createMenu(){
    SetMenuInfo();
}


function SetMenuInfo(){
    Title.innerHTML = 'Hola Mundo';
}