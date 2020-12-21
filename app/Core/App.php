<?php
namespace App\Core;

class App {

    private $validControllers = [
        'pages'    => ['index'],
        'login'    => ['index', 'signin', 'signout'],
        'register' => ['index', 'signup'],
        'profile'  => ['index', 'edit', 'delete']
    ];
    private $controller = 'pages';
    private $action     = 'index';
    private $params     = [];

    function __construct() {
        $url = filter_var(trim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL);
        // $url = 'profile/index';
        $arr = explode('/', $url);

        if (!empty($arr[0]) && isset($this->validControllers[$arr[0]])) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }

        if (!empty($arr[1]) && in_array($arr[1], $this->validControllers[$this->controller])) {
            $this->action = $arr[1];
            unset($arr[1]);
        }

        $this->params = $arr ? array_values($arr) : [];
    }

    public function run() {
        $controllerName = '\App\Controller\\' . str_replace('_', ' ', ucwords($this->controller, '_')) .'Controller';
        call_user_func_array([new $controllerName, $this->action], $this->params);
    }

}
