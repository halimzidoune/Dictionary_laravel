@extends('default')

@section('content')
<div class="pt-5">
	
	<h1>New Word</h1>

	<form action="{{ route('keys.update', ['id' => $key->id])}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<table class="table table-striped">
	        <thead>
	            <tr>
	            	<th>Key</th> 
	            @foreach($languages as $language)                 
	                <th> {{ $language->name }} </th>
	            @endforeach 
	                        
	            </tr>
	        </thead>
	        <tbody>
	           <td>
	           	<input type="text" name="key" class="form-control" value="{{ $key->key }}"></td>
	            @foreach($key->words as $word)                 
		           <td>
		           		<input type="text" name="word[{{$word->id}}][]" class="form-control" value="{{ $word->word}}">
		           	</td>
	            @endforeach 
	        </tbody>
	    </table>

	    <button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
@endsection