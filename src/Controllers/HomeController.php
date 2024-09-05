<?php
namespace Src\Controllers;

use Src\Commons\Debug;

class HomeController extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        return $this->view('admin.index');
    }
}