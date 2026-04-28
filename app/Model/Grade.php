<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'discipline_id',
        'grade_value',
        'date_recorded'
    ];
    public function students(){
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }
    public function disciplines(){
        return $this->belongsTo(Disciplines::class, 'discipline_id', 'discipline_id');
    }

}