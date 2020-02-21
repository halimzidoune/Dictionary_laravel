<style type="text/css">
    .link-badge{
        cursor: pointer;
        padding: 5px;
        line-height: 15px;
        color: white !important;
    }
</style>
    <table class="table table-striped">
        <thead>
            <tr>
            @foreach($languages as $language)                 
                <th> {{ $language->name }} ( {{$language->abreviation}} ) 
                    
                    <a class="btn btn-primary link-badge" href="{{ route('languages.edit', ['id' =>$language])}}" ><i class="fa fa-edit"></i></a>

                    
                        
                    <form style="display:inline" method="POST" action="{{route('languages.delete', ['id'=> $language])}}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger link-badge">
                            <i class="fa fa-close"></i>
                        </button>
                    </form>

                    <a class="btn btn-success link-badge" href="{{ route('languages.template', ['id' =>$language])}}" ><i class="fa fa-external-link-square"></i>
                    </a>
                </th>
            @endforeach 
                <th>Action</th>         
            </tr>
        </thead>

        <tbody>
           @foreach($keys as $key)
            <tr class="table-row" data-href="{{ route('keys.edit', ['id' => $key->id])}}">
                @foreach($key->words as $word)
                <td>{{ $word->word }}</td>
                @endforeach
                <td>
                    <a class="btn btn-primary" href="{{ route('keys.edit', ['id' => $key->id])}}">Edit</a>
                    <form method="POST" action="{{ route('keys.delete', ['id' => $key->id])}}" style="display: inline">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>

                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
