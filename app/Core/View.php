<?php
namespace App\Core;

class View {

    public function render($filePath, $data = []) {
        $viewFile = "../app/View/$filePath.php";
        if (is_file($viewFile)) {
            extract($data);
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
            require_once '../app/View/layouts/application.php';
        }
    }

}
