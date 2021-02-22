/* @Creado por: Tania Maldonado
 * @Fecha: Julio 2020
 * @Tipo: Funciones para controlar el layout de peliculas
 */
/*******************************************************************************
 * Variables generales
 *******************************************************************************/
                        var FiltersByYear           = [],
                            FiltersByGender         = [];


                        var MenuOptionsNodes        = document.getElementById('MenuOptions').childNodes;
                            MenuNodesArray          = [1,3,5,7],
                            MenuFocus               = -1;


                            var CurrentFocus            = '',
                            CurrentMovie            = '';


                            var MoviesList              = [];


                            var PanelRightNodes         = document.getElementById('PanelRight').childNodes,
                            PanelRight              = document.getElementById('PanelRight'),
                            PanelRightNodesArray    = [1,3,5],
                            MoviesRowLength         = 3,
                            MoviesBoxLength         = 5,
                            IndexMovies             = 0,
                            MovieRowFocus           = -1,
                            MovieFocus              = 0,
                            MovieBox                = '';

                            var FolderSource            = '../../vod/mvs/';

                            var BackgroundPanel         = document.getElementById('BackgroundPanel');


                            var ListPanel               = document.getElementById('ListPanel'),
                                MoviePanel              = document.getElementById('MoviePanel'),
                                MoviePanelNodes         = MoviePanel.childNodes;

                            var MenuFilters             = document.getElementById('MenuFilters'),
                                MenuFilterFocus         = 0,

                                MenuSelectYearFocus     = 1,
                                PanelHeader             = document.getElementById('PanelHeader'),
                                TituloFilters           = document.getElementById('TituloFilters'),
                                IsMenuFilterSelected    = false,
                                IsPanelRighVisible      = true,

                                PanelYearFilter         = document.getElementById('PanelYearFilter'),
                                YearFilter              = document.getElementById('yearfilter'),
                                GeneralBox              = document.getElementsByClassName('GeneralBox'),
                                PanelYearFilterNodes    = PanelYearFilter.childNodes,
                                YearFilterFocus         = 0,
                                MovieByYearPanel        = document.getElementById('moviesFilter'),
                                MovieByYearPanelNodes   = MovieByYearPanel.childNodes,
                                SelectMovieByYearFocus  = 0,
                                FilterMovieCategoryPanel= document.getElementById('filterMovieCategory'),
                                RecommendedMoviesList   = document.getElementById('RecommendedMoviesList'),
                                RecommendedMoviesListNodes = RecommendedMoviesList.childNodes;

                            var PanelGenderFilter       = document.getElementById('PanelGenderFilter'),
                                GenderFilterFocus       = 0,
                                SelectMovieByGenderFocus= 0,
                                MovieByGenderPanel        = document.getElementById('GenderFilter'),
                                MovieByGenderPanelNodes   = MovieByYearPanel.childNodes;

                            var MoviePanelPlay          = document.getElementById('PlayPanel'),
                                MoviePanelExit          = document.getElementById('ExitPanel'),
                                MoviePanelFocus         = 'Play';
                                

                            var PlayingPanel            = document.getElementById('PlayingPanel'),
                                PlayingOptions          = document.getElementById('PlayingOptions'),
                                PlayingOptionsNodes     = PlayingOptions.childNodes,
                                PlayingNodesArray       = [1,3,5,7],
                                PlayingFocus            = -1,
                                PlayingPanelTimer       = '',
                                PlayinPanelActive       = false;

                            var SpeedText               = '',
                                OptionText              = 'play';

                            var BarPosition             = document.getElementById('PlayingPosition'),
                                InfoPosition            = document.getElementById('InfoPosition'),
                                PlayingSpeed            = document.getElementById('PlayingSpeed'),
                                ExitPlaying             = document.getElementById('ExitPlaying'),
                                PlayingTitle            = document.getElementById('PlayingTitle');

                            var BarTimer                = '',
                                BarUpdate               = '',
                                DurationAsset           = 0,
                                PositionAsset           = 0,
                                PercentagePosition      = 0;


Debug('---------------> INIT');


/*******************************************************************************
* Carga inicial
*******************************************************************************/
function Init(){
 Debug('---------------> INIT');
 Debug('---------------> INIT');

GetFiltersList();

SetFocusHeader('up');

CurrentFocus = 'Menu';

GetMoviesList();

SetMoviesList('All');

 Debug('---------------<<< INIT');
}
function GetFiltersList(){
$.ajax({
type: 'POST',
url: 'Core/Controllers/VideoOnDemand.php',
data: { 
Option : 'GetYearsList'
},
success: function (response){
FiltersByYear = $.parseJSON(response);
}
}); 

$.ajax({
type: 'POST',
url: 'Core/Controllers/VideoOnDemand.php',
data: { 
Option : 'GetGendersList'
},
success: function (response){
FiltersByGender = $.parseJSON(response);
}
}); 
}

setTimeout(Init,300);

/*******************************************************************************
* Navegacion header
*******************************************************************************/

function SetFocusHeader(Direction){

if(MenuFocus >= 0){
MenuOptionsNodes[MenuNodesArray[MenuFocus]].classList.remove('OptionFocus');
}

//(Direction === 'right') ? MenuFocus++: MenuFocus--;

if(Direction === 'down' ){
MenuFocus++;

if(MenuFocus === 2) {
MenuFocus++;
}
} else {
MenuFocus--;

if(MenuFocus === 2) {
MenuFocus--;
}
}

if(MenuFocus >= MenuNodesArray.length){
MenuFocus = (MenuNodesArray.length -1 );
} else if(MenuFocus < 0){
MenuFocus = 0;
}

MenuOptionsNodes[MenuNodesArray[MenuFocus]].classList.add('OptionFocus');
}

