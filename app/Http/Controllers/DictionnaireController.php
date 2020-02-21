<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionnaire;
use App\Key;

class DictionnaireController extends Controller
{
    public function add($id_project){
    	$dict = new Dictionnaire();
    	return view('dictionnaire.add', compact('dict', 'id_project'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $dict = Dictionnaire::create($request->all());
        return redirect()->route('projects.edit', ['id' => $dict->project_id])->with('success', 'Dictionnaire Created Successfully.');
    }

    public function edit($id)
	{	
		$dict = Dictionnaire::findOrFail($id);
		$id_project = $dict->project_id;
		$languages = $dict->languages;
		$keys = Key::all();
		return view('dictionnaire.edit', compact('dict', 'id_project', 'languages', 'keys'));
	}

	public function update($id, Request $request)
	{	
		$request->validate([
            'name' => 'required',
        ]);

		$dict = Dictionnaire::findOrFail($id);
		$dict->update($request->all());
		return redirect()->route('projects.edit', ['id' => $dict->project_id])->with('success', 'Dictionnaire Updated Successfully.');
	}

    public function delete($id)
	{
		$dict = Dictionnaire::findOrFail($id);
		$dict->delete();

        return redirect()->route('projects.edit', ['id' => $dict->project_id])->with('success', 'Dictionnaire deleted successfully.');
	}
}
