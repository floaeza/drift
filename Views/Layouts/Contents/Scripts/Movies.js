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
        MenuHeaderChildren              = MenuHeader.children,
        Header                          = document.getElementById('MenuHeader'),
        ListPanel                       = document.getElementById('ListPanel');
    //variables para las indicaciones de la navegacion
    var RightIndicator                  = document.getElementById('RightIndicator');
    //Variables Panel derecho
    var PanelRight                      = document.getElementById('PanelRight'),
        BackgroundPanel                 = document.getElementById('BackgroundPanel');
        // LeftIndicator                   = document.getElementById('LeftIndicator');
    //Variables Panel pelicula seleccionada
    var MoviePanel                      = document.getElementById('MoviePanel'),
        MoviePanelNodes                 = MoviePanel.childNodes,
        MoviePanelChildren              = MoviePanel.children;
    //Variebles Panel filtro por año
    var PanelYearFilter                 = document.getElementById('PanelYearFilter'),
        YearFilter                      = document.getElementById('yearfilter'),
        YearFilterNodes                 = YearFilter.childNodes,
        YearFilterChildren              = YearFilter.children,
        MoviesByYearList                = document.getElementById('MoviesByYearList'),
        MoviesByYearListNodes           = MoviesByYearList.childNodes,
        MoviesByYearListChildren        = MoviesByYearList.children;  
    //Variebles Panel filtro por genero
    var PanelGenderFilter               = document.getElementById('PanelGenderFilter'),
        GenderFilter                    = document.getElementById('GenderFilter'),
        GenderFIlterNodes               = GenderFilter.childNodes,
        GenderFilterChildren            = GenderFilter.children,
        PanelMoviesGenderFilter         = document.getElementById('MoviesByGenderList'),
        PanelMoviesGenderFilterNodes      = PanelMoviesGenderFilter.childNodes,
        PanelMoviesGenderFilterChildren   = PanelMoviesGenderFilter.children;  
    //Variables Panel peliculas recomendadas
    var RecommendedMoviesList           = document.getElementById('RecommendedMoviesList'),
        RecommendedMoviesListNodes      = RecommendedMoviesList.childNodes,
        RecommendedMoviesListChildren   = RecommendedMoviesList.children;
    //Variables Panel peliculas recomendadas
    var AllMoviesList                   = document.getElementById('AllMoviesList'),
        AllMoviesListNodes              = AllMoviesList.childNodes,
        AllMoviesListChildren           = AllMoviesList.children;
    //Variebles Lista de filtros
    var FilterMovieCategoryList         = document.getElementById('filterMovieCategory'),
        PanelMenuFilters                = document.getElementById('MenuFilters'),
        FilterMovieCategoryListNodes    = FilterMovieCategoryList.childNodes,
        FilterMovieCategoryListChildren = FilterMovieCategoryList.children;
    //Variables Panel Reproduciendo pelicula
    var PlayingPanel                    = document.getElementById('PlayingPanel'),
        PlayingPanelNodes               = PlayingPanel.childNodes,
        PlayingPanelChildren            = PlayingPanel.children,
        PlayingOptions                  = document.getElementById('PlayingOptions'),
        PlayingOptionsNodes             = PlayingOptions.childNodes,
        PlayingOptionsChildren          = PlayingOptions.children,
        OnBackward                      = document.getElementById('OnBackward'),
        OnPlay                          = document.getElementById('OnPlay'),
        OnPause                         = document.getElementById('OnPause'),
        Onforward                       = document.getElementById('Onforward'),
        BarPosition                     = document.getElementById('PlayingPosition'),
        InfoPosition                    = document.getElementById('InfoPosition'),
        PlayingSpeed                    = document.getElementById('PlayingSpeed'),
        ExitPlaying                     = document.getElementById('ExitPlaying'),
        PlayingTitle                    = document.getElementById('PlayingTitle');
    //Variables focus
    var CurrentFocus                    = '';
    //Variables estilos
    var StyleFocusMenuHeader            = 'width: 100px; left: 0px; background-color: rgba(7, 197, 245, 0.88);',
        StyleFocusMovies                = '3px solid rgb(255, 255, 255)',
        StyleFocusMenuFilter            = 'width: 262px; left: 0px; background-color: rgba(7, 197, 245, 0.88);',
        StyleFocusMenuYearFilter        = 'width: 109px; left: 0px; border-top-right-radius: 35px; background-color: rgba(7, 197, 245, 0.88);',
        StyleFocusPanelMovie            = '3px solid rgb(255, 255, 255)',
        StyleFocusPlayingMovie          = 'width: 5%; height: 27%; background-color: rgba(7, 197, 245, 0.88);';
    //Variables de utilidad
    var FolderSource                    = '../../vod/mvs/', 
        y                               = 0,
        yInGenderList                   = 0,
        IsMenuFilterSelected            = false,
        IsOnPlay                        = true,
        MovieOnPlay                     = '',
        BarTimer                        = '',
        BarUpdate                       = '',
        DurationAsset                   = 0,
        PositionAsset                   = 0,
        PercentagePosition              = 0;
    //json
    var MoviesList                      = [],
        FiltersByYear                   = [],
        FiltersByGender                 = [];
