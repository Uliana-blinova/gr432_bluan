<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study_plan extends Model{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'group_id',
        'discipline_id',
        'course_num',
        'semester_num',
        'total_hours',
        'control_type'
    ];
    public function group(){
        return $this->hasMany(Group::class, 'group_id', 'group_id');
    }
    public function disciplines(){
        return $this->belongsTo(Disciplines::class, 'discipline_id', 'discipline_id');
    }
}