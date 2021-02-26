<?php
/* Creado por: Tania Maldonado
 * Fecha: Abril 2020
 * Tipo: DAO
 */

class Programs extends Database {
    
    private $ProgramsList;
    
    public function __construct($MacAddress, $CurrentModule) {
        $this->ClassFile = 'Programs';
        $this->Device = $MacAddress;
        $this->Module = $CurrentModule;
        $this->Function = '';
    }

    function getProgramsToRecord($LocationId) {
        $this->Function = 'getProgramsToRecord';
        
        $this->connect();
        $this->select("pvr_programas", "*", 
                      "", "", "", "", 
                      "id_locacion = '".$LocationId."' AND id_operacion = '1' OR id_operacion = '3'");
        $this->ProgramsList = $this->getResult();

        $this->disconnect();

        return $this->ProgramsList;
    }
    
    function getProgramsRecorded($LocationId) {
        $this->Function = 'getProgramsRecorded';
        
        $this->connect();
        $this->select("pvr_programas", "*", 
                      "dispositivos ON pvr_programas.mac_address_pvr = dispositivos.mac_address", "", "", "", 
                      "id_locacion = '".$LocationId."' AND id_operacion = '4' ");
        $this->ProgramsList = $this->getResult();

        $this->disconnect();

        return $this->ProgramsList;
    }
    
    function getProgramsSchedule($LocationId) {
        $this->Function = 'getProgramsSchedule';
        
        $this->connect();
        // $this->select("pvr_programas", "*", 
        //               "", "", "", "", 
        //               "id_locacion = '".$LocationId."' AND id_operacion = '1' OR id_operacion = '3'");
        $this->selectFromOtherSelect("pvr_programas", "*", 
        "(SELECT * FROM pvr_programas WHERE pvr_programas.id_operacion = 1 OR pvr_programas.id_operacion =3)",
        "(SELECT * FROM pvr_programas WHERE pvr_programas.id_locacion = ".$LocationId.")", "id_programa");

        // SELECT * FROM (SELECT * FROM pvr_programas WHERE pvr_programas.id_operacion = 1 OR pvr_programas.id_operacion =3) t1 
        // INNER JOIN (SELECT * FROM pvr_programas WHERE pvr_programas.id_locacion = 1) t2 ON (t1.id_programa = t2.id_programa)
        $this->ProgramsList = $this->getResult();

        $this->disconnect();

        return $this->ProgramsList;
    } 

    function setProgram($ProgramInfo) {
        $this->Function = 'setProgram';
        
        $this->connect();
        $this->insert("pvr_programas",$ProgramInfo);
        $Result = $this->getResult();
        
        foreach($Result as $row):
            $this->ProgramsList = $row;
        endforeach;

        $this->disconnect();

        return $this->ProgramsList;
    }
    
    function setDeleteProgram($ProgramId, $Operation) {
        $this->Function = 'setDeleteProgram';
        
        $this->connect();
        $this->update("pvr_programas", $Operation, "id_programa = '$ProgramId'");
        $this->ProgramsList = $this->getResult();
        $this->disconnect();

        return $this->ProgramsList;
    }
    
    function getProgramsToSchedule($MacAddress) {
        $this->Function = 'getProgramsToSchedule';
        
        $this->connect();
        $this->select("pvr_programas", "id_programa, titulo_programa, url_canal, utc_inicio, utc_final", 
                      "", "", "", "", 
                      "mac_address_pvr = '".$MacAddress."' AND id_operacion = '1' ");
        $this->ProgramsList = $this->getResult();

        $this->disconnect();

        return $this->ProgramsList;
    }
    
    function updateProgram($ProgramId, $ProgramInfo) {
        $this->Function = 'updateProgram';
        
        $this->connect();
        $this->update("pvr_programas", $ProgramInfo, "id_programa = '$ProgramId'");
        $this->ProgramsList = $this->getResult();

        $this->disconnect();

        return $this->ProgramsList;
    }
    
    function getStatusProgram($ProgramId) {
        $this->Function = 'getStatusProgram';
        
        $this->connect();
        $this->select("pvr_programas", "grabacion_activa", 
                      "", "", "", "", 
                      "id_programa = '".$ProgramId."'");
        $Result = $this->getResult();
              foreach ($Result as $Row):
                  $this->ProgramsList = $Row;
              endforeach;
        
        
        $this->disconnect();

        return $this->ProgramsList;
    }
    
    function getSchedulesToDelete($MacAddress) {
        $this->Function = 'getToSchedulesToDelete';
        
        $this->connect();
        $this->select("pvr_programas", "id_programa, id_asset, id_stream, grabacion_activa", 
                      "", "", "", "", 
                      "mac_address_pvr = '".$MacAddress."' AND id_operacion = '2' ");
        $this->ProgramsList = $this->getResult();

        $this->disconnect();

        return $this->ProgramsList;
    }
    
    function DeleteProgram($ProgramId) {
        $this->Function = 'DeleteProgram';
        
        $this->connect();
        $this->delete("pvr_programas", "id_programa=$ProgramId");
        $this->ProgramsList = $this->getResult();

        $this->disconnect();

        return $this->ProgramsList;
    }
    
}