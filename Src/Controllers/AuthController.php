<?php

namespace Src\Controllers;

use Laminas\Diactoros\Response\EmptyResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use ORM;
use Src\service\AuthService;

class AuthController
{
    public function login(ServerRequest $request):RedirectResponse | EmptyResponse {
    $params=$request->getParsedBody();
    $person = ORM::forTable('users')->where('login', $params['login'])->findOne();
    if ($person && $person->password == md5($params['password'])) {
        $auth = new AuthService();
        $auth->login($person->id());
        return new RedirectResponse('/profile');
    }
    else {
        return new EmptyResponse();
    }
    }

    public function register(ServerRequest $request)
    {
        $login = $request->getParsedBody()['login'];
        $password = $request->getParsedBody()['password'];
        $person = ORM::forTable('users')->create();

        $person->login = $login;
        $person->password = md5($password);
        $person->save();
        $auth = new AuthService();
        $auth->login($person->id()."".$person->is_admin);
        return new RedirectResponse('/');
    }
    public function profile(ServerRequest $request)
    {
        $text = $request->getParsedBody()['text'];
        $person = ORM::forTable('text')->create();
        $person->save();
        return new RedirectResponse('/post');
    }



}