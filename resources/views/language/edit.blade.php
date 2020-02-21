@extends('default')

@section('content')
<dir class="mt-5 mb-5">
	

	<h1>Edit language</h1>

<?php 
	
	$options = ['class'=> 'form-inline','method' => 'put','files' => true ,'url'=> action('LanguageController@update',  $language )];
	
?>
 {!! Form::model( $language , $options) !!}

	<div class="form-group  @if($errors->first('name')) has-error @endif  "> 
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class'=>'form-control mr-2 ml-2'])   !!}		
		@if($errors->first('name'))
			<small class="help-block">  {{ $errors->first('name') }}  </small>
	    @endif 
	</div>

	<div class="form-group  @if($errors->first('abreviation')) has-error @endif  "> 
		{!! Form::label('abreviation', 'Abréviation') !!}
		{!! Form::text('abreviation', null, ['class'=>'form-control mr-2 ml-2'])   !!}		
		@if($errors->first('abreviation'))
			<small class="help-block">  {{ $errors->first('abreviation') }}  </small>
	    @endif 
	</div>
	<hr class="col-12">
	<div class="form-group">
		<label class="mr-2">Words</label>
		@if(count($language->words)==0)

		<b>There is any word</b>
		@endif
		@foreach($language->words as $word)
		<input type="text" name="word[{{$word->id}}][]" value="{{ $word->word }}" class="form-control mr-2">
		@endforeach
	</div>
	<hr class="col-12">
		<button class="btn btn-primary mr-2" type="submit">Save</button>
 {!! Form::close() !!}" 
</dir>
@endsection
