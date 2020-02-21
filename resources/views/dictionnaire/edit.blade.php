@extends('default')

@section('content')
<div class="pt-5 pb-5">
	

	<h1>Edit Dictionnaire</h1>

	@include('dictionnaire.form')

	

	<h2>Words</h2>

	@include('word.table')

	<p><a href="{{ route('words.add', ['id_dictionnaire' => $dict->id]) }}" class="btn btn-success">new word</a> <a href="{{ route('languages.add', ['id_dictionnaire' => $dict->id]) }}" class="btn btn-success rigth">new language</a></p>
</div>
@endsection
