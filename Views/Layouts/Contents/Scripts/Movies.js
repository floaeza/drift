/* @Creado por: Fabian Loaeza
 * @Fecha: Febrero 2021
 * @Tipo: Funciones para controlar el layout de peliculas
 */
/*******************************************************************************
 * Variables globales
 *******************************************************************************/
    //Variebles Menu principal
    var MenuHeader                      = document.getElementById('MenuOptions'),
        MenuHeaderNodes                 = MenuHeader.childNodes,
        MenuHeaderChildren              = MenuHeader.children;
    //Variables Panel peliculs recomendadas
    var RecommendedMoviesList           = document.getElementById('RecommendedMoviesList'),
        RecommendedMoviesListNodes      = RecommendedMoviesList.childNodes,
        RecommendedMoviesListChildren   = RecommendedMoviesList.children;
    //Variables Panel peliculs recomendadas
    var AllMoviesList                   = document.getElementById('AllMoviesList'),
        AllMoviesListNodes              = AllMoviesList.childNodes,
        AllMoviesListChildren           = AllMoviesList.children;
    //Variables focus
    var CurrentFocus                    = '';
    //Variables estilos
    var StyleFocusMenuHeader            = 'width: 100px; left: 0px; background-color: rgba(7, 197, 245, 0.88);',
        StyleFocusMovies                = '3px solid rgb(255, 255, 255)';
    //Variables de utilidad
    var FolderSource                    = '../../vod/mvs/', 
        y                               = 0;
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
    if (CurrentFocus === 'MenuHeader') {
        SetFocusOnRecommendedMovies('set');
    } else if (CurrentFocus === 'RecommendedMovies') {
        SetFocusOnRecommendedMovies('right');
    } else if (CurrentFocus === 'AllMovies') {
        SetFocusOnAllMovies('right');
    }
}
function VodLeft(){
    if(CurrentFocus === 'RecommendedMovies'){
        SetFocusOnRecommendedMovies('left');
    } else if (CurrentFocus === 'AllMovies') {
        SetFocusOnAllMovies('left');
    }
}

function VodDown(){
    if (CurrentFocus === 'MenuHeader') {
        SetFocusOnMenuHeader('down');
    } else if (CurrentFocus === 'RecommendedMovies') {
        SetFocusOnRecommendedMovies('down');
    }  else if (CurrentFocus === 'AllMovies') {
        SetFocusOnAllMovies('down');
    }
}

