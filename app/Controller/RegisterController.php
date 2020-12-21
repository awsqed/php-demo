<?php
namespace App\Controller;

use App\Core\Controller;
use App\Ultility\Utils;
use App\Ultility\Session;

class RegisterController extends Controller {

    function __construct() {
        parent::__construct();
        $this->bindModel('RegisterModel');
    }

    public function index() {
        $this->checkUnauthenticated();
        $this->view->render(
            'register/index',
            [
                'title' => 'Register'
            ]
        );
    }

    public function signup() {
        $this->checkUnauthenticated();
        $username = Utils::validateInput($_POST['username']);
        if (strlen($username) < 6 || strlen($username) > 18) {
            die(json_encode([
                'success' => false,
                'message' => 'Username must be 6 to 18 characters long.'
            ]));
        }

        $password = Utils::validateInput($_POST['password']);
        if (strlen($password) < 6) {
            die(json_encode([
                'success' => false,
                'message' => 'Password must be at least 6 characters long.'
            ]));
        }

        $hashedPw = password_hash($password, PASSWORD_BCRYPT);
        $userId = $this->model->register($username, $hashedPw);
        Session::put('USER_ID', $userId);
        die(json_encode([
            'success'  => true,
            'message'  => 'Account is created.',
            'redirect' => '/'
        ]));
    }

}
