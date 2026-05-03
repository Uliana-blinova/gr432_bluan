<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'study_plan';
    protected $primaryKey = 'plan_id';
    
    protected $fillable = [
        'group_id',
        'discipline_id',
        'course_num',
        'semester_num',
        'total_hours',
        'control_type'
    ];
    
    public function group(){
        return $this->belongsTo(Group::class, 'group_id', 'group_id');
    }
    
    public function discipline(){
        return $this->belongsTo(Disciplines::class, 'discipline_id', 'discipline_id');
    }
}