function VodUp(){
    if (CurrentFocus === 'MenuHeader') {
        SetFocusOnMenuHeader('up');
    } else if (CurrentFocus === 'AllMovies') {
        SetFocusOnAllMovies('up');
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
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuHeader, MenuHeaderChildren);
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
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuHeader, MenuHeaderChildren);
        if (positionFocus == 0) {
            MenuHeaderChildren[positionFocus].style = '';
            MenuHeaderChildren[(MenuHeaderChildren.length)-1].style = StyleFocusMenuHeader;
        }else{
            MenuHeaderChildren[positionFocus].style = '';
            MenuHeaderChildren[positionFocus-1].style = StyleFocusMenuHeader;
        }        
    }
}
function SetFocusOnRecommendedMovies(Direction){
        RecommendedMoviesList           = document.getElementById('RecommendedMoviesList');
        RecommendedMoviesListNodes      = RecommendedMoviesList.childNodes,
        RecommendedMoviesListChildren   = RecommendedMoviesList.children;
        if (Direction == 'set') {
            CurrentFocus = 'RecommendedMovies';
            RecommendedMoviesListChildren[0].style.border= StyleFocusMovies; 
        } else if(Direction == 'right'){
            var position = getPositionFocusInMovies(StyleFocusMovies, RecommendedMoviesListChildren);  
            if (position+1 >= RecommendedMoviesListNodes.length) {
                var position = getPositionFocusInMovies(StyleFocusMovies, RecommendedMoviesListChildren);  
                var rows = Math.ceil(MoviesList.length/4);
                var matrix = getMatrix(rows,MoviesList.length);
                y = y+1;
                var row = matrix[y];
                if (row === undefined ) {
                    y= rows;
                }else{
                    scrollRefresh(row, 'RecommendedMoviesList', MoviesList);
                    RecommendedMoviesList           = document.getElementById('RecommendedMoviesList');
                    RecommendedMoviesListChildren   = RecommendedMoviesList.children;
                    if (RecommendedMoviesListChildren[position] === undefined) {
                        RecommendedMoviesListChildren[0].style.border=StyleFocusMovies;
                    } else{
                        RecommendedMoviesListChildren[position].style.border=StyleFocusMovies;
                    }
                }
                }else{
                RecommendedMoviesListChildren[position].style.border='';
                RecommendedMoviesListChildren[position+1].style.border=StyleFocusMovies;
                }
    } else if (Direction == 'left') {
        var position = getPositionFocusInMovies(StyleFocusMovies, RecommendedMoviesListChildren);  
            if (position-1 == -1 && y == 0) {
                CurrentFocus = 'MenuHeader';
                RecommendedMoviesListChildren[0].style.border= '';
            }else if (position-1 == -1 && y!=0) {
                //PENDIENTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE************
                var position = getPositionFocusInMovies(StyleFocusMovies, RecommendedMoviesListChildren);  
                var rows = Math.ceil(MoviesList.length/4);
                var matrix = getMatrix(rows,MoviesList.length);
                y = y-1;
                var row = matrix[y];
                if (row === undefined ) {
                    y= 0;
                }else{
                    scrollRefresh(row, 'RecommendedMoviesList', MoviesList);
                    RecommendedMoviesList           = document.getElementById('RecommendedMoviesList');
                    RecommendedMoviesListChildren   = RecommendedMoviesList.children;
                    if (RecommendedMoviesListChildren[position] === undefined) {
                        RecommendedMoviesListChildren[0].style.border=StyleFocusMovies;
                    } else{
                        RecommendedMoviesListChildren[position].style.border=StyleFocusMovies;
                    }
                }
            }else{
                RecommendedMoviesListChildren[position].style.border='';
                RecommendedMoviesListChildren[position-1].style.border=StyleFocusMovies;
            }
    } else if (Direction == 'down') {
            CurrentFocus = 'AllMovies';
            y=0;
            var position = getPositionFocusInMovies(StyleFocusMovies, RecommendedMoviesListChildren);  
                AllMoviesList                   = document.getElementById('AllMoviesList'),
                AllMoviesListNodes              = AllMoviesList.childNodes,
                AllMoviesListChildren           = AllMoviesList.children;
                RecommendedMoviesListChildren[position].style.border='';
                AllMoviesListChildren[0].style.border= StyleFocusMovies;
                var rows = Math.ceil(MoviesList.length/4);
                var matrix = getMatrix(rows,MoviesList.length);
                var row = matrix[y];
                scrollRefresh(row, 'RecommendedMoviesList', MoviesList);
        }
}
function SetFocusOnAllMovies(Direction){
    AllMoviesList           = document.getElementById('AllMoviesList');
    AllMoviesListNodes      = AllMoviesList.childNodes,
    AllMoviesListChildren   = AllMoviesList.children;
    if (Direction == 'right') {
        var position = getPositionFocusInMovies(StyleFocusMovies, AllMoviesListChildren);  
        if (position+1 >= AllMoviesListNodes.length) {
            AllMoviesListChildren[position].style.border='';
            SetFocusOnAllMovies('down');
            AllMoviesListChildren[0].style.border=StyleFocusMovies;
            }else{
            AllMoviesListChildren[position].style.border='';
            AllMoviesListChildren[position+1].style.border=StyleFocusMovies;
            }        
    } else if (Direction == 'left') {
        var position = getPositionFocusInMovies(StyleFocusMovies, AllMoviesListChildren);  
        if (position-1 <0) {
            CurrentFocus = 'MenuHeader';
            AllMoviesListChildren[0].style.border= '';
        }else{
            AllMoviesListChildren[position].style.border='';
            AllMoviesListChildren[position-1].style.border=StyleFocusMovies;
        }        
    } else if (Direction == 'down') {
        var position = getPositionFocusInMovies(StyleFocusMovies, AllMoviesListChildren);  
        var rows = Math.ceil(MoviesList.length/4);
        var matrix = getMatrix(rows,MoviesList.length);
        y = y+1;
        var row = matrix[y];
        if (row === undefined ) {
            y= rows;
        }else{
            scrollRefresh(row, 'AllMoviesList', MoviesList);
            AllMoviesList           = document.getElementById('AllMoviesList');
            AllMoviesListChildren   = AllMoviesList.children;
            if (AllMoviesListChildren[position] === undefined) {
                AllMoviesListChildren[0].style.border=StyleFocusMovies;
            } else{
                AllMoviesListChildren[position].style.border=StyleFocusMovies;
            }
        }
    } else if (Direction == 'up') {
        var position = getPositionFocusInMovies(StyleFocusMovies, AllMoviesListChildren);  
        var rows = Math.ceil(MoviesList.length/4);
        var matrix = getMatrix(rows,MoviesList.length);
        y = y-1;
        var row = matrix[y];
        if (row === undefined) {
            RecommendedMoviesList           = document.getElementById('RecommendedMoviesList');
            RecommendedMoviesListNodes      = RecommendedMoviesList.childNodes,
            RecommendedMoviesListChildren   = RecommendedMoviesList.children;
            y=0;
            CurrentFocus = 'RecommendedMovies';
            RecommendedMoviesListChildren[0].style.border = StyleFocusMovies;
            AllMoviesListChildren[position].style.border = '';
        }else {
            scrollRefresh(row, 'AllMoviesList', MoviesList);
            AllMoviesList           = document.getElementById('AllMoviesList');
            AllMoviesListChildren   = AllMoviesList.children;
            if (AllMoviesListChildren[position] === undefined) {
                AllMoviesListChildren[0].style.border=StyleFocusMovies;
            } else{
                AllMoviesListChildren[position].style.border=StyleFocusMovies;
            }
        }

    }
}
/*******************************************************************************
 * Funciones para rellenar los paneles
 *******************************************************************************/