/*******************************************************************************
* Carga inicial
*******************************************************************************/
function Init(){ 
    BackgroundPanel.style.backgroundImage = "url('"+FolderSource + "bg/2542.jpg')";
    CurrentFocus = 'MenuHeader';
    SetFocusOnMenuHeader('set');
    GetMoviesList();
    GetFiltersList();
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
//Lista de peliculas por filtro año y genero
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
    }  else if (CurrentFocus === 'FilterMovies'){
        SetFocusOnMenuFilter('right');
    } else if (CurrentFocus === 'SelectYear') {
        SetFocusOnMenuByYear('right');
    } else if (CurrentFocus === 'SelectGender'){
        SetFocusOnMenuByGender('right');
    } else if (CurrentFocus === 'MoviePanel') {
        SetFocusOnMoviePanel('right');
    } else if (CurrentFocus === 'SelectMovieByYear') {
        SetFocusOnMovieByYear('right');
    } else if (CurrentFocus === 'PlayingMovie') {
        SetFocusOnPlayingMovie('right');
    }  else if(CurrentFocus === 'HiddenMode'){
        SetFocusOnHiddenMode('right');
    }
}
function VodLeft(){
    if(CurrentFocus === 'RecommendedMovies'){
        SetFocusOnRecommendedMovies('left');
    } else if (CurrentFocus === 'AllMovies') {
        SetFocusOnAllMovies('left');
    } else if (CurrentFocus === 'SelectYear') {
        SetFocusOnMenuByYear('left');
    } else if (CurrentFocus === 'SelectGender'){
        SetFocusOnMenuByGender('left');
    }  else if (CurrentFocus == 'MoviePanel') {
        SetFocusOnMoviePanel('left');
    }  else if (CurrentFocus === 'SelectMovieByYear') {
        SetFocusOnMovieByYear('left');
    }  else if (CurrentFocus === 'PlayingMovie') {
        SetFocusOnPlayingMovie('left');
    }  else if(CurrentFocus === 'HiddenMode'){
        SetFocusOnHiddenMode('left');
    }
}
function VodDown(){
    if (CurrentFocus === 'MenuHeader') {
        SetFocusOnMenuHeader('down');
    } else if (CurrentFocus === 'RecommendedMovies') {
        SetFocusOnRecommendedMovies('down');
    }  else if (CurrentFocus === 'AllMovies') {
        SetFocusOnAllMovies('down');
    } else if (CurrentFocus === 'FilterMovies'){
        SetFocusOnMenuFilter('down');
    } else if (CurrentFocus === 'SelectYear') {
        SetFocusOnMenuByYear('down');
    } else if (CurrentFocus === 'SelectGender'){
        SetFocusOnMenuByGender('down');
    }  else if (CurrentFocus === 'SelectMovieByYear') {
        SetFocusOnMovieByYear('down');
    } else if(CurrentFocus === 'HiddenMode'){
        SetFocusOnHiddenMode('down');
    } else if (CurrentFocus === 'PlayingMovie') {
        StopCloseMovie();
    }
}
function VodUp(){
    if (CurrentFocus === 'MenuHeader') {
        SetFocusOnMenuHeader('up');
    } else if (CurrentFocus === 'AllMovies') {
        SetFocusOnAllMovies('up');
    }  else if (CurrentFocus === 'FilterMovies'){
        SetFocusOnMenuFilter('up');
    } else if (CurrentFocus === 'SelectYear') {
        SetFocusOnMenuByYear('up');
    } else if (CurrentFocus === 'SelectGender'){
        SetFocusOnMenuByGender('up');
    }  else if (CurrentFocus === 'SelectMovieByYear') {
        SetFocusOnMovieByYear('up');
    } else if (CurrentFocus === 'PlayingMovie') {
        SetFocusOnHiddenMode('set');
    }
}
function VodClose(){
}
function VodOk(){
 if (CurrentFocus === 'MenuHeader') {
     SelectMenuOption();
 } else if (CurrentFocus === 'RecommendedMovies') {
     LoadMoviePanel('RecommendedMoviesList');
 } else if (CurrentFocus === 'MoviePanel') {
     SelectPlayOption();
 } else if (CurrentFocus === 'AllMovies') {
     LoadMoviePanel('AllMoviesList');
 }  else if (CurrentFocus === 'PlayingMovie') {
     SelectPlayingOptions();
 }  else if(CurrentFocus === 'HiddenMode'){
    SetFocusOnHiddenMode('ok');
 } else if (CurrentFocus === 'SelectMovieByYear') {
    LoadMoviePanel('MoviesByYearList');
}
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
                var matrix = getMatrix(rows,MoviesList.length, 4);
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
                        RecommendedMoviesListChildren[0].style.border=StyleFocusMovies;
                    }
                }
                }else{
                RecommendedMoviesListChildren[position].style.border='';
                RecommendedMoviesListChildren[position+1].style.border=StyleFocusMovies;
                }
                IndicateNavRight();
    } else if (Direction == 'left') {
        var position = getPositionFocusInMovies(StyleFocusMovies, RecommendedMoviesListChildren);  
            if (position-1 == -1 && y == 0) {
                CurrentFocus = 'MenuHeader';
                RecommendedMoviesListChildren[0].style.border= '';
            }else if (position-1 == -1 && y!=0) {
                //PENDIENTEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE************
                var position = getPositionFocusInMovies(StyleFocusMovies, RecommendedMoviesListChildren);  
                var rows = Math.ceil(MoviesList.length/4);
                var matrix = getMatrix(rows,MoviesList.length, 4);
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
                        RecommendedMoviesListChildren[3].style.border=StyleFocusMovies;
                    }
                }
            }else{
                RecommendedMoviesListChildren[position].style.border='';
                RecommendedMoviesListChildren[position-1].style.border=StyleFocusMovies;
            }
            // IndicateNavLeft();
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
                var matrix = getMatrix(rows,MoviesList.length, 4);
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
        var matrix = getMatrix(rows,MoviesList.length, 4);
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
        var matrix = getMatrix(rows,MoviesList.length, 4);
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
function SetFocusOnMenuFilter(Direction){
    if (Direction == 'down') {
        FilterMovieCategoryList = document.getElementById('filterMovieCategory');
        FilterMovieCategoryListChildren = FilterMovieCategoryList.children;
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuFilter, FilterMovieCategoryListChildren);
        if (positionFocus+1 >= FilterMovieCategoryListChildren.length) {
            FilterMovieCategoryListChildren[positionFocus].style = '';
            FilterMovieCategoryListChildren[0].style = StyleFocusMenuFilter;
        }else{
            FilterMovieCategoryListChildren[positionFocus].style = '';
            FilterMovieCategoryListChildren[positionFocus+1].style = StyleFocusMenuFilter;
        }
        setFilterMovies(); 
    } else if (Direction == 'up') {
        FilterMovieCategoryList = document.getElementById('filterMovieCategory');
        FilterMovieCategoryListChildren = FilterMovieCategoryList.children;
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuFilter, FilterMovieCategoryListChildren);
        if (positionFocus == 0) {
            FilterMovieCategoryListChildren[positionFocus].style = '';
            FilterMovieCategoryListChildren[(FilterMovieCategoryListChildren.length)-1].style = StyleFocusMenuFilter;
        }else{
            FilterMovieCategoryListChildren[positionFocus].style = '';
            FilterMovieCategoryListChildren[positionFocus-1].style = StyleFocusMenuFilter;
        }
        setFilterMovies();  
        
    } else if (Direction == 'right') {
        var position = getPositionFocusInMenu(StyleFocusMenuFilter, FilterMovieCategoryListChildren);
        switch (position) {
            case 0:
                SetFocusOnMenuByYear('set');
                break;
            case 1:
                // SetFocusOnMenuByGender('set');
                break;
            case 2:
                RecommendedMoviesList           = document.getElementById('RecommendedMoviesList'),
                RecommendedMoviesListChildren   = RecommendedMoviesList.children;
                CurrentFocus= 'RecommendedMovies';
                RecommendedMoviesListChildren[0].style.border = StyleFocusMovies;
                MenuFilters.style.visibility = 'hidden';
                FilterMovieCategoryListChildren[position].style = '';
                Header.style.visibility = 'visible';
                IsMenuFilterSelected = false;
                break;
        }
    }
}
function SetFocusOnMenuByYear(Direction){
    YearFilter                      = document.getElementById('yearfilter'),
    YearFilterNodes                 = YearFilter.childNodes,
    YearFilterChildren              = YearFilter.children;
    if (Direction == 'set') {
        CurrentFocus = 'SelectYear';
        YearFilterChildren[0].style = StyleFocusMenuYearFilter;
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuYearFilter, YearFilterChildren);
        var movies = getMoviesByYear(positionFocus);
        refreshMoviesPrincipalList(movies, 'MoviesByYearList');
    } else if (Direction == 'down') {
        YearFilter = document.getElementById('yearfilter');
        YearFilterChildren = YearFilter.children;
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuYearFilter, YearFilterChildren);
        if (positionFocus+1 >= YearFilterChildren.length) {
            // YearFilterChildren[positionFocus].style = '';
            // YearFilterChildren[0].style = StyleFocusMenuYearFilter;
            return;
        }else{
            YearFilterChildren[positionFocus].style = '';
            YearFilterChildren[positionFocus+1].style = StyleFocusMenuYearFilter;
        }
        var movies = getMoviesByYear(positionFocus+1);
        refreshMoviesPrincipalList(movies, 'MoviesByYearList');
    } else if (Direction == 'up') {
        YearFilter = document.getElementById('yearfilter');
        YearFilterChildren = YearFilter.children;
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuYearFilter, YearFilterChildren);
        if (positionFocus == 0) {
            // YearFilterChildren[positionFocus].style = '';
            // YearFilterChildren[(YearFilterChildren.length)-1].style = StyleFocusMenuYearFilter;
            return;
        }else{
            YearFilterChildren[positionFocus].style = '';
            YearFilterChildren[positionFocus-1].style = StyleFocusMenuYearFilter;
        } 
        var movies = getMoviesByYear(positionFocus-1);
        refreshMoviesPrincipalList(movies, 'MoviesByYearList');
    } else if (Direction == 'right'){
        SetFocusOnMovieByYear('set');
    } else if (Direction == 'left'){
        YearFilter = document.getElementById('yearfilter');
        YearFilterChildren = YearFilter.children;
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuYearFilter, YearFilterChildren);
        YearFilterChildren[positionFocus].style = '';
        CurrentFocus = "FilterMovies";
    }
}
function SetFocusOnMenuByGender(Direction){
    GenderFilter                      = document.getElementById('GenderFilter'),
    GenderFilterNodes                 = GenderFilter.childNodes,
    GenderFilterChildren              = GenderFilter.children;
    if (Direction == 'set') {
        CurrentFocus = 'SelectGender';
        GenderFilterChildren[0].style = StyleFocusMenuYearFilter;
    } else if (Direction == 'down') {
        GenderFilter = document.getElementById('GenderFilter');
        GenderFilterChildren = GenderFilter.children;
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuYearFilter, GenderFilterChildren);
        if (positionFocus+1 >= GenderFilterChildren.length) {
            // GenderFilterChildren[positionFocus].style = '';
            // GenderFilterChildren[0].style = StyleFocusMenuYearFilter;
            var rows = Math.ceil(FiltersByGender.length/10);
            var matrix = getMatrix(rows, FiltersByGender.length, 10);
                yInGenderList = yInGenderList+1;
            var row = matrix[yInGenderList];
            if (row === undefined) {
                yInGenderList= rows-1;
            }else{
                scrollRefreshInGender(row);
                GenderFilter           = document.getElementById('GenderFilter');
                GenderFilterChildren   = GenderFilter.children;
                if (GenderFilterChildren[positionFocus] === undefined) {
                    GenderFilterChildren[0].style=StyleFocusMenuYearFilter;
                } else{
                    GenderFilterChildren[positionFocus].style=StyleFocusMenuYearFilter;
                }
            }
        }else{
            GenderFilterChildren[positionFocus].style = '';
            GenderFilterChildren[positionFocus+1].style = StyleFocusMenuYearFilter;
        }
    } else if (Direction == 'up') {
        GenderFilter = document.getElementById('GenderFilter');
        GenderFilterChildren =  GenderFilter.children;
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuYearFilter, GenderFilterChildren);
        if (positionFocus == 0) {
            // GenderFilterChildren[positionFocus].style = '';
            // GenderFilterChildren[(GenderFilterChildren.length)-1].style = StyleFocusMenuYearFilter;
            var rows = Math.ceil(FiltersByGender.length/10);
            var matrix = getMatrix(rows, FiltersByGender.length, 10);
                yInGenderList = yInGenderList-1;
            var row = matrix[yInGenderList];
            if (row === undefined) {
                yInGenderList= 0;
            }else{
                scrollRefreshInGender(row);
                GenderFilter           = document.getElementById('GenderFilter');
                GenderFilterChildren   = GenderFilter.children;
                if (GenderFilterChildren[positionFocus] === undefined) {
                    GenderFilterChildren[0].style=StyleFocusMenuYearFilter;
                } else{
                    GenderFilterChildren[9].style=StyleFocusMenuYearFilter;
                }
            }
        }else{
            GenderFilterChildren[positionFocus].style = '';
            GenderFilterChildren[positionFocus-1].style = StyleFocusMenuYearFilter;
        } 
    } else if (Direction == 'right'){

    } else if (Direction == 'left'){
        GenderFilter = document.getElementById('GenderFilter');
        GenderFilterChildren = GenderFilter.children;
        var positionFocus = getPositionFocusInMenu(StyleFocusMenuYearFilter, GenderFilterChildren);
        GenderFilterChildren[positionFocus].style = '';
        CurrentFocus = "FilterMovies";
    }
}
function SetFocusOnMoviePanel(Direction){
     MoviePanel                      = document.getElementById('MoviePanel'),
     MoviePanelNodes                 = MoviePanel.childNodes,
     MoviePanelChildren              = MoviePanel.children;
    if (Direction == 'right') {
        var position = getPositionFocusInPanelMovie(StyleFocusPanelMovie, MoviePanelChildren);
        if (position == 12) {
            MoviePanelChildren[position].style.border = '';
            MoviePanelChildren[position-1].style.border = StyleFocusPanelMovie;
        }else{
            MoviePanelChildren[position].style.border = '';
            MoviePanelChildren[position+1].style.border = StyleFocusPanelMovie;
        }
    }else if (Direction == 'left') {
        var position = getPositionFocusInPanelMovie(StyleFocusPanelMovie, MoviePanelChildren);
        if (position == 11) {
            MoviePanelChildren[position].style.border = '';
            MoviePanelChildren[position+1].style.border = StyleFocusPanelMovie;
        }else{
            MoviePanelChildren[position].style.border = '';
            MoviePanelChildren[position-1].style.border = StyleFocusPanelMovie;
        }
    }
}
function SetFocusOnMovieByYear(Direction){
    MoviesByYearList                = document.getElementById('MoviesByYearList'),
    MoviesByYearListNodes           = MoviesByYearList.childNodes,
    MoviesByYearListChildren        = MoviesByYearList.children;
    var MoviesByYearLenght          = MoviesByYearListChildren.length;  
    if (Direction == 'set') {
        CurrentFocus = 'SelectMovieByYear';
        MoviesByYearListChildren[0].style.border = StyleFocusMovies;
    } else if (Direction == 'right') {
        var positionFocus = getPositionFocusInMovies(StyleFocusMovies, MoviesByYearListChildren);
        if (MoviesByYearListChildren[positionFocus+1] === undefined) {
            return;
            }else{
                MoviesByYearListChildren[positionFocus].style.border= '';
                MoviesByYearListChildren[positionFocus+1].style.border= StyleFocusMovies;
            }
    } else if (Direction == 'left') {
        var positionFocus = getPositionFocusInMovies(StyleFocusMovies, MoviesByYearListChildren);
        if (positionFocus%4 == 0) {
            y=0;
            CurrentFocus = 'SelectYear';
            MoviesByYearListChildren[positionFocus].style.border = '';
            }else{
                MoviesByYearListChildren[positionFocus].style.border = '';
                MoviesByYearListChildren[positionFocus-1].style.border = StyleFocusMovies;
            }
    } else if (Direction == 'down') {
        if (MoviesByYearLenght <= 4) {
            return;
        }else{
            var positionFocus = getPositionFocusInMovies(StyleFocusMovies, MoviesByYearListChildren);
            if (MoviesByYearListChildren[positionFocus+4] === undefined) {
                YearFilter                      = document.getElementById('yearfilter'),
                YearFilterNodes                 = YearFilter.childNodes,
                YearFilterChildren              = YearFilter.children;
                var positionYear = getPositionFocusInMenu(StyleFocusMenuYearFilter, YearFilterChildren);
                var movies       = getMoviesByYear(positionYear);
                var rows = Math.ceil(movies.length/4);
                var matrix = getMatrix(rows, movies.length, 4);
                y = y+2;
                var row = matrix[y];
                if (row === undefined ) {
                    y= rows;
                }else{
                    scrollRefresh(y, 'MoviesByYearList', movies);
                    MoviesByYearList           = document.getElementById('MoviesByYearList');
                    MoviesByYearListChildren   = MoviesByYearList.children;
                    if (MoviesByYearListChildren[positionFocus] === undefined) {
                        MoviesByYearListChildren[0].style.border=StyleFocusMovies;
                    } else{
                        MoviesByYearListChildren[positionFocus].style.border=StyleFocusMovies;
                    }
                }

            }else{
                MoviesByYearListChildren[positionFocus].style.border = '';
                MoviesByYearListChildren[positionFocus+4].style.border = StyleFocusMovies;
            } 
        }
    } else if (Direction == 'up') {
        var positionFocus = getPositionFocusInMovies(StyleFocusMovies, MoviesByYearListChildren);
        if (positionFocus<4) {
            YearFilter                      = document.getElementById('yearfilter'),
            YearFilterNodes                 = YearFilter.childNodes,
            YearFilterChildren              = YearFilter.children;
            var movies       = getMoviesByYear(positionYear);
            var positionYear = getPositionFocusInMenu(StyleFocusMenuYearFilter, YearFilterChildren);
            var rows = Math.ceil(movies.length/4);
            var matrix = getMatrix(rows, movies.length, 4);
            y = y-2;
            var row = matrix[y];
            if (row === undefined) {
                y=0;
            }else {
                scrollRefresh(y, 'MoviesByYearList', movies);
                MoviesByYearList           = document.getElementById('MoviesByYearList');
                MoviesByYearListChildren   = MoviesByYearList.children;
                if (MoviesByYearListChildren[positionFocus] === undefined) {
                    MoviesByYearListChildren[0].style.border=StyleFocusMovies;
                } else{
                    MoviesByYearListChildren[positionFocus].style.border=StyleFocusMovies;
                }
            }
    

        }else{
            MoviesByYearListChildren[positionFocus].style.border = '';
            MoviesByYearListChildren[positionFocus-4].style.border = StyleFocusMovies;
}
    }
}
function SetFocusOnPlayingMovie(Direction){
    PlayingOptions                  = document.getElementById('PlayingOptions'),
    PlayingOptionsNodes             = PlayingOptions.childNodes,
    PlayingOptionsChildren          = PlayingOptions.children;
    if (Direction == 'right') {
        var positionFocus = getPositionFocusInMenu(StyleFocusPlayingMovie, PlayingOptionsChildren);
        if (positionFocus+1 >= PlayingOptionsChildren.length) {
             PlayingOptionsChildren[positionFocus].style = '';
             PlayingOptionsChildren[0].style = StyleFocusPlayingMovie;
        }else{
            PlayingOptionsChildren[positionFocus].style = '';
            PlayingOptionsChildren[positionFocus+1].style = StyleFocusPlayingMovie;
        }
    } else if (Direction == 'left') {
        var positionFocus = getPositionFocusInMenu(StyleFocusPlayingMovie, PlayingOptionsChildren);
        if (positionFocus == 0) {
            PlayingOptionsChildren[positionFocus].style = '';
            PlayingOptionsChildren[(PlayingOptionsChildren.length)-1].style = StyleFocusPlayingMovie;
        }else{
            PlayingOptionsChildren[positionFocus].style = '';
            PlayingOptionsChildren[positionFocus-1].style = StyleFocusPlayingMovie;
        } 
    }
}
function SetFocusOnHiddenMode(Direction){
    if(Direction == 'set'){
        CurrentFocus = 'HiddenMode';
        PlayingPanel.style.visibility = 'hidden';
    } else if(Direction == 'right'){
        setSpeed('forward');
        Onforward.style.visibility= 'visible';
        setTimeout(HideOnforward, 3000);
    } else if (Direction == 'left') {
        setSpeed('backward');
        OnBackward.style.visibility= 'visible';
        setTimeout(HideOnBackward, 3000);
    } else if (Direction == 'down') {
        PlayingPanel.style.visibility = 'visible';
        CurrentFocus = 'PlayingMovie';
    } else if (Direction == 'ok') {
        if (IsOnPlay == true) {
            IsOnPlay = false;
            OnPause.style.visibility= 'visible';
            setSpeed('pause');
        }else{
            IsOnPlay = true;  
            OnPause.style.visibility= 'hidden';
            OnPlay.style.visibility= 'visible';
            setSpeed('play');
            setTimeout(HideOnPlay, 3000);
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
function setFilterMovies(){
    var position = getPositionFocusInMenu(StyleFocusMenuFilter, FilterMovieCategoryListChildren);
    switch (position) {
        case 0:
            clearAllPanel();
            LoadFilterByYearPanel();
            break;
        case 1:
            // clearAllPanel();
            // LoadFilterByGenderPanel();
            break;
        case 2:
            clearAllPanel();
            PanelRight.style.visibility = 'visible';
            break;
    }
}
function FiltersList(){
    //Ocultando y abriendo paneles necesarios
    IsMenuFilterSelected = true;
    Header.style.visibility = 'hidden';
    PanelRight.style.visibility = 'hidden';
    CurrentFocus = "FilterMovies";
    MenuFilters.style.visibility = "visible";
    //Seleccionando filtro por años por default
    FilterMovieCategoryListChildren[0].style = StyleFocusMenuFilter;
    LoadFilterByYearPanel();
}
function LoadFilterByYearPanel (){
    PanelYearFilter.style.visibility= 'visible';
    var  element     = document.getElementById('yearfilter'),
         aux         = element.children;
    if (aux.length == 0 ) {
        for (var x = 0; x < FiltersByYear.length; x++) {
            div = document.createElement('div');
            div.innerHTML = FiltersByYear[x];
            div.className = 'yearOpts';
            document.getElementById('yearfilter').appendChild(div);
        }
    }else{
        while (element.firstChild){
            element.removeChild(element.firstChild);
          };
          for (var x = 0; x < FiltersByYear.length; x++) {
            div = document.createElement('div');
            div.innerHTML = FiltersByYear[x];
            div.className = 'yearOpts';
            document.getElementById('yearfilter').appendChild(div);
        }
    }

}
function LoadFilterByGenderPanel(){
    PanelGenderFilter.style.visibility= 'visible';
    var rows = Math.ceil(FiltersByGender.length/10);
    var matrix = getMatrix(rows, FiltersByGender.length, 10);
    scrollRefreshInGender(matrix[yInGenderList]);
}
function LoadMoviePanel(moviesContainer, movieOnPlay){
    if (moviesContainer != undefined) {
        if(MenuFilters.style.visibility == "visible"){
            PanelYearFilter.style.visibility= 'hidden';
            MenuFilters.style.visibility = "hidden"; 
            }
        var moviesArrayElement    = document.getElementById(moviesContainer);
        var movieSelectedPosition = getPositionFocusInMovies(StyleFocusMovies, moviesArrayElement.children);
        var moviesArray           = moviesArrayElement.children;
        var movieTagP             = moviesArray[movieSelectedPosition].getElementsByTagName('p');
        var movieName             = movieTagP[0].innerHTML;
        var buttonPlay            = document.getElementById('PlayPanel'); 
            buttonPlay.style.border = StyleFocusPanelMovie;
        CurrentFocus = 'MoviePanel';
        ListPanel.style.visibility = 'hidden';
        MoviePanel.style.visibility = 'visible';
        PanelRight.style.visibility = 'hidden';
        var Movie = [];
        for (var x = 0; x < MoviesList.length; x++) {      
            if (MoviesList[x].TTLE == movieName) {
                Movie.push(MoviesList[x]);
            }
        }
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
    } else if (movieOnPlay != undefined) {
        if(MenuFilters.style.visibility == "visible"){
            MenuFilters.style.visibility = "hidden"; 
            }
        // var moviesArrayElement    = document.getElementById(moviesContainer);
        // var movieSelectedPosition = getPositionFocusInMovies(StyleFocusMovies, moviesArrayElement.children);
        // var moviesArray           = moviesArrayElement.children;
        // var movieTagP             = moviesArray[movieSelectedPosition].getElementsByTagName('p');
        var movieName                = movieOnPlay;
        var buttonPlay               = document.getElementById('PlayPanel'); 
            buttonPlay.style.border  = StyleFocusPanelMovie;
        CurrentFocus = 'MoviePanel';
        ListPanel.style.visibility   = 'hidden';
        MoviePanel.style.visibility  = 'visible';
        PanelRight.style.visibility  = 'hidden';
        var Movie = [];
        for (var x = 0; x < MoviesList.length; x++) {      
            if (MoviesList[x].TTLE == movieName) {
                Movie.push(MoviesList[x]);
            }
        }
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
    }
  
}
function ExecOptionMoviePanel(){
    if (IsMenuFilterSelected == true) {
        PanelYearFilter.style.visibility= 'visible';
        MenuFilters.style.visibility = "visible";
        MoviePanel.style.visibility = 'hidden'; 
        BackgroundPanel.style.backgroundImage = "url('"+FolderSource + "bg/2542.jpg')";
        CurrentFocus = 'SelectMovieByYear';
    } else {
        RecommendedMoviesList         = document.getElementById('RecommendedMoviesList'),
        RecommendedMoviesListChildren = RecommendedMoviesList.children;
        var position = getPositionFocusInMovies(StyleFocusMovies, RecommendedMoviesListChildren);
        if (position == -1) {
            CurrentFocus = 'AllMovies';
        }else{
            CurrentFocus = 'RecommendedMovies';
        }
        ListPanel.style.visibility = 'visible';
        PanelRight.style.visibility = 'visible';
        MoviePanel.style.visibility = 'hidden';
        BackgroundPanel.style.backgroundImage = "url('"+FolderSource + "bg/2542.jpg')";
    }
}
function PlayingMovie(){
        MovieOnPlay          = MoviePanelNodes[3].innerHTML;
    var movieByName          = getMovieByName(MovieOnPlay);
        PlayingPanel.style.visibility = 'visible';
        BackgroundPanel.style.backgroundImage = "url('./Media/General/loading5.gif')";
        BackgroundPanel.style.backgroundSize = 'auto';
        BackgroundPanel.style.backgroundRepeat = 'no-repeat';
        BackgroundPanel.style.backgroundPosition = 'center';
        BackgroundPanel.style.visibility = 'visible';
        setTimeout(HideLoadingGif,3200);
        PlayVideo(Libraries['MoviesSource'] + movieByName[0].FLDR + movieByName[0].FILE);
        PlayingOptionsChildren[2].style = StyleFocusPlayingMovie;
        CurrentFocus = 'PlayingMovie';
        ClearMoviePanel();
        UpdateBarStatus();
        clearTimeout(BarUpdate);
        BarUpdate = setInterval(UpdateBarStatus,1000);
        setInterval(UpdateBarStatus, 1000);  
}
function HideOnforward (){
 Onforward.style.visibility='hidden';
}
function HideOnBackward (){
    OnBackward.style.visibility='hidden';
}
function HideOnPause (){
    OnPause.style.visibility='hidden';
}
function HideOnPlay (){
    OnPlay.style.visibility='hidden';
}
function UpdateBarStatus(){
    var movieByName          = getMovieByName(MovieOnPlay);
    AssetStatus(movieByName[0].MNTS);
    BarPosition.style.width = PercentagePosition +'%';
    InfoPosition.textContent = SecondsToTime(PositionAsset) + ' / '+movieByName[0].DRTN;
    PlayingTitle.textContent = MovieOnPlay;
    // PlayingSpeed.textContent = SpeedText;
}
function StopCloseMovie(){
 BackgroundPanel.style.visibility='visible';
 HidePlayingPanel();
 StopVideo();
 LoadMoviePanel(undefined, MovieOnPlay);
 CurrentFocus = 'MoviePanel';
 CurrentMovie = MovieOnPlay;
 SetMoviesStatistics();
}
/*******************************************************************************
 * Funciones para acceder al contenido de un menu
 *******************************************************************************/
function SelectMenuOption(){
    var position = getPositionFocusInMenu(StyleFocusMenuHeader, MenuHeaderChildren);
    switch (position) {
        case 0:
            //Lista principal
            break;
        case 1:
            //Filtros
            FiltersList();
            break;
        case 2:
            //Busqeda por palabras
            break;
        case 3:
            //Salir al menu principal
            GoPage('menu.php', Device['MenuId'], 'Menu');
            break;
    }
}
function SelectPlayOption(){
    var position = getPositionFocusInPanelMovie(StyleFocusPanelMovie, MoviePanelChildren);
    switch (position) {
        case 11:
            //Reproducir Pelicula
            PlayingMovie();
            break;
        case 12:
            //Salir
            ExecOptionMoviePanel();
            MoviePanelChildren[12].style.border = '';
            break;
    }
}
function SelectPlayingOptions(){
    var positionFocus = getPositionFocusInMenu(StyleFocusPlayingMovie, PlayingOptionsChildren);
    switch (positionFocus) {
        case 0:
            //Retroceso
            setSpeed('backward');
            break;
        case 1:
            //Play
            setSpeed('play');
            break;
        case 2:
            //Pausa
            setSpeed('pause');
            break;
        case 3:
            setSpeed('forward');
            //Adelanto
            break;
    }
}
 /*******************************************************************************
 * Opciones de reproduccion
 *******************************************************************************/
function setSpeed(Option){
    if(Option === 'forward'){
         UpdatePosition('add');
        } else if(Option === 'backward'){
            UpdatePosition('subtract');
        } else if(Option === 'pause'){
            PauseVideo();
        } else if(Option === 'play'){
            ResumeVideo();
        }
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
function getPositionFocusInPanelMovie(style, panelNodes){
    var position = -1;
    for (var x = 0; x < panelNodes.length; x++) {
        if (panelNodes[x].style.border == style) {
        position=x;
    } 
    }
    return position;
}
function refreshMoviesPrincipalList(moviesList, panel){
            if (panel != 'RecommendedMoviesList' && panel != 'AllMoviesList') {
                    //Eliminando Peliculas del panel
                    var  element    = document.getElementById(panel);
                    var  parent      = element.parentNode;
                         parent.removeChild(element);
                    var  div = document.createElement('div');
                        div.setAttribute('id', panel);
                        if (panel == 'MoviesByYearList') {
                            div.setAttribute('class', 'MoviesByYearRow')
                        }
                        parent.appendChild(div);
                    var rows = Math.ceil(moviesList.length/4);
                    var matrix = getMatrix(rows,moviesList.length, 4);
                    for (var Y = 0; Y < 2; Y++) {
                        for (var X = 0; X < 4; X++) {
                            var peliculaID = matrix[Y][X];
                            if (peliculaID == -1) {
                                return;
                            }else{
                                BoxDiv               = document.createElement('div');
                                BoxDiv.className     = 'RowMovieByYearPoster';
                                BoxPoster            = document.createElement('img');
                                BoxTitle             = document.createElement('p');
                                BoxTitle.style.visibility = 'hidden';
                                BoxPoster.src        = getimageMovie(moviesList[peliculaID]);
                                BoxTitle.textContent = moviesList[peliculaID].TTLE;
                                BoxDiv.appendChild(BoxPoster);
                                BoxDiv.appendChild(BoxTitle);
                                document.getElementById(panel).appendChild(BoxDiv);
                            }
                        }
                    }
            } else{
                    //Eliminando peliculas del panel           
                    var  element    = document.getElementById(panel);
                    var  parent      = element.parentNode;
                        parent.removeChild(element);
                    var  div = document.createElement('div');
                        div.setAttribute('id', panel);
                        if (panel == 'RecommendedMoviesList') {
                            div.setAttribute('class', 'RecommendedMoviesRow')
                        }else if (panel == 'AllMoviesList') {
                            div.setAttribute('class', 'MoviesRow')
                        }
                        parent.appendChild(div);
                    //Seteando nuevas peliculas en el panel         
                    var rows = Math.ceil(moviesList.length/4);
                    var matrix = getMatrix(rows,moviesList.length, 4);
                        // var row = document.createElement('div');
                        //     row.setAttribute('class', 'MoviesRow');
                        //     div.appendChild(row);
                            for (var x = 0; x < 4; x++) {
                                var peliculaID  = matrix[0][x];
                                if (peliculaID == -1) {
                                    return;
                                }else{
                                        BoxDiv               = document.createElement('div');
                                        BoxDiv.className     = 'RowPoster';
                                        BoxPoster            = document.createElement('img');
                                        BoxTitle             = document.createElement('p');
                                        BoxPoster.src        = getimageMovie(moviesList[peliculaID]);
                                        BoxTitle.textContent = moviesList[peliculaID].TTLE;
                                        BoxTitle.style.visibility = 'hidden';
                                        BoxDiv.appendChild(BoxPoster);
                                        BoxDiv.appendChild(BoxTitle);
                                        document.getElementById(panel).appendChild(BoxDiv);

                                }

                            }
            }
                
}
function scrollRefresh(row, panel, moviesList){
    if (panel != 'RecommendedMoviesList' && panel != 'AllMoviesList') {
        //Eliminando peliculas del panel
        debugger
        var  element    = document.getElementById(panel);
        var  parent      = element.parentNode;
             parent.removeChild(element);
        var  div = document.createElement('div');
             div.setAttribute('id', panel);
             if (panel == 'MoviesByYearList') {
                div.setAttribute('class', 'MoviesByYearRow')
            }
            parent.appendChild(div);
            var rows = Math.ceil(moviesList.length/4);
            var matrix = getMatrix(rows,moviesList.length, 4); 
        for (Y = row; Y < row+2; Y++) {
            for (var X = 0; X < 4; X++) {
                var peliculaID  = matrix[Y][X];
                if (peliculaID == -1) {
                    return;
                }else{
                    BoxDiv               = document.createElement('div');
                    BoxDiv.className     = 'RowMovieByYearPoster';
                    BoxPoster            = document.createElement('img');
                    BoxTitle             = document.createElement('p');
                    BoxPoster.src        = getimageMovie(moviesList[peliculaID]);
                    BoxTitle.textContent = moviesList[peliculaID].TTLE;
                    BoxTitle.style.visibility = 'hidden';
                    BoxDiv.appendChild(BoxPoster);
                    BoxDiv.appendChild(BoxTitle);
                    document.getElementById(panel).appendChild(BoxDiv);
                }
        } 
        }
 
    }else{
                    //Eliminando peliculas del panel
                    var  element    = document.getElementById(panel);
                    var  parent      = element.parentNode;
                         parent.removeChild(element);
                    var  div = document.createElement('div');
                         div.setAttribute('id', panel);
                         if (panel == 'RecommendedMoviesList') {
                            div.setAttribute('class', 'RecommendedMoviesRow')
                         }else if (panel == 'AllMoviesList') {
                            div.setAttribute('class', 'MoviesRow')
                         }
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
                            BoxTitle.style.visibility = 'hidden';
                            BoxDiv.appendChild(BoxPoster);
                            BoxDiv.appendChild(BoxTitle);
                            document.getElementById(panel).appendChild(BoxDiv);
                        }
        
                }    
    } 
}
function scrollRefreshInGender(row){
    var  element     = document.getElementById('GenderFilter');
    aux = element.children;
    if (aux.length == 0) {
        for (var x = 0; x < 10; x++) {
            var GenderID = row[x];
            if (GenderID == -1) {
                return;
            }else{
                div = document.createElement('div');
                div.innerHTML = FiltersByGender[GenderID];
                div.className = 'genderOptions';
                document.getElementById('GenderFilter').appendChild(div);
            }

        }
        }else{
            while (element.firstChild){
                element.removeChild(element.firstChild);
            };
            for (var x = 0; x < 10; x++) {
                var GenderID = row[x];
                if (GenderID == -1) {
                    return;
                }else{
                    div = document.createElement('div');
                    div.innerHTML = FiltersByGender[GenderID];
                    div.className = 'genderOptions';
                    document.getElementById('GenderFilter').appendChild(div);
                }


            }
        }
}
function getimageMovie(movie){
    return FolderSource + movie.FLDR + movie.PSTR;
}    
function getMatrix(Rows, length, col){
    var matrix = [];
    var aux= 0;
    var contador = 0;
    for(var i=0; i<Rows; i++) {
    matrix[i] = new Array(col);
    }
    for (var y = 0; y < matrix.length; y++) {
    for (var x = 0; x < col; x++) {
    matrix[y][x]=aux++;                 
    }   
    }
    
    for (var y = 0; y < matrix.length; y++) {
    for (var x = 0; x < col; x++) {
    contador++;
    if (contador>length) {
    matrix[y][x]=-1;
    }
    }
    }
    return matrix;
    
}
function clearAllPanel(){
    PanelRight.style.visibility = 'hidden';
    PanelYearFilter.style.visibility = 'hidden';
    PanelGenderFilter.style.visibility = 'hidden';
}
function getMoviesByYear(position){
    var moviesByYear = [];
    for (var x = 0; x < MoviesList.length; x++) {
        if (MoviesList[x].YEAR == FiltersByYear[position]) {
            moviesByYear.push(MoviesList[x]);
        }
    }
    return moviesByYear;
}
function getMovieByName(name){
    var movieByName = [];
    for (var x = 0; x < MoviesList.length; x++) {
        if (MoviesList[x].TTLE == name) {
            movieByName.push(MoviesList[x]);
        }
    }
    return movieByName;
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
function HideLoadingGif(){
    BackgroundPanel.style.backgroundImage = '';
    BackgroundPanel.style.backgroundRepeat = '';
    BackgroundPanel.style.backgroundPosition = '';
    BackgroundPanel.style.visibility = 'hidden';
    BackgroundPanel.style.backgroundSize = 'cover';
}
function HidePlayingPanel(){
    PlayingPanel.style.visibility = 'hidden';
    clearTimeout(BarUpdate);
}
function changeColor(){
    RightIndicator.style.color = '#ffffff';
    // LeftIndicator.style.color  = '#ffffff';
}
function IndicateNavRight(){
    RightIndicator.style.color = 'red';
    setTimeout(changeColor,300);
}
function IndicateNavLeft(){
    LeftIndicator.style.color = 'red';
    setTimeout(changeColor,300);
}