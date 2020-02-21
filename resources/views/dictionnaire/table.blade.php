<div class="row">
    @foreach( $dictionnaires as $dict)
    <div class="col-3">
       <div class="card bg-light mb-3 text-center table-row " data-href="{{  route('dictionnaires.edit', ['id' => $dict]) }}">
          <div class="card-header">{{  $dict->name }}</div>
          <div class="card-body" >
                <a href="{{  route('dictionnaires.edit', ['id' => $dict]) }}" class="btn btn-primary">Edit</a>
                     {!! Form::model($dict, ['method' => 'DELETE', 'route' => ['dictionnaires.delete', $dict], 'style' => 'display:inline;']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!} 
        </div> 
    </div>        
    @endforeach
</div>


<!--
    <table class="table table-striped">
        <thead>
            <tr>                 
                <th>name </th>                
            </tr>
        </thead>
        <tbody>
           @foreach( $dictionnaires as $dict) 
            <tr class="table-row" data-href="{{  route('dictionnaires.edit', ['id' => $dict]) }}">
                 <td>{{  $dict->name }}</td>
                 <td>
                    <a href="{{  route('dictionnaires.edit', ['id' => $dict]) }}" class="btn btn-primary">Edit</a>
                     {!! Form::model($dict, ['method' => 'DELETE', 'route' => ['dictionnaires.delete', $dict], 'style' => 'display:inline;']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}                      
                </td>

            </tr>
           @endforeach 
        </tbody>
    </table>
    -->