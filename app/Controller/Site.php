<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;

class Site
{
   public function index(Request $request): string
    {
    $posts = Post::where('id', $request->id)->get();
    return (new View())->render('site.post', ['posts' => $posts]);
    }

   public function hello(): string
   {
        $user = Auth::user();
        $stats = [
        'students' => \Model\Student::count(),
        'groups' => \Model\Group::count(),
        'disciplines' => \Model\Disciplines::count()
    ];
    
    return (new View())->render('site.hello', [
        'user' => $user,
        'stats' => $stats
    ]);
   }
    public function signup(Request $request): string
{
    if ($request->method === 'POST') {
        $validator = new Validator($request->all(), [
            'full_name' => ['required'],
            'login' => ['required', 'unique:users,login'],
            'password' => ['required']
        ], [
            'required' => 'Поле :field пусто',
            'unique' => 'Пользователь с таким логином уже существует'
        ]);

        if ($validator->fails()) {
            return (new View())->render('site.signup', [
                'errors' => $validator->errors()  // ← Передаем массив ошибок
            ]);
        }

        if (User::create($request->all())) {
            app()->route->redirect('/login');
        }
    }
    
    return (new View())->render('site.signup');
}

public function login(Request $request): string
{
   if ($request->method === 'GET') {
       return new View('site.login');
   }
   if (Auth::attempt($request->all())) {
       app()->route->redirect('/hello');
   }
   return new View('site.login', ['message' => 'Неправильные логин или пароль']);
}

public function logout(): void
{
   Auth::logout();
   app()->route->redirect('/hello');
}


}
