<!-- https://getbootstrap.com/docs/3.3/examples/theme/ -->
<!--  -->
<!-- For showing plant entries -->
@extends('layouts.app')

@section('content')

<a href="/posts" class="btn btn-default">Back</a>
  <h1> {{ $post -> Common_Name }} </h1>

  <h3> <b> Scientific Name: </b> {{ $post -> Scientific_Name }} </h3>
  <h3> <b> Other Names:     </b> {{ $post -> Other_Name }} </h3>
  <h3> <b> Plant Family:    </b> {{ $post -> Family }} </h3>
  
<h3> <b> Classification: </b> 
  <span class="label label-default"> {{ $post -> group        -> GroupName }} </span> 
  <span class="label label-primary"> {{ $post -> flower_group -> FlowerGroupName }} </span>

</h3>

  <div>
      {{ $post -> Description }}
  </div>
<hr> <small> Written on {{ "Date" }} by {{ "user" }}</small> </hr>
<hr> <small> Image Credit : <a href='{{ $post -> Credit_links }}'> {{ "LINK" }}</a> </small> </hr>

@if(!Auth::guest())
  @if(Auth::user()->id == $post -> user_id)
  <hr> <a href="/posts/{{$post -> id}}/edit" class="btn btn-default"> Edit </a> </hr>

  {!!Form::open(['action' => ['PostsController@destroy', $post -> id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
  {!!Form::close()!!}
  @endif
  @endif

@endsection