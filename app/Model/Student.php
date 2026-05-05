<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'gender',
        'birth_date',
        'address',
        'photo',
        'group_id'
    ];
    public function group(){
        return $this->belongsTo(Group::class, 'group_id', 'group_id');
    }
    public function grades(){
        return $this->hasMany(Grade::class, 'student_id', 'student_id');
    }
    public function getFullNameAttribute(){
        return trim("{$this->surname} {$this->name} {$this->patronymic}");
    }
    public function getAgeAttribute(){
        return \Carbon\Carbon::parse($this->birth_date)->age;
    }
}