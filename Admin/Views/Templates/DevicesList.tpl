<div class="Container thirteen wide column ContainerLayout">
            <div class="ui segment">
            <h2 class="ui left floated header">[@LabelHeaderFormDispositives]</h2>
            <div class="ui clearing divider"></div>
            <div class="Tabs">

                <ul>
                    <li>
                        <a class="ui card" href="#Tab1">

                            <h3 class="ui header">
                                <i class="teal disk outline icon"></i>
                                <div class="content">
                                [@LabelHeaderFormListDispositives]
                                <div class="sub header">[@LabelSubListDispositives]</div>
                                </div>
                            </h3>
                        </a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab2" id="Opcion"></a>
                    </li>
                    <li>
                        <a class="ui card" href="#Tab3" id="RestartDispositive">
                            <h3 class="ui header">

                                <i class="teal plus icon"></i>
                                <div class="content">
                                [@LabelHeaderFormListDispositivesRestart]
                                <div class="sub header">[@LabelSubListDispositivesRestart]</div>
                                </div>
                            </h3>
                        </a>

                    </li>

                </ul>
                <div>
                    <div id="Tab1">
                        <div class="Filter ui input">
                            <input class="Inputs" id="GlobalFilter" placeholder="[@LabelPlaceHolderFilter]">
                        </div>
                        <div id="tblmultiple"></div>
                    </div>
                    <div id="Tab3">
                            <div class="ui form">
                                <h4 class="ui dividing header">[@LabelHeaderFormDispositivesR]</h4>


                        </div>
                    </div>

                    </div>



            </div>

            <div class="ui inverted active dimmer" id="preloader">
                <div class="ui indeterminate text centered inline loader" id="loader"></div>
            </div>
            </div>
        </div>

<script>
    
    $(document).ready(function() {
        $('#preloader').fadeOut('slow');
    });
    
    //no muestra tab 2
    $('#Opcion').hide();
    /* TAB 1: LISTA DE CANALES*/
    $('#tblmultiple').puidatatable({

            caption: 'Multiple Selection with Metakey',
            paginator: {
                rows: 8
            },
            responsive: true,
            resizableColumns: true,
            columnResizeMode: 'expand',
            emptyMessage: '[@LabelEmptyMessage]',
            columns: [
                { field: 'mac_address', headerText: 'Mac address', sortable: true, filter: true },
                { field: 'ip', headerText: 'Ip',sortable: true, filter: true },

                { field: 'estatus_energia', headerText: 'Estatus energia',sortable: true, filter: true,
                    content: function(response) {
                        if(response.estatus_energia === 'encendido') {
                             var color = 'green';
                        }
                        else if(response.estatus_usuario === 'apagado') {
                             var color = 'red';
                        }
                        return $('<span style="color:'+ color +'; text-transform: uppercase; ">'+ response.estatus_energia +'</span>');
                    }
                }


            ],
            globalFilter: '#GlobalFilter',

        datasource: function(callback)


        {

            $.ajax({
                type: "GET",
                url: '../Querys/DevicesList.php?Option=SelectListDispositive',

            dataType: "json",
                context: this,
                success: function(response) {
                    callback.call(this, response);

    }
            })
            ;
        },
        selectionMode: 'multiple',
        rowSelect: function(event) {


            $('.Tabs').puitabview('enable', 2);

            event.preventDefault();
        }
    });

    //CODIGO PARA EL BOTON REINICIAR DISPOSITIVOS



</script>
