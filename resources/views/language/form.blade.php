<?php 
	if($language->id){
		$options = ['method' => 'put','files' => true ,'url'=> action('LanguageController@update', $language)];
	}else{
		$options = ['method' => 'post','files' => true ,'url'=> action('LanguageController@store')];
	}
?>
 {!! Form::model( $language , $options) !!}

 	<input type="hidden" name="dictionnaire_id" value="{{$id_dictionnaire}}">

	<div class="form-group  @if($errors->first('name')) has-error @endif  "> 
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class'=>'form-control'])   !!}		
		@if($errors->first('name'))
			<small class="help-block">  {{ $errors->first('name') }}  </small>
	    @endif 
	</div>

	<div class="form-group  @if($errors->first('abreviation')) has-error @endif  "> 
		{!! Form::label('abreviation', 'Abréviation') !!}
		{!! Form::text('abreviation', null, ['class'=>'form-control'])   !!}		
		@if($errors->first('abreviation'))
			<small class="help-block">  {{ $errors->first('abreviation') }}  </small>
	    @endif 
	</div>
		<button class="btn btn-primary" type="submit">Save</button>
 {!! Form::close() !!}" 