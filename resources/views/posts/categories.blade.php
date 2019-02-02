@extends('layouts.app')

@section('content')
  <h1> View Plants by Groups  </h1>

  <div class="wrapper button-panel" id="initial select">
      <a href="#plant-grouping" onclick="toggle_two_div('plant-grouping','flower-grouping')" class="btn-base btn-cta btn-1">
          <span> Plants by Groups  </span>
      </a>

      <a href="#flower-grouping" onclick="toggle_two_div('flower-grouping','plant-grouping')" class="btn-base btn-cta btn-2">
          <span> Plants by Flowering Nature </span>
      </a>
  </div>

  <div class="wrapper button-panel" id="plant-grouping" >
      <a href="#plant-list" class="btn-base btn-cta btn-3" onclick="load_list('mosses')">
          <span>Mosses & Liverworts</span>
        </a>
        <a href="#plant-list" class="btn-base btn-cta btn-4" onclick="load_list('ferns')">
          <span>Ferns</span>
        </a>
        <a href="#plant-list" class="btn-base btn-cta btn-5" onclick="load_list('gymno')">
          <span>Gymnosperms</span>
        </a>
        <a href="#plant-list" class="btn-base btn-cta btn-6" onclick="load_list('angio')">
          <span>Angiosperms</span>
        </a>
  </div>

  <div class="wrapper button-panel" id="flower-grouping">
      <a  href="#plant-list" class="btn-base btn-cta btn-3" onclick="load_list('monocots')">
          <span>Monocotyledons</span>
        </a>
        <a  href="#plant-list" class="btn-base btn-cta btn-4" onclick="load_list('dicots')">
          <span>Dicotyledons</span>
        </a>
        <a  href="#plant-list" class="btn-base btn-cta btn-5" onclick="load_list('noflower')">
          <span>Non - Flowering</span>
        </a>
  </div>

  
  <div id="plant-list">
      
  </div>
  
@endsection

<!--href="#"-->