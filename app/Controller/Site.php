<?php

namespace Controller;
use Model\User;
use Src\Request;
class Site
{
   public function index(): void
   {
       echo 'working index';
   }

   public function hello(): void
   {
       echo 'working hello';
   }
public function register(Request $request): string
{
    $data = $request->all();
    $message = '';

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $message = 'Неверный email';
    } elseif (strlen($data['password']) < 6) {
        $message = 'Пароль должен быть не менее 6 символов';
    } else {
        User::create([
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
        $message = 'Пользователь зарегистрирован!';
    }

    return new \Src\View('site.register', ['message' => $message]);
}


}
