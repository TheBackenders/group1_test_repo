<?php

namespace app\controller;

require_once __DIR__ . "/../models/familiesmodel.php";
require_once __DIR__ . "/basecontroller.php";

use app\models\FamilyModel;
use app\controller\Basecontroller;

class FamilyController extends Basecontroller
{
  public function __construct()
  {
    $this->model = new FamilyModel();
  }

  public function index()
  {
    require_once __DIR__ . "/../../index.php";
  }
  public function insert()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $name_father = $this->model->name_father = $_POST['name_father'];
      $count = $this->model->count = $_POST['count'];
      $phone = $this->model->phone = $_POST['phone'];
      $address = $this->model->id_address = $_POST['address'];
      $status = $this->model->status = $_POST['status'];
      $data = [
        'name_father' => $name_father,
        'phone' => $phone,
        'id_address' => $address,
        'status' => $status,
        'count' => $count
      ];
      $result = $this->model->insertData('familes', $data);
      if ($result) {
        header('Location:' . BASE_PATH . 'show');
      } else {
        header('Location::' . BASE_PATH);
      }
    } else {
      require_once __DIR__ . '/addresscontroller.php';
      $Addree_controller = new AddressController();
      $Addree_controller->show();
    }
  }
  public function show()
  {
    $result = $this->model->selectData('familes');
    require_once __DIR__ . '/addresscontroller.php';
    $Addree_controller = new AddressController();

    $families = [];
    foreach ($result as $res) {
      $family = new FamilyModel();
      $family->id = $res->id;
      $family->name_father = $res->name_father;
      $family->phone = $res->phone;
      $family->status = $res->status;
      $family->count = $res->count;

      $family->name_address = $Addree_controller->get_name_address($res->id_address);
      $families[] = $family;
    }
    $this->loadview('show', $families);
  }

  public function delete()
  {

    $id = $_GET['id'];

    $result = $this->model->deleteData('familes', 'id=' . $id);
    if ($result) {
      header('Location:' . BASE_PATH . 'show');
    }
    // echo $id;
    // $this->loadview('delete', []);
    // $result=$this->model->delete('families');
  }


  public function update($id)
  {
    require_once __DIR__ . '/addresscontroller.php';
    $Addree_controller = new AddressController();

    $result = $this->model->selectData('familes', 'id=' . $id);
    if ($result) {
      $array_family = $result[0];
      $family = new FamilyModel();
      $family->id = $array_family->id;
      $family->name_father = $array_family->name_father;
      $family->phone = $array_family->phone;
      $family->status = $array_family->status;
      $family->count = $array_family->count;
      // $family->id_address = $array_family->id_address;
      $family->name_address = $Addree_controller->get_name_address($array_family->id_address);
      $families[] = $family;
      $Addree_controller->search_update();
      $this->loadview('update',$families);
  
    } else {
      header('Location:' . BASE_PATH . 'show');
    }  
  
  }
//New edit datat
  public function edite($id)
  {     
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name_father = $this->model->name_father = $_POST['name_father'];
        $count = $this->model->count = $_POST['count'];
        $phone = $this->model->phone = $_POST['phone'];
        $address = $this->model->id_address = $_POST['address'];
        $status = $this->model->status = $_POST['status'];
        $data = [
          'name_father' => $name_father,
          'phone' => $phone,
          'id_address' => $address,
          'status' => $status,
          'count' => $count
        ];
        $result1 = $this->model->updateData('familes',$data,'id='.$id);
        if ($result1) {
          header('Location:' . BASE_PATH . 'show');
        } else {
          header('Location::' . BASE_PATH . 'show');
        }
      }    
  }
//لعرض نتائج البحث
  public function show_search(){

    $id= $_POST['address'];
    $result = $this->model->selectData('familes', ' id_address =' . $id);
    require_once __DIR__ . '/addresscontroller.php';
    $Addree_controller = new AddressController();
 if($result){
    $families = [];
    foreach ($result as $res) {
      $family = new FamilyModel();
      $family->id = $res->id;
      $family->name_father = $res->name_father;
      $family->phone = $res->phone;
      $family->status = $res->status;
      $family->count = $res->count;

      $family->name_address = $Addree_controller->get_name_address($res->id_address);
      $families[] = $family;
    }

  }else {
    require_once __DIR__ . '/addresscontroller.php';
    $Addree_controller = new AddressController();
    $Addree_controller->search();
  }

 $this->loadview('show_search',$families);
  }

  
}
