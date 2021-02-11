/* @Creado por: Fabian Loaeza
 * @Fecha: Febrero 2021
 * @Tipo: Funciones para controlar el layout de peliculas
 */

/*******************************************************************************
 * Variables globales
 *******************************************************************************/
    //Variebles Menu principal
    var MenuHeader              = document.getElementById('MenuOptions'),
        MenuHeaderNodes         = MenuHeader.childNodes,
        MenuHeaderChildren      = MenuHeader.children;
    //Variables focus
    var CurrentFocus            = '';
    //Variables estilos
    var StyleFocusMenuHeader    = 'width: 100px; left: 0px; background-color: rgba(7, 197, 245, 0.88);';
    //Variables de utilidad
    var FolderSource            = '../../vod/mvs/';



/*******************************************************************************
* Carga inicial
*******************************************************************************/
    setTimeout(Init,300);
    function Init(){
       
        CurrentFocus = 'MenuHeader';
        BackgroundPanel.style.backgroundImage = "url('"+FolderSource + "bg/2542.jpg')";
        SetFocusOnMenuHeader('set');
    }

    

/*******************************************************************************
 * Funciones para controlar la navegacion
 *******************************************************************************/

    function VodRight(){
        if (CurrentFocus === 'MenuHeader') {
            SetFocusOnMenuHeader('right');
        }
    }
    
    function VodLeft(){
   
    }
    
    function VodDown(){
    
    }
    
    function VodUp(){
        if (CurrentFocus === 'MenuHeader') {
            SetFocusOnMenuHeader('set');
        }
    }
    
    function VodClose(){
    
    }
    
    function VodOk(){
    
    }
    
    function VodInfo(){
    
    }
/*******************************************************************************
 * Funciones para controlar la navegacion dentro de un panel
 *******************************************************************************/

    function SetFocusOnMenuHeader(Direction){
        if (Direction == 'set') {
        MenuHeaderChildren[0].style = StyleFocusMenuHeader;
        } else if (Direction == 'right') {
            MenuHeader = document.getElementById('MenuOptions');
            MenuHeaderChildren = MenuHeader.children;
            var positionFocus = getPositionFocus(StyleFocusMenuHeader, MenuHeaderChildren);
            MenuHeaderChildren[positionFocus].style = '';
            MenuHeaderChildren[positionFocus+1].style = StyleFocusMenuHeader;
        } else if (Direction == 'left') {

        } else if (Direction == 'down'){

        } else if(Direction == 'up'){

        }
    }
 /*******************************************************************************
 * Utilidades
 *******************************************************************************/
    function getPositionFocus(style, panelNodes){
        var position = -1;
        for (let x = 0; x < panelNodes.length; x++) {
            if (panelNodes[x].style.cssText == style) {
            position=x;
        } 
        }
        return position;
    }

 /*******************************************************************************
 * ##############################################################################
 *******************************************************************************/