function setFocusMenuFilter(Direction){  

var listLenghtMenuFilter = document.getElementById('filterMovieCategory').children.length;   
if(Direction === 'down'){
document.getElementById('filterMovieCategory').children[MenuFilterFocus].className = 'OptionsFilter';

MenuFilterFocus++;

if(MenuFilterFocus >= listLenghtMenuFilter){
MenuFilterFocus=0;
}
document.getElementById('filterMovieCategory').children[MenuFilterFocus].className = 'OptionFocus';
setTimeout(SetMoviesList('Filter') ,300);

}
if(Direction === 'up'){
if(MenuFilterFocus === 0){
document.getElementById('filterMovieCategory').children[MenuFilterFocus].className = 'OptionsFilter';
MenuFilterFocus= listLenghtMenuFilter;
document.getElementById('filterMovieCategory').children[MenuFilterFocus-1].className = 'OptionFocus';
MenuFilterFocus--;
setTimeout(SetMoviesList('Filter') ,300);

}else{
MenuFilterFocus--;
document.getElementById('filterMovieCategory').children[MenuFilterFocus+1].className = 'OptionsFilter';
document.getElementById('filterMovieCategory').children[MenuFilterFocus].className = 'OptionFocus';   
setTimeout(SetMoviesList('Filter') ,300);
}


}
//document.getElementById('filterMovieCategory').children[0].className = '';
//document.getElementById('filterMovieCategory').children[1].className = 'OptionFocus';
}
function ClearFocusHeader(){
var IndexC = 0;

for(IndexC = 0; IndexC < MenuNodesArray.length; IndexC++){
MenuOptionsNodes[MenuNodesArray[IndexC]].classList.remove('OptionFocus');
}
}    
function SelectMenuOption(){
IsMenuFilterSelected = true;
moviesGenderFilter = false;
switch (MenuNodesArray[MenuFocus]) {
case 1:
// Lista de todas las peliculas                
break;

case 3:
// Selecciona los filtros
FiltersList();
break;

case 5:
// Search (aun no esta activo)
break;

case 7:
// Regresa a la television
GoPage('menu.php', Device['MenuId'], 'Menu');
break;
}

}

