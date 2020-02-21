<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dictionnaire;
use App\Word;
use App\Key;
use Validator;
class WordController extends Controller
{
    public function add($id_dictionnaire){
    	$dict = Dictionnaire::findOrFail($id_dictionnaire);
    	$languages = $dict->languages;

    	return view('word.add', compact('languages', 'id_dictionnaire'));
    }

    public function store(Request $request){
    	$rules = [];
    	foreach ($request->word as $key => $value) {
    		$rules["word.{$key}"] = 'required';
    	}

    	$rules["key"] = 'required';
    	$rules["id_dictionnaire"] = 'required';

    	$validator = Validator::make($request->all(), $rules);
    	
    	if($validator->passes()){
    		// key unique

    		$dict = Dictionnaire::findOrFail($request->id_dictionnaire);
    		$languages = $dict->languages;

    		$keyObj = Key::create([
    			'key' => $request->key,
    			'dictionnaire_id' =>$dict->id
    		]);
    		
    		$i=0;
    		foreach ($request->word as $key => $value) {

    			$word = Word::create([
    				'word' => $value,
    				'language_id' => $languages[$i]->id,
    				'key_id' => $keyObj->id
    			]);
    			
    			$i++;
    		}

    		return redirect()->route('dictionnaires.edit', ['id' => $dict->id ])->with('success', 'word added successfully');
    	}
    	dd($validator->errors()->all());

    	return redirect()->route('word.add', ['id_dictionnaire' => $dict->id ])->with('error', 'check for your inputs');
    }
}
