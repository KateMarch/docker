<?php

namespace Src\Controllers;

use Laminas\Diactoros\ServerRequest;
use MiladRahimi\PhpRouter\View\View;

class MainController
{

    public function indexPage(View $view)
    {
        $items = \ORM::forTable('text')->find_many();
        return $view->make('index', [
            'items'=>$items
        ]);
    }
    public function loginPage(View $view)
    {
        return $view->make('login');
    }
    public function regPage(View $view)
    {
        return $view->make('reg');
    }
    public function profilePage(View $view)
    {
        return $view->make('profile');
    }

    public function post(View $view)
    {
        return $view->make('text');
    }
}