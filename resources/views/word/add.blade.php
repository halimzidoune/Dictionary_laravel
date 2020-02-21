@extends('default')

@section('content')
<div class="pt-5">
	
	<h1>New Word</h1>

	<form action="{{ route('words.store')}}" method="POST">
		@csrf
		<input type="hidden" name="id_dictionnaire" value={{$id_dictionnaire}}>
		<table class="table table-striped">
	        <thead>
	            <tr>
	            	<th>Key</th> 
	            @foreach($languages as $language)                 
	                <th> {{ $language->name }} ( {{$language->abreviation}} ) </th>
	            @endforeach 
	                        
	            </tr>
	        </thead>
	        <tbody>
	           <td><input type="text" name="key" class="form-control"></td>
	            @foreach($languages as $language)                 
		           <td>
		           		<input type="text" name="word[]" class="form-control">
		           	</td>
	            @endforeach 
	        </tbody>
	    </table>

	    <button type="submit" class="btn btn-primary">Add</button>
	</form>
</div>
@endsection
