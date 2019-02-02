<!-- https://getbootstrap.com/docs/3.3/examples/theme/ -->
<!--  -->
<!-- For showing plant entries -->
@extends('layouts.app')

@section('content')

<!-- Plant Names -->
<a href="/posts" class="btn btn-secondary float-right"> Back </a>
@if(!Auth::guest())
    <h1 style="color:#4de115"> {{ $plant -> Common_Name }} </h1>
  @else 
    <h1 style="color:green">> {{ $plant -> Common_Name }} </h1>
  @endif

  <h3> <b> Scientific Name: </b> {{ $plant -> Scientific_Name }} </h3>
  @if($plant-> Other_Name != null)
     <h3> <b> Other Names:     </b> {{ $plant -> Other_Name }} </h3>
  @endif
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
    <hr> <small> For more info:

    @foreach ($plant -> useful_link_list as $useLink)
       <a href='{{ $useLink }}'> {{ $useLink }} </a> 
    @endforeach

    </small> </hr>
  @endif


  <!-- Image + Image Credit -->
  <img style="width:100%" src="/images/{{$plant -> Images}}">

  @if($plant-> Credit_links != null)
  <hr> <small> Image Credit :

    @foreach ($plant -> image_link_list as $creditLink)
     <a href='{{ $creditLink }}' style="color:midnightblue"> Source {{ $loop->iteration }} | </a>
    @endforeach

  </small> </hr>
  @endif


<!-- Edit and Delete buttons  -->
@if(!Auth::guest())
  <small class="float-right"> Entry added on <b style="color:navy">{{ $plant -> created_at }}</b> by <b>{{ $plant -> user -> name }} </b> </small> 

  <hr> <a href="/posts/{{$plant -> PlantID }}/edit" class="btn btn-primary"> Edit </a> </hr>

  {!!Form::open(['action' => ['PostsController@destroy', $plant -> PlantID], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
  {!!Form::close()!!}

  @if(Auth::user()->id == $plant -> user_id) @endif
  @endif


  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="display:none"
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
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


</div> <!-- /container -->


@endsection