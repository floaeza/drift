<!-- Tpl de canales donde creamos los tabs y la funcion de cada uno de ellos
Guillermo Arce
junio 2017-->
<script type="text/javascript" src="[@ProyectURL]/Views/Librarys/loader.js"></script>
<div class="Container thirteen wide column ContainerLayout"> 
    
    <!--div class="fields" style="width: 98%; height: 353px">
        <div class="six wide field" style="width: 49.5%; height: 341px; float: left">
            <div class="ui piled segment" style="border: 1px solid #DEDEDE; border-radius: 7px">
                <h3 class="ui header" style="padding: 25px">
                    <i class="list chart grey icon"></i>
                    <div class="content">
                        [@LabelTitleTopMembersInactive]
                        <div class="sub header">[@LabelsubtitleStadisticsMemberInactive] [@Date]</div>
                    </div>
                </h3>
                [@MemberList]
            </div>
        </div>
        
        <div class="six wide field" style="width: 49.5%; height: 341px; float: right">
            <div class="ui piled segment" style="border: 1px solid #DEDEDE; border-radius: 7px">
                <h3 class="ui header" style="padding: 25px">
                    <i class="bar chart grey icon"></i>
                    <div class="content">
                        [@LabelTitleTopMembersActive]
                        <div class="sub header">[@LabelSubTitleStadisticsMemberActive]</div>
                    </div>
                </h3>
                <div class="six wide field" id="ActiveMembers" style="width: 100%; height: 222px"></div>
            </div>
        </div>
    </div-->

    <br>
    <!--div class="fields" style="width: 98%">
        <div class="ui piled segment" style="border: 1px solid #DEDEDE; border-radius: 7px">
        <h3 class="ui header" style="padding: 25px">
            <i class="list chart grey icon"></i>
            <div class="content">
                [@LabelTitleTopTenChannels]
                <div class="sub header">[@LabelSubtitleTopTenChannels]</div>
            </div>
        </h3>   
        [@TopList]
        </div>        
    </div-->
</div>
<script>  

   //funcion loandig que aparese antes de que carge todos los elementos.
    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });
</script>
<script>
    /*google.charts.load('current', { packages: ['corechart', 'bar', 'scatter']});
    google.charts.setOnLoadCallback(drawStacked);
    
    function drawStacked() {
        console.log("drawStacked");       
        var jsonMemberActive = $.ajax({
                                        type: "POST",
                                        url: "../Querys/Statistics.php?Option=SelectMostActiveMembers",
                                        async: false
                                     }).responseText;
        var objActiveMember = jQuery.parseJSON(jsonMemberActive);
        var dataActiveMember = google.visualization.arrayToDataTable(objActiveMember);
        
        var viewActiveMember = new google.visualization.DataView(dataActiveMember);
        viewActiveMember.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" 
            }]);
        
        var ActiveMemberOptions = {
            isStacked: true,
            animation: { duration: 1200, easing: 'out', startup: true },
            hAxis: { minValue: 0, title: 'Horas' },
            vAxis: { title: 'Miembro' },
            bars: 'horizontal',
            bar : { groupWidth: "90%" }
        };
    
        var ChartActiveMember = new google.charts.Bar(document.getElementById('ActiveMembers'));
        ChartActiveMember.draw(viewActiveMember, ActiveMemberOptions);
     
    }*/
</script>