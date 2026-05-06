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
          if ($request->method === 'POST') {
        $data = $request->all();
        
        $files = $request->files();
        if (!empty($files['photo']['name']) && $files['photo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/uploads/';
            
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $extension = pathinfo($files['photo']['name'], PATHINFO_EXTENSION);
            $filename = 'student_' . time() . '.' . $extension;
            $targetPath = $uploadDir . $filename;
            
            if (move_uploaded_file($files['photo']['tmp_name'], $targetPath)) {
                $data['photo'] = 'uploads/' . $filename;
            }
        }
        
        Student::create($data);
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
