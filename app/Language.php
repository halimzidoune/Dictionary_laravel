<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $fillable = ['name', 'abreviation', 'dictionnaire_id'];

    public function dictionnaire(){
    	return $this->belongsTo(Dictionnaire::class);
    }

    public function words(){
    	return $this->hasMany(Word::class);
    }
}
