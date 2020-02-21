<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    public $fillable = ['word', 'language_id', 'key_id'];

    public function language(){
    	return $this->belongsTo(Language::class);
    }

    public function key(){
    	return $this->belongsTo(Key::class);
    }
}
