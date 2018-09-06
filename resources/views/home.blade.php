
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/posts/create" class="btn btn-primary">Create Plant</a>
                    <h3>Your Plant Entries</h3>
                    @if(count($plants) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                                <th>Created On</th>
                            </tr>
                            @foreach($plants as $plant)
                                <tr>
                                    <td>
                                        <a class="no-line" href="/posts/{{$plant -> PlantID}}"> <img class="thumbnail" src="/images/{{$plant -> Images}}"> </a>  
                                        {{$plant->Common_Name}}

                                    </td>

                                    <td><a href="/posts/{{$plant -> PlantID}}/edit" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $plant -> PlantID], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                    <td>{{substr($plant -> created_at, 0, 10)}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection