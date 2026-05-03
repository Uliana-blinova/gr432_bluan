<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
    public function students(){
        return $this->hasMany(Student::class, 'group_id', 'group_id');
    }
    public function studyplan(){
        return $this->hasMany(StudyPlan::class, 'group_id', 'group_id');
    }
}