<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Language;
use App\Word;
use App\Key;
use Validator;
use File;
class LanguageController extends Controller
{
     public function add($id_dictionnaire){
    	$language = new Language();
    	return view('language.add', compact('language', 'id_dictionnaire'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'abreviation' => 'required',
        ]);
        
        $language = Language::create($request->all());

        $keys = Key::all();

        if(count(Word::all())>0){
        	foreach ($keys as $key) {
	        	$word = new Word();
	        	$word->word = "not yet";
	        	$word->key_id = $key->id;
	        	$word->language_id = $language->id;
	        	$word->save(); 
	        }
        }        

        return redirect()->route('dictionnaires.edit', ['id' => $language->dictionnaire_id])->with('success', 'Language Created Successfully.');
    }

    public function edit($id)
	{	
		$language = Language::findOrFail($id);
		$id_project = $language->project_id;
		return view('language.edit', compact('language', 'id_project'));
	}

	public function update($id, Request $request)
	{	

		$rules = [
            'name' => 'required',
            'abreviation' => 'required',
        ];

    	foreach ($request->word as $key => $value) {
    		$rules["word.{$key}.0"] = 'required';
    	}

    	$validator = Validator::make($request->all(), $rules);

    	if($validator->passes()){
			$language = Language::findOrFail($id);
			$language->name = $request->name;
			$language->abreviation = $request->abreviation;
			$language->save();

			foreach ($request->word as $key => $value) {
    			$word = Word::findOrFail($key);
    			$word->word = $value[0];
    			$word->save();
    		}

    		return redirect()->route('dictionnaires.edit', ['id' => $language->dictionnaire_id])->with('success', 'Language Updated Successfully.');
    	}

		return redirect()->route('dictionnaires.edit', ['id' => $language->dictionnaire_id])->with('error', 'Language Not Updated');
	}

	public function delete($id)
	{
		$language = Language::findOrFail($id);
		$words = $language->words;
		
		foreach ($words as $word) {
			$word->delete();
		}	

		$language->delete();

        return redirect()->route('dictionnaires.edit', ['id' => $language->dictionnaire_id])->with('success', 'Language deleted successfully.');
	}



	public function template($id)
	{	
		$language = Language::findOrFail($id);
		return view('language.template', compact('language'));
	}

	public function export($id){
		$language = Language::findOrFail($id);

		$dest = "resources/lang/".$language->abreviation."/";
		$path = str_replace("/", "::", $dest);
		//dd($path);
		$this->checkDirectory($path);
		
		$dest = base_path()."/".$dest.$language->dictionnaire->name.".php";

		$content = view('language.code.language', compact('language'))->render();
		$content = str_replace('&#60', '<', $content);
		$content = str_replace('&#039;', '\'', $content);
		$content = str_replace('&lt;', '<', $content);
		$content = str_replace('&gt;', '>', $content);
		$content = str_replace('&quot;', '"', $content);
		file_put_contents($dest, $content);

		return view('language.success')->with([
			'message' => '<b>File generated at :</b>'. $dest
		]);
		
	}

	protected function checkDirectory($path){
		$parts = explode("::", $path);
		$directory = base_path().'/';
		for ($i=0; $i < count($parts) - 1  ; $i++) { 
			$directory .= $parts[$i].'/';
			if(!file_exists($directory)){
				mkdir($directory);
			}
		}		
	}
}