/*******************************************************************************
* Lista peliculas, sin filtros
*******************************************************************************/

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
function SetMoviesList(Estado){

 Debug('---------------<<< SetMoviesList ' + Estado);
//debugger
if(Estado === 'Filter'){
switch (MenuFilterFocus) {
case 0:
PanelGenderFilter.style.visibility = 'hidden';
PanelYearFilter.style.visibility = 'visible';
PanelRight.style.visibility = 'hidden';
LoadFilterByYearPanel();
break;

case 1:
// Lista peliculas por categoria
PanelGenderFilter.style.visibility = 'visible';
LoadFilterByGenderPanel();

break;

case 2:
//Puntuacion
break;                
case 6:
//Salir (temporal) 
break;                
}
}else if (Estado === 'All'){        
let movies = MoviesList.filter(movie =>{  
return movie.SCOR >2;
});
refreshmoviesList(movies, 'recommended');
refreshmoviesList(MoviesList, 'allmovies');
BackgroundPanel.style.backgroundImage = "url('"+FolderSource + "bg/2542.jpg')";


}


}
//Controla la navegacion de la lista principal de peliculas recomendadas
function SetFocusMovie(Direction){
RecommendedMoviesList           = document.getElementById('RecommendedMoviesList'),
RecommendedMoviesListNodes      = RecommendedMoviesList.childNodes,
RecommendedMoviesListChildren   = RecommendedMoviesList.children;
var scrollPosition = RecommendedMoviesList.scrollLeft;
if (Direction == 'right') {
var position = getPositionInAllMovies(RecommendedMoviesListNodes);
if (position+1 >= RecommendedMoviesListNodes.length) {
RecommendedMoviesListChildren[position].style.border='';
RecommendedMoviesListChildren[0].style.border='3px solid rgb(255, 255, 255)';
RecommendedMoviesList.scroll(0,0);
}else{
RecommendedMoviesListChildren[position].style.border='';
RecommendedMoviesListChildren[position+1].style.border='3px solid rgb(255, 255, 255)';
RecommendedMoviesList.scroll(scrollPosition+125,0);
}
} else if (Direction == 'left'){
var position = getPositionInAllMovies(RecommendedMoviesListNodes);
if (position-1 <0) {
CurrentFocus = 'Menu';
RecommendedMoviesListChildren[0].style.border= '';
}else{
RecommendedMoviesListChildren[position].style.border='';
RecommendedMoviesListChildren[position-1].style.border='3px solid rgb(255, 255, 255)';
RecommendedMoviesList.scroll(scrollPosition-125,0);
}
} else if(Direction == 'down'){
var AllMoviesList           = document.getElementById('AllMoviesList');
var AllMoviesListNodes      = AllMoviesList.childNodes;
var RecommendedMoviesListNodes  = RecommendedMoviesList.childNodes;
CurrentFocus = 'AllMovies';
RecommendedMoviesListNodes.forEach(element => {
if(element.style.border == '3px solid rgb(255, 255, 255)'){
element.style.border = '';
}
});
AllMoviesListNodes[0].style.border = '3px solid #fff';
PanelRight.scrollTo(0, 360);
RecommendedMoviesList.scroll(0,0);

}       
}
//Controla la navegacion de la lista filtrada por año
function SetFocusOnListYear(Direction){
let years = document.getElementById('yearfilter').children;
let movieByYear = document.getElementById('moviesFilter').children;
if(Direction == 'set'){
years[0].style = 'box-shadow: 0px 0px 9px rgb(255 255 255 / 50%); text-shadow: 2px 2px 6px rgb(255 255 255 / 50%);';
YearFilterFocus = 0;
let movies = MoviesList.filter(movie =>{  
return movie.YEAR == FiltersByYear[YearFilterFocus];
});
refreshmoviesList(movies, 'year');

}else if(Direction == 'up'){
if (YearFilterFocus == 0) {
return;
} else {
YearFilterFocus--;
years[YearFilterFocus].style = 'box-shadow: 0px 0px 9px rgb(255 255 255 / 50%); text-shadow: 2px 2px 6px rgb(255 255 255 / 50%);';
years[YearFilterFocus +1].style= '';
let movies = MoviesList.filter(movie =>{  
return movie.YEAR == FiltersByYear[YearFilterFocus];
});
refreshmoviesList(movies, 'year');
}
}
else if(Direction == 'down'){
if (YearFilterFocus == (years.length -1)) {
return;
} else {
YearFilterFocus++;
years[YearFilterFocus].style = 'box-shadow: 0px 0px 9px rgb(255 255 255 / 50%); text-shadow: 2px 2px 6px rgb(255 255 255 / 50%);';
years[YearFilterFocus -1].style = '';

let movies = MoviesList.filter(movie =>{  
return movie.YEAR == FiltersByYear[YearFilterFocus];
});

refreshmoviesList(movies, 'year');
}
}
else if(Direction == 'right'){
CurrentFocus= 'SelectMovieByYear';
movieByYear[0].style.border = '3px solid #fff';
} else if(Direction == 'left'){
CurrentFocus = 'filterMovies'
years[YearFilterFocus].style= '';

}           
}
//Controla la navegacion dentro de las peliculas ya filtradas por año
function SetFocusOnMovieByYear(Direction){
MovieByYearPanel         = document.getElementById('moviesFilter'),
MovieByYearPanelNodes    = MovieByYearPanel.childNodes;

var MovieByYearPanelChildren = MovieByYearPanel.children,
moviesLength             = MovieByYearPanelNodes.length,
position = getPositionInAllMovies(MovieByYearPanelNodes);
rows                     = Math.ceil(moviesLength/4);
if(Direction == 'right'){
position = getPositionInAllMovies(MovieByYearPanelNodes);
if (MovieByYearPanelChildren[position+1] === undefined) {
return;
}else{
MovieByYearPanelChildren[position].style.border= '';
MovieByYearPanelChildren[position+1].style.border= '3px solid rgb(255, 255, 255)';
}
}
else if(Direction == 'left'){
position = getPositionInAllMovies(MovieByYearPanelNodes);
if (position%4 == 0) {
CurrentFocus = 'SelectYear';
MovieByYearPanelChildren[position].style.border = '';
}else{
MovieByYearPanelChildren[position].style.border = '';
MovieByYearPanelChildren[position-1].style.border = '3px solid rgb(255, 255, 255)';
}
}
else if(Direction == 'up'){
position = getPositionInAllMovies(MovieByYearPanelNodes);
if (position<4) {
return;
}else{
MovieByYearPanelChildren[position].style.border = '';
MovieByYearPanelChildren[position-4].style.border = '3px solid rgb(255, 255, 255)';
}
}
else if(Direction == 'down'){
if (rows == 1) {
return;
}else{
position = getPositionInAllMovies(MovieByYearPanelNodes);
if (MovieByYearPanelChildren[position+4] === undefined) {
return;
}else{
MovieByYearPanelChildren[position].style.border = '';
MovieByYearPanelChildren[position+4].style.border = '3px solid rgb(255, 255, 255)';
}  
}
}


}
//Controla la navegacion de la lista de filtros por genero
function SetFocusOnListGender(Direction){
let genders = document.getElementById('GenderFilter').children;
let movieByGender = document.getElementById('moviesGenderFilter').children;
if(Direction == 'set'){
genders[0].style = 'box-shadow: 0px 0px 9px rgb(255 255 255 / 50%); text-shadow: 2px 2px 6px rgb(255 255 255 / 50%);';
GenderFilterFocus = 0;
let movies = MoviesList.filter(movie =>{
return movie.GNDR.includes(FiltersByGender[GenderFilterFocus]);                                            
});
refreshmoviesList(movies, 'gender');

}
if(Direction == 'down'){
if (GenderFilterFocus == (genders.length -1)) {
return;
} else {
GenderFilterFocus++;
genders[GenderFilterFocus].style = 'box-shadow: 0px 0px 9px rgb(255 255 255 / 50%); text-shadow: 2px 2px 6px rgb(255 255 255 / 50%);';
genders[GenderFilterFocus -1].style = '';

let movies = MoviesList.filter(movie =>{
return movie.GNDR.includes(FiltersByGender[GenderFilterFocus]);                                            
});
refreshmoviesList(movies, 'gender');
}
}
if(Direction == 'up'){
if (GenderFilterFocus == 0) {
return;
} else {
GenderFilterFocus--;
genders[GenderFilterFocus].style = 'box-shadow: 0px 0px 9px rgb(255 255 255 / 50%); text-shadow: 2px 2px 6px rgb(255 255 255 / 50%);';
genders[GenderFilterFocus +1].style = '';
let movies = MoviesList.filter(movie =>{
return movie.GNDR.includes(FiltersByGender[GenderFilterFocus]);                                            
});
refreshmoviesList(movies, 'gender');
}

}
if(Direction == 'right'){
CurrentFocus= 'SelectMovieByGender';
if (movieByGender.length == 0) {
CurrentFocus = 'SelectGender';
}else{
movieByGender[0].style.border = '3px solid #fff';
}

}
if(Direction == 'left'){
CurrentFocus = 'filterMovies'
genders[GenderFilterFocus].style = '';
}
}
//Controla la navegacion dentro de las peliculas ya filtradas por genero
function SetFocusOnMovieByGender(Direction){
var MovieByGenderPanel         = document.getElementById('moviesGenderFilter'),
MovieByGenderPanelNodes    = MovieByGenderPanel.childNodes,
MovieByGenderPanelChildren = MovieByGenderPanel.children,
moviesLength               = MovieByGenderPanelNodes.length,
position                   = getPositionInAllMovies(MovieByGenderPanelNodes),
rows                       = Math.ceil(moviesLength/4);
if (Direction == 'right'){
position = getPositionInAllMovies(MovieByGenderPanelNodes);
if (MovieByGenderPanelChildren[position+1] === undefined) {
return;
}else{
MovieByGenderPanelChildren[position].style.border = '';
MovieByGenderPanelChildren[position+1].style.border = '3px solid rgb(255, 255, 255)';
}
} 
else if(Direction == 'left'){
position = getPositionInAllMovies(MovieByGenderPanelNodes);
if (position%4 == 0) {
CurrentFocus = 'SelectGender';
MovieByGenderPanelChildren[position].style.border = '';
}else{
MovieByGenderPanelChildren[position].style.border = '';
MovieByGenderPanelChildren[position-1].style.border = '3px solid rgb(255, 255, 255)';             
}
}
else if(Direction == 'down'){
if (rows == 1) {
return;
}else{
position = getPositionInAllMovies(MovieByGenderPanelNodes);
if (MovieByGenderPanelChildren[position+4] === undefined) {
return;
}else{
MovieByGenderPanelChildren[position].style.border = '';
MovieByGenderPanelChildren[position+4].style.border = '3px solid rgb(255, 255, 255)';
}  
}
}
else if(Direction == 'up'){
position = getPositionInAllMovies(MovieByGenderPanelNodes);
if (position<4) {
return;
}else{
MovieByGenderPanelChildren[position].style.border = '';
MovieByGenderPanelChildren[position-4].style.border = '3px solid rgb(255, 255, 255)';
}
}
}
//Controla la navegacion dentro de la lista principal de todas las peliculas
function SetFocusOnAllMovie(Direction){
var AllMoviesList           = document.getElementById('AllMoviesList'),
AllMoviesListPanel      = document.getElementById('PanelAllMovies'),
AllMoviesListNodes      = AllMoviesList.childNodes,
AllMoviesListChildren   = AllMoviesList.children,
moviesLength            = AllMoviesListNodes.length,
position                = getPositionInAllMovies(AllMoviesListNodes),
rows                    = Math.ceil(moviesLength/4),
scrollPosition = AllMoviesListPanel.scrollLeft;
if (Direction == 'right') {
position = getPositionInAllMovies(AllMoviesListNodes);
if (AllMoviesListChildren[position+1] === undefined) {
return;
}else{
AllMoviesListChildren[position].style.border = '';
AllMoviesListChildren[position+1].style.border = '3px solid rgb(255, 255, 255)';  
}          
} else if(Direction == 'left'){
position = getPositionInAllMovies(AllMoviesListNodes);
if (position%4 == 0) {
CurrentFocus = 'Menu';
AllMoviesListNodes[position].style.border = '';
PanelRight.scrollTo(0, 0);
}else{
AllMoviesListChildren[position].style.border = '';
AllMoviesListChildren[position-1].style.border = '3px solid rgb(255, 255, 255)'; 
}

} else if(Direction == 'down'){
if (rows == 1) {
return;
}else{
position = getPositionInAllMovies(AllMoviesListNodes);
if (AllMoviesListChildren[position+4] === undefined) {
return;
}else{
AllMoviesListChildren[position].style.border = '';
AllMoviesListChildren[position+4].style.border = '3px solid rgb(255, 255, 255)';
AllMoviesListPanel.scroll(0, scrollPosition+283);                }  
}
} else if(Direction == 'up'){
position = getPositionInAllMovies(AllMoviesListNodes);
if (position<4) {
CurrentFocus = 'Movies';
RecommendedMoviesListNodes = RecommendedMoviesList.children;
AllMoviesListChildren[position].style.border = '';
RecommendedMoviesListNodes[0].style.border = '3px solid rgb(255, 255, 255)';
PanelRight.scrollTo(0, 0);
}else{
AllMoviesListChildren[position].style.border = '';
AllMoviesListChildren[position-4].style.border = '3px solid rgb(255, 255, 255)';
AllMoviesListPanel.scroll(0, scrollPosition-283);   
}
}
}   
/*******************************************************************************
* 
*******************************************************************************/

