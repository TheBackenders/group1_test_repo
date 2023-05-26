<?php 
namespace app\controller;
use app\controller\AddressController;
use app\controller\FamilyController;
require_once __DIR__."/familycontroller.php";
require_once __DIR__."/addresscontroller.php";
class Basecontroller
{
    protected $model;
    public function __construct()
    {
        
    }
    public function loadview($view,$args=[]){
    
        require_once __DIR__."/../../views/".$view.".html";
    }


}
?>