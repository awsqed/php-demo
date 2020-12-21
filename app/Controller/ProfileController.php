<?php
namespace App\Controller;

use App\Core\Controller;
use App\Ultility\Utils;
use App\Ultility\Session;

class ProfileController extends Controller {

    function __construct() {
        parent::__construct();
        $this->bindModel('ProfileModel');
    }

    public function index() {
        $this->checkAuthenticated();

        $profile = $this->model->getProfile(Session::get('USER_ID'));
        $this->view->render(
            'profile/index',
            [
                'title' => 'Profile',
                'data'  => $profile
            ]
        );
    }

    public function edit() {
        $userId = Session::get('USER_ID');
        $firstName = Utils::validateInput($_POST['fname']);
        $lastName = Utils::validateInput($_POST['lname']);

        $gender = Utils::validateInput($_POST['gender']);
        if ($gender != '0' || !$gender != '1') {
            $gender = null;
        }

        $dateOfBirth = Utils::validateInput($_POST['birthday']);
        $dateOfBirth = empty($dateOfBirth) ? null : $dateOfBirth;

        die(json_encode([
            'success' => $this->model->editProfile($userId, $firstName, $lastName, $gender, $dateOfBirth)
        ]));
    }

    public function delete() {
        $this->checkAuthenticated();

        if ($this->model->deleteProfile(Session::get('USER_ID'))) {
            Session::destroy();
            die(json_encode([
                'success' => true
            ]));
        }
    }

}