function LoadMoviePanel(moviesContainer){
if(MenuFilters.style.visibility == "visible"){
MenuFilters.style.visibility = "hidden"; 
}
var moviesArrayElement    = document.getElementById(moviesContainer);
var movieSelectedPosition = getPositionInAllMovies(moviesArrayElement.childNodes);
var moviesArray           = moviesArrayElement.children;
var movieTagP             = moviesArray[movieSelectedPosition].getElementsByTagName('p');
var movieName             = movieTagP[0].innerHTML;
CurrentFocus = 'MoviePanel';
ListPanel.style.visibility = 'hidden';
MoviePanel.style.visibility = 'visible';

let Movie = MoviesList.filter(movie =>{
return movie.TTLE == movieName;                                            
});

MoviePanelNodes[1].src = FolderSource + Movie[0].FLDR + 'HD'+Movie[0].PSTR;
MoviePanelNodes[3].textContent  = Movie[0].TTLE;
MoviePanelNodes[5].textContent  = Movie[0].SCOR;
MoviePanelNodes[9].textContent  = Movie[0].DRTN;
MoviePanelNodes[11].textContent = Movie[0].GNDR;
MoviePanelNodes[13].textContent = Movie[0].YEAR;
MoviePanelNodes[15].textContent = Movie[0].RTNG;
MoviePanelNodes[17].textContent = Movie[0].DSCR;
MoviePanelNodes[19].textContent = Movie[0].DRTR;
MoviePanelNodes[21].textContent = 'Casting: '+Movie[0].CAST;
BackgroundPanel.style.backgroundImage = "url('"+ FolderSource + Movie[0].FLDR + 'preview.png' + "')";

MoviePanelFocus = 'Play';
SetFocusOnMoviePanel();

PreviewVideo(Libraries['MoviesSource'] + Movie[0].FLDR + Movie[0].FILE+'?audioindex=1');

PlayingFocus = -1;
}
//Carga el panel de lista de peliculas por año
function LoadFilterByYearPanel(){
// abrir panel por año por default
PanelYearFilter.style.visibility = 'visible';
PanelRight.style.visibility = 'hidden';
var oldYear = document.getElementById('yearfilter').children;
var ListYear = document.getElementById('yearfilter');
if(oldYear.length!=0){
oldYear.forEach(element => {
ListYear.removeChild(element);
});
}
FiltersByYear.forEach(element => {
div = document.createElement('div');
div.innerHTML = element;
div.className = 'yearOpts';
document.getElementById('yearfilter').append(div); 
});
//cargar peliculas
MoviesList.forEach(movie => {
BoxDiv    = document.createElement('div');
BoxDiv.className = 'moviePoster';
BoxPoster = document.createElement('img');
BoxTitle  = document.createElement('p');
BoxPoster.src = getimageMovie(movie);
BoxTitle.textContent = movie.TTLE;

BoxDiv.appendChild(BoxPoster);
BoxDiv.appendChild(BoxTitle);

document.getElementById('moviesFilter').append(BoxDiv);


});


}
//Carga el panel de lista de peliculas por año
function LoadFilterByGenderPanel(){
var oldGender = document.getElementById('GenderFilter').children;
var ListGender = document.getElementById('GenderFilter');
if( oldGender.length != 0){
oldGender.forEach(element => {
ListGender.removeChild(element);
});
}
FiltersByGender.forEach(element => {
var div = document.createElement('div');
div.innerHTML = element;
div.className = 'genderOptions';
document.getElementById('GenderFilter').append(div);                        
});
//cargar peliculas
MoviesList.forEach(movie => {
BoxDiv    = document.createElement('div');
BoxDiv.className = 'moviePoster';
BoxPoster = document.createElement('img');
BoxTitle  = document.createElement('h3');
BoxPoster.src = getimageMovie(movie);
BoxTitle.textContent = movie.TTLE;

BoxDiv.appendChild(BoxPoster);
BoxDiv.appendChild(BoxTitle);

document.getElementById('moviesGenderFilter').append(BoxDiv);


});
}

