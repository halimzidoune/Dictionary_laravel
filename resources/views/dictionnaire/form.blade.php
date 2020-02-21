<?php 
	if($dict->id){
		$options = ['class'=> 'form-inline', 'method' => 'put','files' => true ,'url'=> action('DictionnaireController@update', $dict)];
	}else{
		$options = ['class'=> 'form-inline','method' => 'post','files' => true ,'url'=> action('DictionnaireController@store')];
	}
?>
 {!! Form::model( $dict , $options) !!} 
	<div class="form-group  @if($errors->first(' name')) has-error @endif  "> 
		<input type="hidden" name="project_id" value="{{$id_project}}">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class'=>'form-control mr-2 ml-2'])   !!}		
		@if($errors->first('name'))
			<small class="help-block">  {{ $errors->first('name') }}  </small>
	    @endif 
	</div>
		<button class="btn btn-primary" type="submit">Save</button>
 {!! Form::close() !!}" 