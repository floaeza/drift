<?php
/**
 * Description of Channels
 *
 * @author memos13
 */
require_once('../Models/Database.php');
class Channel extends Database
{  
    private $ChannelList;
    private $Channel;
    private $ChannelEdit;
    private $ChannelDelet;
     public function __construct($DirectoryLog) {
        $this->Directory = $DirectoryLog;
    }
    
    
    function getChannelEdit() {
        return $this->ChannelEdit;
    }

    function getChannelDelet() {
        return $this->ChannelDelet;
    }
    //creamos la funcion setChannelEdit para editar nuestros datos de la tabla cat_canal, si ocurre cualquier error se guardara el archivo en log.txt
    function setChannelEdit($ChannelEdit , $Channelid) {
        try {
            $this->connect();
            $this->update("canales",$ChannelEdit, "id_canal= $Channelid");
            $this->ChannelEdit = $this->getResult();
            $this->disconnect();
            return $this->ChannelEdit;
        } catch (Exception $e){
            //guarda el error en log.txt
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
        
    }

    function setChannelDelet($ChannelDelet) {
        $this->ChannelDelet = $ChannelDelet;
    }
    //creamos a funcion getChannelList que su funcion es crear un select ala base de datos para mandar a llamar todos los datos que se encuentran en la tabla cat_canal.
    function getChannelList() {
        try {
            $this->connect();
            $this->select("canales", "*", "estaciones ON canales.id_estacion = estaciones.id_estacion",
                                            "",
                                            "");
            $this->ChannelList = $this->getResult();
            $this->disconnect();
            return $this->ChannelList;
        } catch (Exception $e){
            //en caso de error se guarda lo que ocaciono error en log.txt
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
        
    }

    function getChannel() {
        return $this->Channel;
    }

    function setChannelList($ChannelList) {
        $this->ChannelList = $ChannelList;
    }

    function setChannel($Channel) {
        try {
            $this->connect();
            $this->insert("canales",$Channel);
            $this->Channel = $this->getResult();
            $this->disconnect();
            return $this->Channel;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
        $this->Channel = $Channel;
    }
    //funcion para eliminar canal desde su id
    function deleteChannel($ChannelId) {
        try {
            $this->connect();
            $this->delete("canales", "id_canal=$ChannelId");
            $this->Channel = $this->getResult();
            $this->disconnect();
            return $this->Channel;
        } catch (Exception $e){
            $MessageExeption =  chr(13).chr(10).'Date: '.date("l jS \of F Y h:i:s A").' | Exception: ' . $e->getMessage() . '| ErrorCode ' . $e->getCode() . ' | ErrorFile: ' . $e->getFile() . ' | ErrorLine: ' . $e->getLine();
            error_log($MessageExeption, 3, $this->DirectoryLog);
        }
    }    
    //put your code here
}
