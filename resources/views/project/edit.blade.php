@extends('default')

@section('content')
<div class="pt-5 pb-5">
	<h1>Edit project</h1>

	@include('project.form')

	<h2>Dictionniares</h2>
	<p><a href="{{ route('dictionnaires.add', ['id_project' => $project->id]) }}" class="btn btn-success">New Dictionnire</a></p>
	@include('dictionnaire.table')

	
</div>
@endsection
