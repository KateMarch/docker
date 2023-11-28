<?php

namespace Src\service;

class AuthService
{
    public function login($id)
    {
        $_SESSION['user'] = $id;
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

    public function getUserId()
    {
        return $_SESSION['user'] ?? null;
    }
    public function post($text)
    {
        $_SESSION['text'] = $text;
    }
}