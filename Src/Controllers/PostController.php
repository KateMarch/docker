<?php

namespace Src\Controllers;

use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use ORM;
use Src\service\AuthService;

class PostController
{
public function store(ServerRequest $request)
{
    $params = $request->getParsedBody()['text'];
    $AuthService = new AuthService();
    $users_id = $AuthService->getUserId();
    $text = ORM::for_table('text')->create();
    $text->text = $params;
    $text->users_id = $users_id;
    $text->save();

    return new RedirectResponse('/profile');
}
}