@extends('layouts.app')

@section('content')
  <h1> Posts </h1>
  @if(count($posts) > 0)
    @foreach($posts as $plant)
      <div class="well">
          <h3> 
            <img class="thumbnail" src="/images/{{$plant -> Images}}">  
            <a href="/posts/{{$plant -> PlantID}}">  {{$plant -> Common_Name}} </a> 
          </h3>
             
          
          <small> 
            <span class="label label-default"> {{ $plant -> group -> GroupName }}  </span>
            <span class="label label-primary"> {{ $plant -> flower_group -> FlowerGroupName }} </span>
          
          </small>

          <br><small>Added on {{ substr($plant -> created_at, 0, 10) }} </small>
      </div>
      <!--
        <small> {{ $plant -> Scientific_Name }} </small> <br>
        <a href="/posts/{{$plant -> PlantID}}"> </a>
      <small> Written on {{$plant-> created_at}}  </small>
      -->
      
    @endforeach   
    {{$posts -> links()}}
  @else
    <p> No posts found </p>
  @endif  
@endsection