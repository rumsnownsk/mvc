<?php

namespace App\core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
//        $this->loader = new ArrayLoader([
//            'index' => 'Hello {{ name }}!',
//        ]);
//        $this->twig = new Environment($this->loader);

        $this->loader = new FilesystemLoader('views');
        $this->twig = new Environment($this->loader, [
            'cache' => false
        ]);
    }

    public function render($filename, $data = null)
    {
        echo $this->twig->render($filename.'.html', $data);
//        require_once "views/".$filename.".php";
    }
}