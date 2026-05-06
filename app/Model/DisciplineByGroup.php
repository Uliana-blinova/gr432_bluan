<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disciplineByGroup extends Model{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'discipline_id',
        'group_id'
    ];
    public function discipline(){
        return $this->hasMany(Disciplines::class, 'discipline_id', 'discipline_id');
    }
     public function groups(){
        return $this->hasMany(Group::class, 'group_id', 'group_id');
    }
}