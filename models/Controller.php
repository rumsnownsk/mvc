<?php

namespace App\controllers;

use App\core\View;

abstract class Controller
{
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }
}