function setAllMovies(){
    refreshMoviesPrincipalList(MoviesList, 'AllMoviesList'); 
    refreshMoviesPrincipalList(MoviesList, 'RecommendedMoviesList'); 
}
 /*******************************************************************************
 * Utilidades
 *******************************************************************************/
function getPositionFocusInMovies(style, panelNodes){
    var position = -1;
    for (var x = 0; x < panelNodes.length; x++) {
        if (panelNodes[x].style.border == style) {
        position=x;
    } 
    }
    return position;
}
function getPositionFocusInMenu(style, panelNodes){
    var position = -1;
    for (var x = 0; x < panelNodes.length; x++) {
        if (panelNodes[x].style.cssText == style) {
        position=x;
    } 
    }
    return position;
}
function refreshMoviesPrincipalList(moviesList, panel){
            //Eliminando peliculas del panel
            var  element    = document.getElementById(panel);
            var  parent      = element.parentNode;
                 parent.removeChild(element);
            var  div = document.createElement('div');
                 div.setAttribute('id', panel);
                 parent.appendChild(div);
            //Seteando nuevas peliculas en el panel         
            var rows = Math.ceil(moviesList.length/4);
            var matrix = getMatrix(rows,moviesList.length);
            for (var y= 0;  y< 1; y++) {
                // var row = document.createElement('div');
                //     row.setAttribute('class', 'MoviesRow');
                //     div.appendChild(row);
                    for (var x = 0; x < 4; x++) {
                        var peliculaID  = matrix[y][x];
                        if (peliculaID == -1) {
                            return;
                        }else{
                                BoxDiv               = document.createElement('div');
                                BoxDiv.className     = 'RowPoster';
                                BoxPoster            = document.createElement('img');
                                BoxTitle             = document.createElement('p');
                                BoxPoster.src        = getimageMovie(moviesList[peliculaID]);
                                BoxTitle.textContent = moviesList[peliculaID].TTLE;
                                BoxDiv.appendChild(BoxPoster);
                                BoxDiv.appendChild(BoxTitle);
                                document.getElementById(panel).appendChild(BoxDiv);
                        }

                    }
            }
    
}
function scrollRefresh(row, panel, moviesList){
            //Eliminando peliculas del panel
            var  element    = document.getElementById(panel);
            var  parent      = element.parentNode;
                 parent.removeChild(element);
            var  div = document.createElement('div');
                 div.setAttribute('id', panel);
                 parent.appendChild(div);
            for (var x = 0; x < 4; x++) {
                var peliculaID  = row[x];
                if (peliculaID == -1) {
                    return;
                }else{
                    BoxDiv               = document.createElement('div');
                    BoxDiv.className     = 'RowPoster';
                    BoxPoster            = document.createElement('img');
                    BoxTitle             = document.createElement('p');
                    BoxPoster.src        = getimageMovie(moviesList[peliculaID]);
                    BoxTitle.textContent = moviesList[peliculaID].TTLE;
                    BoxDiv.appendChild(BoxPoster);
                    BoxDiv.appendChild(BoxTitle);
                    document.getElementById(panel).appendChild(BoxDiv);
                }

        }     
}
function  getimageMovie(movie){
    return FolderSource + movie.FLDR + movie.PSTR;
}    
function getMatrix(Rows, length){
    var matrix = [];
    var aux= 0;
    var contador = 0;
    for(var i=0; i<Rows; i++) {
    matrix[i] = new Array(4);
    }
    for (var y = 0; y < matrix.length; y++) {
    for (var x = 0; x < 4; x++) {
    matrix[y][x]=aux++;                 
    }   
    }
    
    for (var y = 0; y < matrix.length; y++) {
    for (var x = 0; x < 4; x++) {
    contador++;
    if (contador>length) {
    matrix[y][x]=-1;
    }
    }
    }
    return matrix;
    
    }