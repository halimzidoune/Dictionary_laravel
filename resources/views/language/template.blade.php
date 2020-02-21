@extends('default')

@section('content')
<div class="pt-5 pb-5">
	<h1>File language</h1>
	<a href="{{ route('languages.export', ['id' => $language->id]) }}" class="btn btn-primary">generate in file</a>

	<div class="code-box-copy">
		<button class="code-box-copy__btn" data-clipboard-target="#language_file" title="Copy"></button>
		<pre><code class="language-php" id="language_file">@include('language.code.language')</code></pre>
	</div>
</div>
@endsection
