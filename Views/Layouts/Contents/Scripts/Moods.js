/* @Creado por: Tania Maldonado
 * @Fecha: Julio 2020
 * @Tipo: Funciones para controlar el layout de contenido por carpeta 
 * @Secciones: 2
 * image1 [Imagen]
 * video1 [Video]
 */



/*******************************************************************************
 * Variables generales
 *******************************************************************************/

    var MoodsContainer  = document.getElementById('MoodsList'),
        MoodsList       = MoodsContainer.childNodes,
        MoodsListActive = true,
        MoodsNodes      = [1,3,5,7],
        MoodsVideos     = ['Fireplace.mp4','Rain.mp4','Forest.mp4','Waterfall.mp4'],
        IndexMood       = -1,
        MediaSource     = '../../MULTIMEDIA_VPL/Moods/';

    var VideoScreen     = document.getElementById('video1');
        VideoScreen.style.display = 'none';

/*******************************************************************************
 * Contenido multimedia
 *******************************************************************************/

    function HideMoodsPanel(){
        MoodsListActive = false;
        
        MoodsContainer.style.visibility = 'hidden';
        
        VideoScreen.style.display = 'inline';

        VideoScreen.src = MediaSource + MoodsVideos[IndexMood];

        VideoScreen.play();
    }
    
    function ShowMoodsPanel(){
        MoodsListActive = true;
        
        MoodsContainer.style.visibility = 'visible';
        
        VideoScreen.style.display = 'none';
        
        VideoScreen.pause();
    }


    function SetFocus(Direction){
        if(IndexMood >= 0){
            MoodsList[MoodsNodes[IndexMood]].classList.remove('Selected');
        }
        
        (Direction === 'right') ? IndexMood++: IndexMood--;
        
        if(IndexMood >= MoodsNodes.length){
            IndexMood = 0;
        } else if(IndexMood < 0){
            IndexMood = (MoodsNodes.length -1 );
        }

        MoodsList[MoodsNodes[IndexMood]].classList.add('Selected');
    }
    
    SetFocus('right');
/*******************************************************************************
 * Manejador de eventos
 *******************************************************************************/

    VideoScreen.onended = function() {
        VideoScreen.src = MediaSource + MoodsVideos[IndexMood];

        VideoScreen.play();
    }; 

/*******************************************************************************
 * Control 
 *******************************************************************************/

    function MoodsRight(){
        if(MoodsListActive === true){
            SetFocus('right');
        }
    }
    
    function MoodsLeft(){
        if(MoodsListActive === true){
            SetFocus('left');
        }
    }
    
    function MoodsOk(){
        if(MoodsListActive === true){
            HideMoodsPanel();
        }
    }
    
    function MoodsClose(){
        if(MoodsListActive === true){
            GoPage('menu.php', Device['MenuId'], 'Menu');
        } else {
            ShowMoodsPanel();
        }
    }
