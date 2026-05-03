<?php
namespace Controller;

use Model\Disciplines;
use Src\View;
use Src\Request;

class DisciplineController{
    public function index(): string{
        $disciplines = Disciplines::all();
        return (new View())->render('disciplines.index', ['disciplines' => $disciplines]);
    }
    public function create(): string{
        $disciplines = Disciplines::get();
        return (new View())->render('disciplines.create', ['disciplines' => $disciplines]);
    }
    public function store(Request $request): void{
        if($request->method === 'POST'){
            Disciplines::create($request->all());
            app()->route->redirect('/disciplines');
        }
        app()->route->redirect('/disciplines/create');
    }

}
