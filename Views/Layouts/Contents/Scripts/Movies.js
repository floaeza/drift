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
    //json
    var MoviesList              = [];
/*******************************************************************************
* Carga inicial
*******************************************************************************/
function Init(){ 
    BackgroundPanel.style.backgroundImage = "url('"+FolderSource + "bg/2542.jpg')";
    CurrentFocus = 'MenuHeader';
    SetFocusOnMenuHeader('set');
    GetMoviesList();
    setAllMovies();
}

setTimeout(Init,300);

/*******************************************************************************
 * Peticiones
 *******************************************************************************/

//Lista de peliculas sin ningun filtro
function GetMoviesList(){
    $.ajax({
    type: 'POST',
    async: false,
    url: 'Core/Controllers/VideoOnDemand.php',
    data: { 
    Option : 'GetMoviesList'
    },
    success: function (response){
    MoviesList = $.parseJSON(response);
    }
    }); 
    }
/*******************************************************************************
 * Funciones para controlar la navegacion
 *******************************************************************************/

function VodRight(){

}

function VodLeft(){

}

function VodDown(){
    if (CurrentFocus === 'MenuHeader') {
        SetFocusOnMenuHeader('down');
    }
}

function VodUp(){
    if (CurrentFocus === 'MenuHeader') {
        SetFocusOnMenuHeader('up');
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

    } else if (Direction == 'left') {
       
    } else if (Direction == 'down'){
        MenuHeader = document.getElementById('MenuOptions');
        MenuHeaderChildren = MenuHeader.children;
        var positionFocus = getPositionFocus(StyleFocusMenuHeader, MenuHeaderChildren);
        if (positionFocus+1 >= MenuHeaderChildren.length) {
            MenuHeaderChildren[positionFocus].style = '';
            MenuHeaderChildren[0].style = StyleFocusMenuHeader;
        }else{
            MenuHeaderChildren[positionFocus].style = '';
            MenuHeaderChildren[positionFocus+1].style = StyleFocusMenuHeader;
        }
    } else if(Direction == 'up'){
        MenuHeader = document.getElementById('MenuOptions');
        MenuHeaderChildren = MenuHeader.children;
        var positionFocus = getPositionFocus(StyleFocusMenuHeader, MenuHeaderChildren);
        if (positionFocus == 0) {
            MenuHeaderChildren[positionFocus].style = '';
            MenuHeaderChildren[(MenuHeaderChildren.length)-1].style = StyleFocusMenuHeader;
        }else{
            MenuHeaderChildren[positionFocus].style = '';
            MenuHeaderChildren[positionFocus-1].style = StyleFocusMenuHeader;
        }        
    }
}
/*******************************************************************************
 * Funciones para rellenar los paneles
 *******************************************************************************/
function setAllMovies(){
    // var movies = MoviesList.filter(movie =>{  
    //     return movie.SCOR >2;
    //     });
    //     refreshmoviesList(movies, 'RecommendedMoviesList');
         refreshmoviesList(MoviesList, 'AllMoviesList');
        
}

 /*******************************************************************************
 * Utilidades
 *******************************************************************************/
function getPositionFocus(style, panelNodes){
    var position = -1;
    for (var x = 0; x < panelNodes.length; x++) {
        if (panelNodes[x].style.cssText == style) {
        position=x;
    } 
    }
    return position;
}

function refreshmoviesList(moviesList, panel){
    //eliminando peliculas del panel
    var  element    = document.getElementById(panel);
    var  parent      = element.parentNode;
         parent.removeChild(element);
    var  div = document.createElement('div');
         div.setAttribute('id', panel);
         div.className='wraper-'+panel;
         parent.appendChild(div);
    //setear nuevas peliculas
    // moviesList.forEach(movie => {
    //     BoxDiv    = document.createElement('div');
    //     BoxDiv.className = 'moviePoster';
    //     BoxPoster = document.createElement('img');
    //     BoxTitle  = document.createElement('p');
    //     BoxPoster.src = getimageMovie(movie);
    //     BoxTitle.textContent = movie.TTLE;
        
    //     BoxDiv.appendChild(BoxPoster);
    //     BoxDiv.appendChild(BoxTitle);
        
    //     document.getElementById(panel).append(BoxDiv);
        
    // });
    for (var x = 0; x < moviesList.length; x++) {
        
    }
}
function  getimageMovie(movie){
    return FolderSource + movie.FLDR + movie.PSTR;
    }