<?php
namespace Controller;

use Model\User;
use Src\View;

class UserController{
    public function index(): string{
        $employees = User::where('role', 'dean')->get();
        return (new View())->render('employees.index', ['employees' => $employees]);
    }
}
