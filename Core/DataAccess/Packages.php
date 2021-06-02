<?php
/* Creado por: Tania Maldonado
 * Fecha: Noviembre 2019
 * Tipo: DAO
 */

class Packages extends Database {
    
    private $PackageList;
    private $PackageListById;
    private $PackagesId;
    
    public function __construct($MacAddress, $CurrentModule) {
        $this->ClassFile = 'Packages';
        $this->Device = $MacAddress;
        $this->Module = $CurrentModule;
        $this->Function = '';
    }

    function getPackageList() {
        $this->Function = 'getPackageList';
        
        $this->connect();
        $this->select("paquete_canal","*","canales ON paquete_canal.id_canal = canales.id_canal",
                                          "estaciones ON canales.id_estacion = estaciones.id_estacion");
        $this->PackageList = $this->getResult();
        $this->disconnect();

        return $this->PackageList;
    }
    
    function setPackageList($Package) {
        $this->PackageList = $Package;
    }

    function getPackageListById($PackageId) {
        $this->Function = 'getPackageListById';
        
        $this->connect();
        $this->select("paquete_canal","paquete_canal.id_paquete_canal, canales.id_canal, canales.posicion, canales.audio, canales.programa, paquete_canal.id_paquete, paquete_canal.id_modulo, paquete_canal.numero_canal, canales.src, canales.puerto, canales.id_calidad, estaciones.nombre_canal, estaciones.id_estacion, estaciones.numero_estacion, estaciones.nombre_estacion, estaciones.indicativo, estaciones.logo",
                                      "canales ON paquete_canal.id_canal = canales.id_canal",
                                      "estaciones ON canales.id_estacion = estaciones.id_estacion",
                                      "",
                                      "","id_paquete = '$PackageId'  AND canal_activo = '1' ","","","paquete_canal.numero_canal ASC");
        $this->PackageListById = $this->getResult();

        $this->disconnect();

        return $this->PackageListById;
    }
    
    function getModulesPackageListById($PackageId) {
        $this->Function = 'getModulesPackageListById';
        
        $this->connect();
        $this->select("paquete_canal","*",
                                      "modulos ON paquete_canal.id_modulo = modulos.id_modulo",
                                      "",
                                      "",
                                      "","id_paquete = '$PackageId'  ","","","");
        $this->PackageListById = $this->getResult();

        $this->disconnect();

        return $this->PackageListById;
    }
    
    function getPackageByName($PackageName) {
        $this->Function = 'getPackageByName';
        
        $this->connect();
        $this->select("paquete_canal","*","cat_paquete ON paquete_canal.id_paquete = cat_paquete.id_paquete",
                                        "",
                                        "","","nombre_paquete = '$PackageName'");
        $this->PackageListById = $this->getResult();
        $this->disconnect();

        return $this->PackageListById;
    }
    
    function getPackagesId(){
        $this->Function = 'getPackagesId';
        
        $this->connect();
        $this->select("cat_paquete");
        $this->PackagesId = $this->getResult();
        $this->disconnect();

        return $this->PackagesId;
    }

}