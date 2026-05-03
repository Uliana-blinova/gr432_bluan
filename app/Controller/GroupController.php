<?php
namespace Controller;

use Model\Group;
use Src\View;
use Src\Request;

class GroupController{
    public function index(): string{
        $groups = Group::all();
        return (new View())->render('groups.index', ['groups' => $groups]);
    }
    public function create(): string{
        $groups = Group::get();
        return (new View())->render('groups.create', ['groups' => $groups]);
    }
    public function store(Request $request): void{
        if($request->method === 'POST'){
            Group::create($request->all());
            app()->route->redirect('/groups');
        }
        app()->route->redirect('/groups/create');
    }

}
