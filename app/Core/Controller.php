<?php
namespace App\Core;

use App\Ultility\Utils;
use App\Ultility\Session;

class Controller {
    
    protected $model;
    protected $view;

    function __construct() {
        Session::init();
        $this->view = new View();
    }

    protected function bindModel($modelName) {
        $modelName = "\App\Model\\$modelName";
        $this->model = new $modelName;
    }

    protected function checkAuthenticated() {
        if (!Session::exists('USER_ID')) {
            Session::destroy();
            header('Location: /');
            die();
        }
    }

    protected function checkUnauthenticated() {
        if (Session::exists('USER_ID')) {
            header('Location: /');
            die();
        }
    }

}