function ClearMoviePanel(){
MoviePanel.style.visibility = 'hidden';

MoviePanelNodes[1].src = '';
MoviePanelNodes[3].textContent  = '';
MoviePanelNodes[5].textContent  = '';
MoviePanelNodes[9].textContent  = '';
MoviePanelNodes[11].textContent = '';
MoviePanelNodes[13].textContent = '';
MoviePanelNodes[15].textContent = '';
MoviePanelNodes[17].textContent = '';
MoviePanelNodes[19].textContent = '';
MoviePanelNodes[21].textContent = '';

}

function SetFocusOnMoviePanel(){
if(MoviePanelFocus === 'Play'){
MoviePanelPlay.classList.add('MovieOption');
MoviePanelExit.classList.remove('MovieOption');
MoviePanelFocus = 'Exit';
} else {
MoviePanelPlay.classList.remove('MovieOption');
MoviePanelExit.classList.add('MovieOption');
MoviePanelFocus = 'Play';
}
}

function ClearFocusMovieList(AllMoviesListName){
// PanelRightNodes[PanelRightNodesArray[MovieRowFocus]].childNodes[MovieFocus].style.border = '3px solid transparent';
// MovieFocus--;  
var AllMoviesListPanel      = document.getElementById('PanelAllMovies');
var MoviesList   = document.getElementById(AllMoviesListName);
var MoviesListNodes = MoviesList.childNodes;
var position = getPositionInAllMovies(MoviesListNodes);
MoviesListNodes[position].style.border = '';
MoviesList.scroll(0,0);
AllMoviesListPanel.scrollTo(0,0);
PanelRight.scrollTo(0,0);

}

function ExecOptionMoviePanel(){
if(MoviePanelFocus === 'Play'){
//ListPanel.style.visibility  = 'visible';
MoviePanel.style.visibility = 'hidden';
if(IsMenuFilterSelected == true){
MenuFilters.style.visibility = 'visible';
var FilterMovieCategoryPanelChildren = FilterMovieCategoryPanel.children;
var aux = '';
for (let x = 0; x < FilterMovieCategoryPanelChildren.length; x++) {
if(FilterMovieCategoryPanelChildren[x].className == 'OptionFocus'){
aux = FilterMovieCategoryPanelChildren[x].innerHTML;
}
}
if (aux == 'By Year') {
CurrentFocus = 'SelectMovieByYear';
PanelYearFilter.style.visibility = 'visible';
} else if (aux == 'By Gender') {
CurrentFocus = 'SelectMovieByGender';
PanelGenderFilter.style.visibility = 'visible';
}
}else if (IsPanelRighVisible == true) {
RecommendedMoviesList   = document.getElementById('RecommendedMoviesList'),
RecommendedMoviesListNodes = RecommendedMoviesList.childNodes;
var aux = getPositionInAllMovies(RecommendedMoviesListNodes);
if (aux >= 0) {
CurrentFocus = 'Movies';
}else if (aux == -1){
CurrentFocus = 'AllMovies';
}
PanelHeader.style.visibility = 'visible';
PanelRight.style.visibility = 'visible';
}

//CurrentFocus = 'Movies';
BackgroundPanel.style.backgroundImage = "url('"+FolderSource + "bg/2542.jpg')";
} else {
CurrentFocus = 'Playing';

CurrentMovie = MoviesList[5].TTLE;

// Actualiza la fecha inicio de la reproduccion de la pelicula */
MM_StartDateMovie = new Date();

BackgroundPanel.style.backgroundImage = "url('./Media/General/loading5.gif')";
BackgroundPanel.style.backgroundSize = 'auto';
BackgroundPanel.style.backgroundRepeat = 'no-repeat';
BackgroundPanel.style.backgroundPosition = 'center';
BackgroundPanel.style.visibility = 'visible';


setTimeout(HideLoadingGif,9000);

PlayVideo(Libraries['MoviesSource'] + MoviesList[MovieBox.id].FLDR + MoviesList[MovieBox.id].FILE);

ClearMoviePanel();

ShowPlayingPanel();

SetFocusPlaying('right');
}
}

