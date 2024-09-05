<?php

namespace Src\Controllers;

use eftec\bladeone\BladeOne;

class BaseController
{
    public function view($viewFile, $data = [])
    {
        $templatePath = __DIR__ . '/../Views';
        $compiledPath = __DIR__ . '/../../storage';

        $view = new BladeOne($templatePath, $compiledPath);
        echo $view->run($viewFile, $data);
    }
    function redirect($key = "", $msg = "", $url = "")
    {
        $_SESSION[$key] = $msg;
        switch ($key) {
            case "errors":
                unset($_SESSION['success']);
                break;
            case "success":
                unset($_SESSION['errors']);
                break;
        }
        header('location: ' . $_ENV['BASE_URL'] . $url . "?msg=" . $key);
        die;
    }
}