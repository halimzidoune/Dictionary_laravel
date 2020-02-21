<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Key;
use App\Word;
use Validator;

class KeyController extends Controller
{
    public function edit($id)
	{	
		$key = Key::findOrFail($id);
		$languages = $key->dictionnaire->languages;

		return view('key.edit', compact('languages', 'key'));
	}

	public function update($id, Request $request)
	{	
		$rules = [];
    	foreach ($request->word as $key => $value) {
    		$rules["word.{$key}.0"] = 'required';
    	}

    	$rules["key"] = 'required';

    	$validator = Validator::make($request->all(), $rules);
    	
    	$keyObj = Key::findOrFail($id);
    	
    	if($validator->passes()){
    		
    		$keyObj->key = $request->key;
    		$keyObj->save();

    		foreach ($request->word as $key => $value) {
    			$word = Word::findOrFail($key);
    			$word->word = $value[0];
    			$word->save();
    		}
    		return redirect()->route('dictionnaires.edit', ['id' => $keyObj->dictionnaire->id])->with('success', 'Key Updated Successfully.');
    		
    	}

		return redirect()->route('dictionnaires.edit', ['id' => $keyObj->dictionnaire->id])->with('error', 'Key not Updated.');
	}

    public function delete($id)
	{
		$key = Key::findOrFail($id);

		$words = $key->words();
		
		foreach ($words as $word) {
			$word->delete();
		}

		$key->delete();

        return redirect()->route('dictionnaires.edit', ['id' => $key->dictionnaire->id])->with('success', 'Key deleted successfully.');
	}
}
