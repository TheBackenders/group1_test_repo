<?php

use app\controller\AddressController;
use app\controller\FamilyController;
use app\models\FamilyModel;

$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/Darrebni/Family/group1_test_repo/');
// echo $request;
switch ($request) {

    case BASE_PATH:
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->loadview('index', $families = []);
        break;
    case BASE_PATH . 'add':
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->insert();
        break;
    case BASE_PATH . 'show':
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->show();
        break;
    case BASE_PATH . 'delete?id='.$_GET['id']:
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->delete();
        break;

    case BASE_PATH . 'update?id=' . $_GET['id']:
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->update();
        break;

    case BASE_PATH . 'edite?id='. $_GET['id']:
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->edite();
        break;

    case BASE_PATH . 'search':
        require_once __DIR__ . "/app/controllers/addresscontroller.php";
        $controller = new AddressController();
        $controller->search();
        break;

    case BASE_PATH . 'show_search?id='. $_GET['id']:
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->show_search();
        break;
}
