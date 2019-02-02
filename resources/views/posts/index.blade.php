@extends('layouts.app')

@section('content')
<div class="dropdown" style="padding:10px;float:right">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Sort Plants By
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item " href="#"> Older Entries </a>
        <a class="dropdown-item active " href="#"> Newer Entries </a>
        <a class="dropdown-item " href="#"> Ascending Order </a>
        <a class="dropdown-item " href="#"> Descending Order </a>
    </div>
  </div>

  <h1> Posts </h1>
    @include('posts.plantlist')
@endsection