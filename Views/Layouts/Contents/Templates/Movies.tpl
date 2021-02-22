<!-- Menu Principal -->
<!-- <div id="NavContainerLeft">
    <div id = "LeftIndicator" class='LeftIndicator'><i class='fa fa-chevron-circle-left'></i></div>
</div> -->
<div id="ListPanel">
	<div id='MenuHeader'>
        <div id='MenuHour'></div>
        <div id='MenuDate'></div>
        <div id='MenuOptions'>
            <div class='MenuOptions'><i class='fa fa-film'></i></div>
            <div class='MenuOptions'><i class='fa fa-filter'></i></div>
            <div class='MenuOptions'></div>
            <div class='MenuOptions'><i class='fa fa-sign-out-alt'></i></div>
        </div>
        <div id='PanelRight'>   
            <div id="NavContainer">
                <div id = "RightIndicator" class='RightIndicator'><i class='fa fa-chevron-circle-right'></i></div>
            </div>
            <div id='PanelRecommendedMovies'>
                <div class="PrincipalMoviesTitle">Recommended Movies</div>
                <div id="RecommendedMoviesList" class="RecommendedMoviesRow"></div>
            </div>
            <div id='PanelAllMovies'>
                <div class="PrincipalMoviesTitle">All Movies</div>
                <div id="AllMoviesList" class="RecommendedMoviesRow"></div>
            </div>
        </div>
    </div>  
</div>
<!-- Fondo de pantalla-->
<div id='BackgroundPanel'></div>
<!-- Menu Filtros-->
<div id="MenuFilters">
    <h2>List Movies</h2>
    <div id="filterMovieCategory">
            <div class='OptionsFilter'>By Year</div>
            <div class='OptionsFilter'>By Gender</div>
            <div class='OptionsFilter'>Regresar</div>
    </div>
</div>
<!-- Panel Genero-->
<div id='PanelGenderFilter'>
    <div id="GenderFilter">
    </div>
    <div id="PanelMoviesByGender">
        <div id="MoviesByGenderList" class="MoviesByGenderRow"></div>
    </div>
    </div>
</div>
<!-- Panel Filtro Año-->
<div id='PanelYearFilter' >
    <div id="yearfilter"></div>
    <div id="PanelMoviesByYear">
        <div id="MoviesByYearList" class="MoviesByYearRow"></div>
    </div>
</div>
<!-- Panel pelicula seleccionada-->
<div id='MoviePanel'>
    <img class='Poster' src=''>
    <div class='MovieTitle'></div>
    <div class='Score'></div>
    <div class='Star'><i class='fa fa-star'></i></div>
    <div class='MovieDuration'></div>
    <div class='Genders'></div>
    <div class='Year'></div>
    <div class='Rating'></div>
    <div class='MovieDescription'></div>
    <div class='Director'></div>
    <div class='Casting'></div>    
    <div class='Buttons' id='PlayPanel'><i class='fa fa-play'></i> Play</div>
    <div class='Buttons' id='ExitPanel'><i class='fa fa-times'></i> Exit</div>
</div>
<!-- Panel reproduciendo pelicula-->
<div id='PlayingPanel'>
    <div class='PlayingHeader'>
        <div id='PlayingTitle'></div>
        <div id='InfoPosition'></div>
        <div id='PlayingSpeed'></div>
        <!-- <div id='ExitPlaying'><i class='fa fa-times'></i></div> -->
    </div>
    <div class='PlayingBar'>
        <div id='PlayingPosition'><i class='fa fa-circle'></i></div>
    </div>
    
    <div id='PlayingOptions'>
        <div class='ButtonPlaying'><i class='fa fa-backward'></i></div>
        <div class='ButtonPlaying'><i class='fa fa-play'></i></div>
        <div class='ButtonPlaying'><i class='fa fa-pause'></i></div>
        <div class='ButtonPlaying'><i class='fa fa-forward'></i></div>
    </div>
</div>
<div id="PlayingPanelHidden">
    <div class="PlayingOptionsHidden">
        <div class="ButtonContainer">
            <div id ="OnBackward" class='ButtonPlayingHidden'><i class='fa fa-backward'></i></div>
        </div>
        <div class="ButtonContainer">
            <div id="OnPlay" class='ButtonPlayingHidden'><i class='fa fa-play'></i></div>
        </div>
        <div class="ButtonContainer">
            <div id="OnPause" class='ButtonPlayingHidden'><i class='fa fa-pause'></i></div>
        </div>
        <div class="ButtonContainer">
            <div id="Onforward" class='ButtonPlayingHidden'><i class='fa fa-forward'></i></div>
        </div>
    </div>
</div>