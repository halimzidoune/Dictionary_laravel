&#60?php

/** resources/lang/{{$language->abreviation}}/{{$language->dictionnaire->name}}.php */

return [
@foreach($language->words as $word)
	'{{$word->key->key}}' => '{{$word->word}}',
@endforeach
];