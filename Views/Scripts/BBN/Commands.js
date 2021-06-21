
    function Red(){
        location.reload(true);
    }

    function Blue(){
        window.location.href = 'http://201.116.203.114/BBINCO/TV/index.php';
    }

    function Green(){

    }

    function Yellow(){

    }

    function Close(){
        if(CurrentModule === 'Tv'){
            TvClose();
        } else if(CurrentModule === 'Menu'){
            //
        } else if(CurrentModule === 'Movies'){
            VodClose();
        } else if(CurrentModule === 'Moods'){
            MoodsClose();
        }
    }

    function Back(){
        if(CurrentModule === 'Tv'){
            TvClose();
        } else if(CurrentModule === 'Menu'){
            //
        } else if(CurrentModule === 'Movies'){
            VodClose();
        } else if(CurrentModule === 'Moods'){
            MoodsClose();
        }
    }

    function Menu(){
        if(CurrentModule !== 'Menu' && Device['Services']['ActiveMenu'] === true){
            GoPage('menu.php', Device['MenuId'], 'Menu');
        }
    }
