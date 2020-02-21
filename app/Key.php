<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = ['key', 'dictionnaire_id'];

    public function words(){
    	return $this->hasMany(Word::class);
    }

    public function dictionnaire(){
    	return $this->belongsTo(Dictionnaire::class);
    }
}
