<p><a href="{{ route('projects.add') }}" class="btn btn-success">new project</a></p>


<div class="row">
    @foreach( $projects as $project)
    <div class="col-3">
       <div class="card bg-light mb-3 text-center table-row " data-href="{{  route('projects.edit', ['id' => $project]) }}">
          <div class="card-header">{{  $project->name }}</div>
          <div class="card-body" >
                <a href="{{  route('projects.edit', ['id' => $project]) }}" class="btn btn-primary">Edit</a>
                         {!! Form::model($project, ['method' => 'DELETE', 'route' => ['projects.delete', $project], 'style' => 'display:inline;']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!} 
        </div> 
    </div>        
    @endforeach
</div>

<!--    <table class="table table-striped">
        <thead>
            <tr>                 
                <th>name </th>                
            </tr>
        </thead>
        <tbody>
           @foreach( $projects as $project) 
            <tr class="table-row" data-href="{{  route('projects.edit', ['id' => $project]) }}">
                 <td>{{  $project->name }}</td>
                 <td>
                    <a href="{{  route('projects.edit', ['id' => $project]) }}" class="btn btn-primary">Edit</a>
                     {!! Form::model($project, ['method' => 'DELETE', 'route' => ['projects.delete', $project], 'style' => 'display:inline;']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}                      
                </td>

            </tr>
           @endforeach 
        </tbody>
    </table>

    <div class="navigation">
         {{  $projects ->links() }}
    </div>
-->