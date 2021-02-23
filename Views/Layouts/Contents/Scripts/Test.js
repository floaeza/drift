    var MoviesList = [];
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
function init (){
    GetMoviesList();
    PlayVideo(Libraries['MoviesSource'] + MoviesList[5].FLDR + MoviesList[5].FILE);
    console.log(MoviesList);
}
setTimeout(init, 300);