<!-- https://getbootstrap.com/docs/3.3/examples/theme/ -->
<!--  -->
<!-- For showing plant entries -->
@extends('layouts.app')

@section('content')

<!-- Plant Names -->
<a href="/posts" class="btn btn-secondary float-right">Back</a>
@if(!Auth::guest())
    <h1 style="color:#4de115"> {{ $plant -> Common_Name }} </h1>
  @else 
    <h1 style="color:green">> {{ $plant -> Common_Name }} </h1>
  @endif

  <h3> <b> Scientific Name: </b> {{ $plant -> Scientific_Name }} </h3>
  <h3> <b> Other Names:     </b> {{ $plant -> Other_Name }} </h3>
  <h3> <b> Plant Family:    </b> {{ $plant -> Family }} </h3>
  
<!-- Plant Classes  -->  
<h3> <b> Classification: </b> 
  <span class="label label-default"> {{ $plant -> group        -> GroupName }} </span> 
  <span class="label label-primary"> {{ $plant -> flower_group -> FlowerGroupName }} </span>
</h3>

<!-- Plant Description  -->
  <div class="border">
      {!! $plant -> Description !!}
  </div>
  
  <!-- Extra Information  -->
  @if($plant-> Useful_links != null)
    <hr> <small> For more info: <a href='{{ $plant -> Useful_links }}'> {{ $plant -> Useful_links }}</a> </small> </hr>
  @endif

  <!-- Image  -->
  <img style="width:100%" src="/images/{{$plant -> Images}}">

<hr> <small> Image Credit : <a href='{{ $plant -> Credit_links }}'> {{ $plant -> Credit_links }}</a> </small> </hr>

<!-- Edit and Delete buttons  -->
@if(!Auth::guest())
  <small class="float-right"> Entry added on {{ $plant -> created_at }} by {{ $plant -> user -> name }}</small> 

  <hr> <a href="/posts/{{$plant -> PlantID }}/edit" class="btn btn-primary"> Edit </a> </hr>

  {!!Form::open(['action' => ['PostsController@destroy', $plant -> PlantID], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
  {!!Form::close()!!}

  @if(Auth::user()->id == $plant -> user_id) @endif
  @endif




  <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
  
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/images/concept_art_2.jpg" alt="Los Angeles">
      </div>
      <div class="carousel-item">
        <img src="/images/sproket.jpg" alt="Chicago">
      </div>
      <div class="carousel-item">
        <img src="/images/Impressedtext.png" alt="New York">
      </div>
    </div>
  
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  
  </div>


</div> <!-- /container -->


@endsection