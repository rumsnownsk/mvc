<?php

namespace App\controllers;

use App\models\User;
use App\core\View;

class Users
{
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function index(){
        $users = new User();
        $data['users'] = $users->allUsers();
        $data['hello'] = 'hellow!!';

        $this->view->render('users/index', $data);
    }

    public function create(){
        $view = new View();
        $view->render('users/create');
    }

    public function store(){
        $name = $_POST['name'];
        $user = new User();
        $user->name = $name;
        $user->save();
        header('Location: http://mvc/users/');
    }

    public function findUser(){
        $like = $_GET['like'];
        $user = new User();
        $res = $user->findUser($like);

        $data['resFind'] = $res;
        $data['users'] = $user->allUsers();

        $view = new View();
        $view->render('users/index', $data);
    }
}