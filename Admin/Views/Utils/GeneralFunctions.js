
    if (document.addEventListener){
        window.addEventListener('load',SetActiveMenu,false);
    } else {

    }
    
    function UpdateActiveElements(Key, SubKey){
        localStorage['ActiveMenuList'] = 'M'+Key;
        localStorage['ActiveSubmenu'] = Key+"S"+SubKey;
    }
    
    function SetActiveMenu(){
        var DivMenu = document.getElementById(localStorage['ActiveMenuList']);
        if(DivMenu !== null) {
            document.getElementById(localStorage['ActiveMenuList']).classList.add('active');
            $("#"+localStorage['ActiveMenuList']).parent().find('a').removeClass("hidden");
            document.getElementById(localStorage['ActiveSubmenu']).classList.add('active');
        }
    }

/*** Variables globales del proyecto ***/
var PackageId; //Guarda el id del paquete a editar
var PackagesName; //Guarda el nombre del paquete recien creado
var PackagesDescription;//Guarda la descripcion del paquete recien creado
var channels;//Guarda el arreglo de canales incluidos en el paquete recien creado
var StepOneModules;//Guarda el primer formulario de la creacion de modulos
var StepTwoModules;//Guarda el segundo formulario en la creacion de modulos
var ImageArray = [];
var VariableCount;
var idModuleContent = '';
var ModuleLevel = 0;
var type = 'icon';
var ArrayMonth = new Array(); // array para obtener los meses del año
    ArrayMonth[0] = "January";
    ArrayMonth[1] = "February";
    ArrayMonth[2] = "March";
    ArrayMonth[3] = "April";
    ArrayMonth[4] = "May";
    ArrayMonth[5] = "June";
    ArrayMonth[6] = "July";
    ArrayMonth[7] = "August";
    ArrayMonth[8] = "September";
    ArrayMonth[9] = "October";
    ArrayMonth[10] = "November";
    ArrayMonth[11] = "December";
    
var ArrayDay = new Array(); // array para obtener los dias del mes
    ArrayDay[0] = "1";
    ArrayDay[1] = "2";
    ArrayDay[2] = "3";
    ArrayDay[3] = "4";
    ArrayDay[4] = "5";
    ArrayDay[5] = "6";
    ArrayDay[6] = "7";
    ArrayDay[7] = "8";
    ArrayDay[8] = "9";
    ArrayDay[9] = "10";
    ArrayDay[10] = "11";
    ArrayDay[11] = "12";
    ArrayDay[12] = "13";
    ArrayDay[13] = "14";
    ArrayDay[14] = "15";
    ArrayDay[15] = "16";
    ArrayDay[16] = "17";
    ArrayDay[17] = "18";
    ArrayDay[18] = "19";
    ArrayDay[19] = "20";
    ArrayDay[20] = "21";
    ArrayDay[21] = "22";
    ArrayDay[22] = "23";
    ArrayDay[23] = "24";
    ArrayDay[24] = "25";
    ArrayDay[25] = "26";
    ArrayDay[26] = "27";
    ArrayDay[27] = "28";
    ArrayDay[28] = "29";
    ArrayDay[29] = "30";
    ArrayDay[30] = "31";
    
/*** Funciones generales e inicializaciones ***/

$(function () {
    /** Inicializacion de funciones prime UI **/
    /*Puede contener mensajes de advertencias, errores o exito*/
    
    $('#Message').puimessages();
    /* Menu lateral principal */
    $('.Tabs').puitabview();
    $('.TabsS').puitabview();
    $('.TabsStations').puitabview();
    /* Botones para formularios */
    $('.SubmitNext').puibutton({ icon: 'fa-arrow-right', disabled: true }).click(function () { });
    $('.SubmitAccept').puibutton({ icon: 'fa-check' }).click(function () { });
    $('.SubmitSend').puibutton({ icon: 'fa-paper-plane' }).click(function () { });
    $('.SubmitCancel').puibutton({ icon: 'fa-close' }).click(function () { cancelForm(); });
    $('.SubmitCancelSend').puibutton({ icon: 'fa-trash' }).click(function () { cancelForm(); });
    $('.SubmitReturn').puibutton({ icon: 'fa-arrow-left' }).click(function () { });
    $('.Cancel').puibutton({ icon: 'fa-close' });
    $('.CancelTri').puibutton({ icon: 'fa-close' }).click(function () { cancelFormStation(); });
    $('.SubmitAdd').puibutton({ icon: 'fa-plus' });
    $('.SubmitCancelModal').puibutton({ icon: 'fa-close' }).click(function () { cancelModal(); });
    $('.SubmitCancelEditLocationDevice').puibutton({ icon: 'fa-close' }).click(function () { });
    $('.SubmitCancelModalStation').puibutton({ icon: 'fa-close' }).click(function () { cancelModalStation(); });
    $('.SubmitClear').puibutton({ icon: 'fa-refresh' }).click(function () { clearForm(); });
    $('.SubmitClearMessage').puibutton({ icon: 'fa-eraser' }).click(function () { clearForm(); });
    $('.SubmitAdvanced').puibutton({ icon: 'fa-unlock'}).click(function () { });
    $('.SubmitCancelAdvanced').puibutton({ icon: 'fa-lock' }).click(function () { });
    /* Panel */
    $('.PanelStep').puipanel();
    $('.PanelStepM').puipanel();
    $('.TabsS').puitabview('disable', 1);
    $('.TabsS').puitabview('disable', 2);
    $('.TabsS').puitabview('disable', 3);
    $('.Tabs').puitabview('disable', 2);
    $('.Tabs').puitabview('disable', 3);
    $('.Tabs').puitabview('disable', 4);
    $('.TabsStations').puitabview('disable', 2);
    $('.TabsStations').puitabview('disable', 3);
    /** Inicializacion de funciones semantic UI **/
    $('.ui.dropdown').dropdown();
    $('.ui.calendar').calendar({
        ampm: false
    });
    
    $('.ui.calendar.example').calendar({
        type: 'month'
    });
    
    $('.ui.calendar.exampleday').calendar({
        type: 'date'
    });
    
    $('.ui.accordion').accordion();

});

