<?php
namespace Controller;

use Model\StudyPlan;
use Model\Group;
use Model\Disciplines;
use Src\View;
use Src\Request;

class StudyPlanController{
    public function index(): string{
        $plans = StudyPlan::with(['group', 'discipline'])->get();
        return (new View())->render('studyplan.index', ['plans' => $plans]);
    }
    public function create(): string{
        $groups = Group::all();
        $disciplines = Disciplines::all();
        return (new View())->render('studyplan.create', [
            'groups' => $groups,
            'disciplines' => $disciplines
        ]);
    }    
    public function store(Request $request): void{
        if($request->method === 'POST'){
            StudyPlan::create($request->all());
            app()->route->redirect('/studyplan');
        }
        app()->route->redirect('/studyplan/create');
    }
    public function getByGroup($groupId, Request $request): string{
        $course = $request->course ?? null;
        $semester = $request->semester ?? null;
        
        $query = StudyPlan::where('group_id', $groupId)->with(['group', 'discipline']);
        
        if($course){
            $query->where('course_num', $course);
        }
        
        if($semester){
            $query->where('semester_num', $semester);
        }
        
        $plans = $query->get();
        
        return (new View())->render('studyplan.by-group', [
            'plans' => $plans,
            'course' => $course,
            'semester' => $semester
        ]);
    }
}