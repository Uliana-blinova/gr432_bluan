<?php
namespace Controller;

use Model\Student;
use Model\Group;
use Src\View;
use Src\Request;

class StudentController{
    public function index(Request $request): string{
        $students = Student::with('group')->get();
        return (new View())->render('students.index', ['students' => $students]);
    }
    public function create(): string{
        $groups = Group::get();
        return (new View())->render('students.create', ['groups' => $groups]);
    }
    public function store(Request $request): void{
        if($request->method === 'POST'){
            Student::create($request->all());
            app()->route->redirect('/students');
        }
        app()->route->redirect('/students/create');
    }
    public function search(Request $request): string{
        $query = $request->query ?? '';
        $students = Student::where('surname', 'LIKE', "%{$query}%")
                            ->orWhere('name', 'LIKE', "%{$query}%")
                            ->orWhere('patronymic', 'LIKE', "%{$query}%")
                            ->with('group')
                            ->get();
        return (new View())->render('students.index', [
            'students' => $students,
            'query' => $query
        ]);
    }
}
