<?php

use app\controller\AddressController;
use app\controller\FamilyController;
use app\models\FamilyModel;

// //RewriteEngine On

// #accept loading of actual files and and directories
// RewriteCond %{REQUEST_FILENAME} !-f
// RewriteCond %{REQUEST_FILENAME} !-d

// #send everything else to the index page
// RewriteRule ^(.*)$ index.php?id=$1 [L,QSA]

$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/darrbeni/one/Family/group1_test_repo/');
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
    case BASE_PATH . 'delete?id=' . $_GET['id']:
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->delete();
        break;

    case BASE_PATH . 'update?id=' .$_GET['id']:
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->update($_GET['id']);
        break;

    case BASE_PATH . 'edite?id=' .$_GET['id']:
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->edite(1);
        break;

    case BASE_PATH . 'search':
        require_once __DIR__ . "/app/controllers/addresscontroller.php";
        $controller = new AddressController();
        $controller->search();
        break;

    case BASE_PATH . 'show_search':
        require_once __DIR__ . "/app/controllers/familycontroller.php";
        $controller = new FamilyController();
        $controller->show_search();
        break;
}