function HideLoadingGif(){
BackgroundPanel.style.backgroundImage = '';
BackgroundPanel.style.backgroundRepeat = '';
BackgroundPanel.style.backgroundPosition = '';
BackgroundPanel.style.visibility = 'hidden';
BackgroundPanel.style.backgroundSize = 'cover';
}

function FiltersList(){
BackgroundPanel.style.backgroundImage = "url('"+FolderSource + "bg/2542.jpg')";
MenuFilters.style.backgroundImage = "url('"+FolderSource + "bg/bg5.jpg')";
MenuFilters.style.backgroundSize = 'cover';
// PanelYearFilter.style.backgroundImage = "url('"+FolderSource + "bg/bg6.jpg')";
// PanelYearFilter.style.backgroundSize = 'cover';
PanelGenderFilter.style.backgroundImage = "url('"+FolderSource + "bg/bg6.jpg')";
PanelGenderFilter.style.backgroundSize = 'cover';
PanelHeader.style.visibility = 'hidden';
HidePlayingPanel();
CurrentFocus = "filterMovies";
MenuFilters.style.visibility = "visible";
ClearFocusHeader();
LoadFilterByYearPanel();        
if(MenuFilterFocus > 0){
document.getElementById('filterMovieCategory').children[MenuFilterFocus].className = 'OptionsFilter';
document.getElementById('filterMovieCategory').children[MenuFilterFocus].className = 'OptionFocus';

} else if(MenuFilterFocus == 0){
document.getElementById('filterMovieCategory').children[0].className = 'OptionFocus';
}
}        
/*******************************************************************************
* 
*******************************************************************************/

function ShowPlayingPanel(){
PlayingPanel.style.visibility = 'visible';

PlayinPanelActive = true;

if(OptionText !== 'pause'){
clearTimeout(PlayingPanelTimer);

/* Contador para ocultar contenedor principal con la informacion*/
PlayingPanelTimer = setTimeout(HidePlayingPanel,7000);
} else {
clearTimeout(PlayingPanelTimer);
}

PlayingTitle.textContent = MoviesList[MovieBox.id].TTLE;

UpdateBarStatus();

clearTimeout(BarUpdate);

BarUpdate = setInterval(UpdateBarStatus,1000);

//SetFocusPlaying('right');
}
function HidePlayingPanel(){
if(PlayinPanelActive === true){
PlayingPanel.style.visibility = 'hidden';

PlayinPanelActive = false;

clearTimeout(PlayingPanelTimer);

clearTimeout(BarUpdate);

ExitPlaying.classList.remove('ButtonFocus');
}
}

function SetFocusPlaying(Direction){
if(PlayinPanelActive === true){

if(PlayingFocus >= 0 && PlayingFocus < PlayingNodesArray.length){
PlayingOptionsNodes[PlayingNodesArray[PlayingFocus]].classList.remove('ButtonFocus');
}

(Direction === 'right') ? PlayingFocus++: PlayingFocus--;


if(PlayingFocus >= PlayingNodesArray.length){
PlayingFocus = (PlayingNodesArray.length -1 );
} else if(PlayingFocus < 0){
PlayingFocus = 0;
}

PlayingOptionsNodes[PlayingNodesArray[PlayingFocus]].classList.add('ButtonFocus');

/* */
clearTimeout(PlayingPanelTimer);

PlayingPanelTimer = setTimeout(HidePlayingPanel,7000);

}
}


function ClearFocusPlaying(){
var IndexC = 0;

for(IndexC = 0; IndexC < PlayingNodesArray.length; IndexC++){
PlayingOptionsNodes[PlayingNodesArray[IndexC]].classList.remove('ButtonFocus');
}
}

function SelectPlayingOption(){

if(PlayinPanelActive === true){


switch (PlayingNodesArray[PlayingFocus]) {
case 1:
// Backward
SetSpeed('backward');
break;

case 3:
// Play
SetSpeed('play');
break;

case 5:
// Pause
SetSpeed('pause');
break;

case 7:
// Forward
SetSpeed('forward');
break;

// case 8:
//     // close
// break;
}

if(OptionText !== 'pause'){
clearTimeout(PlayingPanelTimer);

/* Contador para ocultar contenedor principal con la informacion*/
PlayingPanelTimer = setTimeout(HidePlayingPanel,7000);
} else {
clearTimeout(PlayingPanelTimer);
}
}
}


function SetFocusClose(){

ClearFocusPlaying();

ExitPlaying.classList.add('ButtonFocus');

PlayingFocus++;

CurrentFocus = 'StopPlaying';

clearTimeout(PlayingPanelTimer);

PlayingPanelTimer = setTimeout(HidePlayingPanel,7000);
}

function UnsetFocusClose(){
ExitPlaying.classList.remove('ButtonFocus');

SetFocusPlaying('left');

CurrentFocus = 'Playing';
}
/*******************************************************************************
* Opciones reproduccion
*******************************************************************************/

