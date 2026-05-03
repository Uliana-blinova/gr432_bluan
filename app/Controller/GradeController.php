<?php
namespace Controller;

use Model\Grade;
use Model\Student;
use Model\Disciplines;
use Src\View;
use Src\Request;

class GradeController{
    public function index(): string{
        $grades = Grade::with(['student.group', 'discipline'])->get();
        return (new View())->render('grades.index', ['grades' => $grades]);
    }
    public function create(): string{
        $students = Student::with('group')->get();
        $disciplines = Disciplines::all();
        return (new View())->render('grades.create', [
            'students' => $students,
            'disciplines' => $disciplines
        ]);
    }
    
    public function store(Request $request): void{
        if($request->method === 'POST'){
            $existingGrade = Grade::where('student_id', $request->student_id)
                                  ->where('discipline_id', $request->discipline_id)
                                  ->first();
            
            if($existingGrade){
                $existingGrade->update([
                    'grade_value' => $request->grade_value,
                    'date_recorded' => $request->date_recorded ?? date('Y-m-d')
                ]);
            } else {
                Grade::create([
                    'student_id' => $request->student_id,
                    'discipline_id' => $request->discipline_id,
                    'grade_value' => $request->grade_value,
                    'date_recorded' => $request->date_recorded ?? date('Y-m-d')
                ]);
            }
            
            app()->route->redirect('/grades');
        }
        app()->route->redirect('/grades/create');
    }
    public function getByGroupAndDiscipline($groupId, $disciplineId): string{
        $grades = Grade::whereHas('student', function($q) use ($groupId){
            $q->where('group_id', $groupId);
        })
        ->where('discipline_id', $disciplineId)
        ->with(['student', 'discipline'])
        ->get();
        
        return (new View())->render('grades.by-group-discipline', [
            'grades' => $grades
        ]);
    }
    
    public function getByStudent($studentId): string{
        $grades = Grade::where('student_id', $studentId)
                      ->with(['discipline'])
                      ->get();
        
        $student = Student::with('group')->find($studentId);
        
        return (new View())->render('grades.by-student', [
            'grades' => $grades,
            'student' => $student
        ]);
    }
}