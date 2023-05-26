<?php

namespace app\controller;

require_once __DIR__ . "/basecontroller.php";
require_once __DIR__ . "/../models/addressmodel.php";

use app\models\AddressModel;
use app\controller\Basecontroller;

class AddressController extends Basecontroller
{
  public function __construct()
  {
    $this->model = new AddressModel();
  }

  public function index()
  {
    require_once __DIR__ . "/../../index.php";
  }

  public function show()
  {
    $result = $this->model->selectData('address');
    $addresses = [];
    foreach ($result as $res) {
      $address = new AddressModel();
      $address->id = $res->id;
      $address->name_address = $res->name_address;

      $addresses[] = $address;
    }
    $this->loadview('add', $addresses);
  }
  public function get_name_address($id_address)
  {

    $name_address = $this->model->selectData("address", 'id=' . $id_address);
    $name = $name_address[0]->name_address;
    return $name;
  }

  public function search()
  {

    $result = $this->model->selectData('address');
    $addresses = [];
    foreach ($result as $res) {
      $address = new AddressModel();
      $address->id = $res->id;
      $address->name_address = $res->name_address;

      $addresses[] = $address;
    }
    $this->loadview('search', $addresses);
  }
  
  public function search_update()
  {

    $result = $this->model->selectData('address');
    $addresses = [];
    foreach ($result as $res) {
      $address = new AddressModel();
      $address->id = $res->id;
      $address->name_address = $res->name_address;

      $addresses[] = $address;
    }
    $this->loadview('update', $addresses);
  }
}
