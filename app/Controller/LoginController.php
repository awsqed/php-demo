<?php
namespace App\Controller;

use App\Core\Controller;
use App\Ultility\Utils;
use App\Ultility\Session;

class LoginController extends Controller {

    function __construct() {
        parent::__construct();
        $this->bindModel('LoginModel');
    }

    public function index() {
        $this->checkUnauthenticated();
        $this->view->render(
            'login/index',
            [
                'title' => 'Login'
            ]
        );
    }

    public function signin() {
        $this->checkUnauthenticated();
        $username = Utils::validateInput($_POST['username']);
        $password = Utils::validateInput($_POST['password']);

        $userId = $this->model->login($username, $password);
        Session::put('USER_ID', $userId);
        die(json_encode([
            'success'  => true,
            'message'  => 'User is logged in.',
            'redirect' => '/profile'
        ]));
    }

    public function signout() {
        $this->checkAuthenticated();
        Session::destroy();
        die(json_encode([
            'success' => true
        ]));
    }

}
