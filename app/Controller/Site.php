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
   public function registerForm(): string
{
    return new \Src\View('site.register');
}
   public function register(Request $request): string
{
    $data = $request->all();

    
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        return 'Неверный email';
    }

    if (strlen($data['password']) < 6) {
        return 'Пароль должен быть не менее 6 символов';
    }

    
    $user = User::create([
        'email' => $data['email'],
        'password' => password_hash($data['password'], PASSWORD_DEFAULT)
    ]);

    return 'Пользователь зарегистрирован!';
}

}
