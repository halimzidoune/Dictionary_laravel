<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionnaire extends Model
{
    public $fillable = ['name', 'project_id'];

    public function project(){
    	return $this->belongsTo(Project::class);
    }

    public function languages(){
    	return $this->hasMany(Language::class);
    }

    public function keys(){
    	return $this->hasMany(Key::class);
    }
}
