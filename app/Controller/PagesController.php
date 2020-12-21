<?php
namespace App\Controller;

use App\Core\Controller;
use App\Ultility\Session;

class PagesController extends Controller {

    public function index() {
        $this->view->render(
            'pages/index',
            [
                'title'         => 'Home',
                'is_logged_in'  => Session::exists('USER_ID')
            ]
        );
    }

}
