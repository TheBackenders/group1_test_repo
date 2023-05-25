<?php
namespace  app\models;

require_once __DIR__ .'basedModels.php';

class  Familes extends baseModel {

    public int $id ,$count , $id_address;
    public string $name_father , $status  ,$phone;
  

    function __construct()
    {
        parent::__construct();
        
    }


}