<?php 
	if($project->id){
		$options = ['class'=> 'form-inline', 'method' => 'put','files' => true ,'url'=> action('ProjectController@update', $project)];
	}else{
		$options = ['class'=> 'form-inline', 'method' => 'post','files' => true ,'url'=> action('ProjectController@store')];
	}
?>
 {!! Form::model( $project , $options) !!} 
	<div class="form-group  @if($errors->first(' name')) has-error @endif  "> 
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class'=>'form-control ml-2 mr-2'])   !!}		
		@if($errors->first('name'))
			<small class="help-block">  {{ $errors->first('name') }}  </small>
	    @endif 
	</div>
		<button class="btn btn-primary" type="submit">Save</button>
 {!! Form::close() !!}" 