
    <table class="table table-striped">
        <thead>
            <tr>                 
                <th>name </th>
                <th>abreviation</th>               
            </tr>
        </thead>
        <tbody>
           @foreach( $languages as $language) 
            <tr class="table-row" data-href="{{  route('languages.edit', ['id' => $language]) }}">
                 <td>{{  $language->name }}</td>
                 <td>{{  $language->abreviation }}</td>
                 <td>
                    <a href="{{  route('languages.edit', ['id' => $language]) }}" class="btn btn-primary">Edit</a>
                     {!! Form::model($language, ['method' => 'DELETE', 'route' => ['languages.delete', $language], 'style' => 'display:inline;']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}                      
                </td>

            </tr>
           @endforeach 
        </tbody>
    </table>
