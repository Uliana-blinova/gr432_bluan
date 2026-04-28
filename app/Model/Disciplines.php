<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplines extends Model{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
    public function study_plan(){
        return $this->hasMany(Study_plan::class, 'discipline_id', 'discipline_id');
    }
    public function grades(){
        return $this->hasMany(Grade::class, 'discipline_id', 'discipline_id');
    }
}