function clearForm(){
    $('form').form('clear');
    $('#Message').puimessages('clear');
    $('li.List').remove();
}

function cancelForm(){
    $('form').form('clear');
    $('#Message').puimessages('clear');
    $('.Tabs').puitabview('select', 0);
    $('.Tabs').puitabview('disable', 2);
    $('li.List').remove();
}
function cancelFormStation(){
    $('form').form('clear');
    $('#Message').puimessages('clear');
    $('.TabsStations').puitabview('select', 0);
    $('.TabsStations').puitabview('disable', 2);
    $('.TabsStations').puitabview('disable', 3);
    $('li.List').remove();
}

function acceptForm(){
    $('form').form('clear');
    $('#Message').puimessages('clear');
    $('.Tabs').puitabview('select', 0);
    $('.Tabs').puitabview('disable', 2);
}

function cancelModal(){
    $('form').form('clear');
    $('#Message').puimessages('clear');
    $('.Tabs').puitabview('select', 0);
    $('.ui.modal').modal('hide');
}
function cancelModalStation(){
    $('form').form('clear');
    $('#Message').puimessages('clear');
    $('.TabsStations').puitabview('select', 0);
    $('.TabsStations').puitabview('disable', 2);
    $('.TabsStations').puitabview('disable', 3);
    $('.ui.modal').modal('hide');
}

/*Funcion para agregar mensajes a footer*/
addMessage = function(severity, msg) {
    $('#Message').puimessages('show', severity, msg);
    setTimeout(function () {
       // $('#Message').slideToggle('hide');
        $('#Message').puimessages('clear');
    },5000);
    clearTimeout($(this));
};

/* Evite que el usuario regrese a index despues de haber iniciado sesion*/
function nobackbutton(){
    window.location.hash="home";
    window.location.hash="home"; //chrome
    window.onhashchange=function(){window.location.hash="home";};
}

//function forceLower(strInput) {
//    strInput.value=strInput.value.toLowerCase();
//};

$(document).ready(function(){
    $("#GlobalFilter").on('change keyup paste',function(){
    $(this).val($(this).val().toLowerCase());
     });
});

/*Codificar y decodificar Base64 con JS*/

var Base64 = {

	// private property
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

	// public method for encoding
	encode : function (input) {
		var output = "";
		var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
		var i = 0;

		input = Base64._utf8_encode(input);

		while (i < input.length) {

			chr1 = input.charCodeAt(i++);
			chr2 = input.charCodeAt(i++);
			chr3 = input.charCodeAt(i++);

			enc1 = chr1 >> 2;
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
			enc4 = chr3 & 63;

			if (isNaN(chr2)) {
				enc3 = enc4 = 64;
			} else if (isNaN(chr3)) {
				enc4 = 64;
			}

			output = output +
			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

		}

		return output;
	},

	// public method for decoding
	decode : function (input) {
		var output = "";
		var chr1, chr2, chr3;
		var enc1, enc2, enc3, enc4;
		var i = 0;

		input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

		while (i < input.length) {

			enc1 = this._keyStr.indexOf(input.charAt(i++));
			enc2 = this._keyStr.indexOf(input.charAt(i++));
			enc3 = this._keyStr.indexOf(input.charAt(i++));
			enc4 = this._keyStr.indexOf(input.charAt(i++));

			chr1 = (enc1 << 2) | (enc2 >> 4);
			chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
			chr3 = ((enc3 & 3) << 6) | enc4;

			output = output + String.fromCharCode(chr1);

			if (enc3 != 64) {
				output = output + String.fromCharCode(chr2);
			}
			if (enc4 != 64) {
				output = output + String.fromCharCode(chr3);
			}

		}

		output = Base64._utf8_decode(output);

		return output;

	},

	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	},

	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;

		while ( i < utftext.length ) {

			c = utftext.charCodeAt(i);

			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}

		}

		return string;
	}

};