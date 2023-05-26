<?php
namespace  app\models;
require_once __DIR__ .'/basedmodel.php';

class  FamilyModel extends baseModel {

    public int $id ,$count , $id_address;
    public string $name_father , $status  ,$phone,$name_address;
  

    function __construct()
    {
        parent::__construct();
        
    }


}