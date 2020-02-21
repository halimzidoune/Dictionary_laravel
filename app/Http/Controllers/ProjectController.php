<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{	
	protected $nbr_recods_page = 10;

	public function index(){
		$projects = Project::paginate($this->nbr_recods_page);
    	return view('project.index', compact('projects'));
    }

    public function add(){
    	$project = new Project();
    	return view('project.add', compact('project'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Project::create($request->all());
        return redirect()->route('projects.index')->with('success', 'Project Created Successfully.');
    }

    public function edit($id)
	{	
		

		$project = Project::findOrFail($id);
		$dictionnaires = $project->dictionnaires;

		return view('project.edit', compact('project', 'dictionnaires'));
	}

	public function update($id, Request $request)
	{	
		$request->validate([
            'name' => 'required',
        ]);

		$project = Project::findOrFail($id);
		$project->update($request->all());
		return redirect()->route('projects.index')->with('success', 'Project updated successfully');
	}

    public function delete($id)
	{
		$project = Project::findOrFail($id);
		$project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
	}
}