function SetSpeed(Option){
if(Option === 'forward'){
UpdatePosition('add');
} else if(Option === 'backward'){
UpdatePosition('subtract');
} else if(Option === 'pause'){
PauseVideo();
} else if(Option === 'play'){
ResumeVideo();
}

OptionText = Option;
}

function UpdateBarStatus(){

AssetStatus(MoviesList[MovieBox.id].MNTS);

BarPosition.style.width = PercentagePosition +'%';
InfoPosition.textContent = SecondsToTime(PositionAsset) + ' / '+MoviesList[MovieBox.id].DRTN;
PlayingSpeed.textContent = SpeedText;
}
/*******************************************************************************
* 
*******************************************************************************/

function StopCloseMovie(){

Debug('SetMoviesStatistics');
SetMoviesStatistics();

HidePlayingPanel();

StopVideo();

ListPanel.style.visibility  = 'visible';
MoviePanel.style.visibility = 'hidden';
BackgroundPanel.style.visibility = 'visible';

CurrentFocus = 'Movies';

BackgroundPanel.style.backgroundImage = "url('"+FolderSource + "bg/2542.jpg')";
}

/*******************************************************************************
* 
*******************************************************************************/

/*******************************************************************************
* Navegacion 
*******************************************************************************/

function VodRight(){
if(CurrentFocus === 'Menu'){
//
let recommendedMoviesList = document.getElementById('RecommendedMoviesList').children;
CurrentFocus = 'Movies'            
ClearFocusHeader();
recommendedMoviesList[0].style.border = '3px solid #fff';    
} else if(CurrentFocus === 'Movies'){
SetFocusMovie('right');
} else if(CurrentFocus === 'MoviePanel'){
SetFocusOnMoviePanel();
} else if(CurrentFocus === 'Playing'){
SetFocusPlaying('right');
} else if(CurrentFocus === 'filterMovies'){
var aux = '';
var NodesFilterMovieCategory= FilterMovieCategoryPanel.childNodes;
NodesFilterMovieCategory.forEach(element => {
if(element.className == 'OptionFocus'){
aux= element.innerHTML;
}
});
if(aux == 'By Year'){
CurrentFocus = 'SelectYear'
SetFocusOnListYear('set');
}else if(aux == 'By Gender'){
CurrentFocus = 'SelectGender'
SetFocusOnListGender('set');
}


} else if(CurrentFocus === 'SelectYear'){
SetFocusOnListYear('right');
} else if(CurrentFocus === 'SelectMovieByYear'){
SetFocusOnMovieByYear('right');
} else if(CurrentFocus === 'SelectGender'){
SetFocusOnListGender('right');
} else if(CurrentFocus == 'SelectMovieByGender'){
SetFocusOnMovieByGender('right');
} else if(CurrentFocus == 'AllMovies'){
SetFocusOnAllMovie('right');
}
}

function VodLeft(){
if(CurrentFocus === 'Menu'){
///
} else if(CurrentFocus === 'Movies'){
SetFocusMovie('left');
} else if(CurrentFocus === 'MoviePanel'){
SetFocusOnMoviePanel();
} else if(CurrentFocus === 'Playing'){
SetFocusPlaying('left');
} else if(CurrentFocus == 'SelectMovieByYear'){
SetFocusOnMovieByYear('left');
} else if(CurrentFocus == 'SelectYear'){
SetFocusOnListYear('left');
} else if(CurrentFocus === 'SelectGender'){
SetFocusOnListGender('left');
} else if(CurrentFocus == 'SelectMovieByGender'){
SetFocusOnMovieByGender('left');
} else if(CurrentFocus == 'AllMovies'){
SetFocusOnAllMovie('left');
}
}

function VodDown(){
if(CurrentFocus === 'Menu'){
SetFocusHeader('down');
} else if(CurrentFocus === 'Movies'){
SetFocusMovie('down');
} else if(CurrentFocus === 'MoviePanel'){
SetFocusOnMoviePanel();
} else if(CurrentFocus === 'StopPlaying'){
UnsetFocusClose();
} else if(CurrentFocus === 'filterMovies'){
setFocusMenuFilter('down');
} else if(CurrentFocus === 'SelectYear'){
SetFocusOnListYear('down');
} else if(CurrentFocus === 'SelectGender'){
SetFocusOnListGender('down');
} else if (CurrentFocus === 'AllMovies') {
SetFocusOnAllMovie('down');
} else if(CurrentFocus == 'SelectMovieByYear'){
SetFocusOnMovieByYear('down');
} else if(CurrentFocus == 'SelectMovieByGender'){
SetFocusOnMovieByGender('down');
}
}

function VodUp(){
if(CurrentFocus === 'Menu'){
SetFocusHeader('up');
} else if(CurrentFocus === 'Movies'){
SetFocusMovie('up');
} else if(CurrentFocus === 'MoviePanel'){
SetFocusOnMoviePanel();
} else if(CurrentFocus === 'Playing'){
SetFocusClose();
} else if(CurrentFocus === 'filterMovies'){
setFocusMenuFilter('up')
} else if(CurrentFocus === 'SelectYear'){
SetFocusOnListYear('up');
} else if(CurrentFocus === 'SelectGender'){
SetFocusOnListGender('up');
}else if(CurrentFocus === 'AllMovies'){
SetFocusOnAllMovie('up');
} else if(CurrentFocus == 'SelectMovieByYear'){
SetFocusOnMovieByYear('up');
}  else if(CurrentFocus == 'SelectMovieByGender'){
SetFocusOnMovieByGender('up');
}
}

function VodClose(){
if(CurrentFocus === 'Playing' || CurrentFocus === 'StopPlaying'){
HidePlayingPanel();
}
}

