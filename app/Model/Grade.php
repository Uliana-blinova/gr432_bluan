<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model{
    public $timestamps = false;
    
    protected $table = 'grades';
    protected $primaryKey = 'grade_id';
    
    protected $fillable = [
        'student_id',
        'discipline_id',
        'grade_value',
        'date_recorded'
    ];
    
    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    
    public function discipline(){
        return $this->belongsTo(Disciplines::class, 'discipline_id', 'discipline_id');
    }
}