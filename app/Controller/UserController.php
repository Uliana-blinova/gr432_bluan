<?php
namespace Controller;

use Model\User;
use Src\View;
use Src\Request;

class UserController{
    public function index(): string{
        $employees = User::all();
        return (new View())->render('employees.index', ['employees' => $employees]);
    }
    public function create(): string
    {
        return (new View())->render('employees.create');
    }
    
    public function store(Request $request): void
    {
        if ($request->method === 'POST') {
            User::create([
                'full_name' => $request->full_name,
                'login' => $request->login,
                'password' => $request->password,
                'role' => $request->role ?? 'dean'
            ]);
            
            app()->route->redirect('/employees');
            return;
        }
        
        app()->route->redirect('/employees/create');
    }
    public function change_role(Request $request): void 
    {
        
       $employee =  User::findIdentity($request -> employee);
       $employee::update($request);
    }


}