function VodOk(){
if(CurrentFocus === 'Menu'){
SelectMenuOption();
} else if(CurrentFocus === 'Movies'){
LoadMoviePanel('RecommendedMoviesList');
PanelRight.style.visibility = "hidden";
//ClearFocusMovieList('RecommendedMoviesList');
} else if(CurrentFocus === 'MoviePanel'){
ExecOptionMoviePanel();
} else if(CurrentFocus === 'Playing'){
SelectPlayingOption();
} else if(CurrentFocus === 'StopPlaying'){
StopCloseMovie();
} else if(CurrentFocus === 'filterMovies'){
if(MenuFilterFocus === 2){
MenuFilters.style.visibility = "hidden";
PanelGenderFilter.style.visibility = "hidden";
PanelYearFilter.style.visibility = "hidden";
PanelHeader.style.visibility = 'visible';
PanelRight.style.visibility = "visible";
HidePlayingPanel();
CurrentFocus = 'Menu';
IsMenuFilterSelected = false;
PanelRight.style.height= '95%';
}

} else if (CurrentFocus === 'AllMovies') {
LoadMoviePanel('AllMoviesList');
PanelRight.style.visibility = "hidden";
//ClearFocusMovieList('AllMoviesList');
} else if (CurrentFocus === 'SelectMovieByYear'){
LoadMoviePanel('moviesFilter');
PanelYearFilter.style.visibility = 'hidden';
} else if (CurrentFocus === 'SelectMovieByGender') {
LoadMoviePanel('moviesGenderFilter');
PanelGenderFilter.style.visibility = 'hidden';
PanelYearFilter.style.visibility = 'hidden';

}
}

function VodInfo(){
if(CurrentFocus === 'Playing' || CurrentFocus === 'StopPlaying'){
ShowPlayingPanel();
}
}

//utilidades
function  getimageMovie(movie){
return FolderSource + movie.FLDR + movie.PSTR;
}
function refreshmoviesList(movies, filter) {
if(filter == 'year'){
//eliminando pelicuals del panel
let el = document.getElementById('moviesFilter');
let padre = el.parentNode;
padre.removeChild(el);
let div = document.createElement('div');
div.setAttribute('id', 'moviesFilter');
div.className='wraper';
padre.appendChild(div);

//setear nuecvas pelicuasl 
movies.forEach(movie => {
BoxDiv    = document.createElement('div');
BoxDiv.className = 'moviePoster';
BoxPoster = document.createElement('img');
BoxTitle  = document.createElement('p');
BoxPoster.src = getimageMovie(movie);
BoxTitle.textContent = movie.TTLE;

BoxDiv.appendChild(BoxPoster);
BoxDiv.appendChild(BoxTitle);

document.getElementById('moviesFilter').append(BoxDiv);

});

}else if(filter == 'gender'){
//eliminando peliculas del panel
let el = document.getElementById('moviesGenderFilter');
let padre = el.parentNode;
padre.removeChild(el);
let div = document.createElement('div');
div.setAttribute('id', 'moviesGenderFilter');
div.className='wraper';
padre.appendChild(div);

//setear nuevas peliculas

movies.forEach(movie => {
BoxDiv    = document.createElement('div');
BoxDiv.className = 'moviePoster';
BoxPoster = document.createElement('img');
BoxTitle  = document.createElement('p');
BoxPoster.src = getimageMovie(movie);
BoxTitle.textContent = movie.TTLE;

BoxDiv.appendChild(BoxPoster);
BoxDiv.appendChild(BoxTitle);

document.getElementById('moviesGenderFilter').append(BoxDiv);

});

}else if(filter == 'recommended'){
//eliminando peliculas del panel
let el = document.getElementById('RecommendedMoviesList');
let padre = el.parentNode;
padre.removeChild(el);
let div = document.createElement('div');
div.setAttribute('id', 'RecommendedMoviesList');
div.className='wraper-RecommendedMovies';
padre.appendChild(div);

//setear nuevas peliculas

movies.forEach(movie => {
BoxDiv    = document.createElement('div');
BoxDiv.className = 'moviePoster';
BoxPoster = document.createElement('img');
BoxTitle  = document.createElement('p');
BoxPoster.src = getimageMovie(movie);
BoxTitle.textContent = movie.TTLE;

BoxDiv.appendChild(BoxPoster);
BoxDiv.appendChild(BoxTitle);

document.getElementById('RecommendedMoviesList').append(BoxDiv);

});
} else if(filter == 'allmovies'){
//eliminando peliculas del panel
let el = document.getElementById('AllMoviesList');
let padre = el.parentNode;
padre.removeChild(el);
let div = document.createElement('div');
div.setAttribute('id', 'AllMoviesList');
div.className='wraper';
padre.appendChild(div);

//setear nuevas peliculas

movies.forEach(movie => {
BoxDiv    = document.createElement('div');
BoxDiv.className = 'moviePoster';
BoxPoster = document.createElement('img');
BoxTitle  = document.createElement('p');
BoxPoster.src = getimageMovie(movie);
BoxTitle.textContent = movie.TTLE;

BoxDiv.appendChild(BoxPoster);
BoxDiv.appendChild(BoxTitle);

document.getElementById('AllMoviesList').append(BoxDiv);

});
}
}

function crearMatriz(Rows, length){
var matrix = [];
var aux= 0;
var contador = 0;
for(var i=0; i<Rows; i++) {
matrix[i] = new Array(4);
}
for (let y = 0; y < matrix.length; y++) {
for (let x = 0; x < 4; x++) {
matrix[y][x]=aux++;                 
}   
}

for (let y = 0; y < matrix.length; y++) {
for (let x = 0; x < 4; x++) {
contador++;
if (contador>length) {
matrix[y][x]=0;
}
}
}
return matrix;

}
function getPositionInAllMovies(AllMoviesListNodes){
var position = -1;
for (let x = 0; x < AllMoviesListNodes.length; x++) {
if (AllMoviesListNodes[x].style.border == '3px solid rgb(255, 255, 255)') {
position=x;
} 
}
return position;
}