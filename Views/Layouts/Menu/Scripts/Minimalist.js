// @ts-nocheck
/* @Creado por: Tania Maldonado
 * @Fecha: Enero 2020
 * @Tipo: Controla el menu
 */
var MenuListNodes   = document.getElementById('MenuBar').childNodes;
//MenuSelected    = document.getElementById('MenuSelected'),
//BackgroundsNodes = '';
ImagesUrl       = ServerSource+'Media/Menu/',
FormatDate      = '',
FormatHour      = '',
MenuList        = '',
MenuIndex       = 0,
xhr;

function SetMenuList(){

    xhr = $.ajax({
        type: 'POST',
        cache: false,
        async: false,
        url: ServerSource + 'Core/Controllers/Menu.php',
        data: { 
            Option : 'GetModules',
            ProjectId: '1'
            //ProjectId: Device['Services']['ProjectId']
        },
        success: function (response){
            MenuList = null;
            MenuList = $.parseJSON(response);
            
            
        }
    });
    xhr = null;
    SetMenuInfo();
}
GetWeather();
SetMenuList();
//SetMenuInfo()

function SetMenuInfo(){
    var IndexM = MenuIndex -1,
        Index;

    for(Index = 1; Index < 6; Index+=2){
        //Index++;
        if(MenuIndex == 0 && IndexM < 0){
            IndexM = MenuList.length - 1;
        }else
            if(MenuIndex == 1 && IndexM < 0){
                IndexM = MenuList.length - 1;
            }
        if(IndexM >= MenuList.length){
            IndexM = 0;
        }

        MenuListNodes[Index].textContent = MenuList[IndexM].Name;

        IndexM++;
    }
        IndexM = null;
        Index = null;
}

// function MenuSelect(Direction){

//     (Direction === 'RIGHT') ? MenuIndex++: MenuIndex--;

//     if(MenuIndex > MenuList.length - 1){
//         MenuIndex = 0;
//     } else if(MenuIndex < 0){
//         MenuIndex = MenuList.length - 1;
//     }
//     SetMenuInfo();
// }

/*******************************************************************************
* MOVIMIENTOS FLECHAS EPG
*******************************************************************************/

function MenuOk(){

    if(MenuList[MenuIndex].Url !== 'menu.php'){
        //Page, ModuleId, ChangeModule
        GoPage(MenuList[MenuIndex].Url, MenuList[MenuIndex].Id, MenuList[MenuIndex].Name);
    }
}

function MenuRight(){
    //MenuSelect('RIGHT');
    MenuIndex++;

    if(MenuIndex > MenuList.length - 1){
        MenuIndex = 0;
    } else if(MenuIndex < 0){
        MenuIndex = MenuList.length - 1;
    }
    SetMenuInfo();
}

function MenuLeft(){
    //MenuSelect('LEFT');
    MenuIndex--;

    if(MenuIndex > MenuList.length - 1){
        MenuIndex = 0;
    } else if(MenuIndex < 0){
        MenuIndex = MenuList.length - 1;
    }
    SetMenuInfo();
}

function MenuDown(){

}

function MenuUp(){

}