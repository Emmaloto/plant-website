@extends('layouts.app')

@section('content')
  <h1> Edit Post </h1>
  {!! Form::open(['action' => ['PostsController@update', $plant -> PlantID], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  <div class="form-group">
      {{Form::label('sc_name', 'Scientific Name')}}
      {{Form::text('sc_name', $plant -> Scientific_Name, ['class' => 'form-control', 'placeholder'=>'Scientific Name'])}}
  </div>

    <div class="form-group">
      {{Form::label('name', 'Common/Preferred Name')}}
      {{Form::text('name',  $plant -> Common_Name, ['class' => 'form-control', 'placeholder'=>'Common Name'])}}
   </div>

   <div class="form-group">
    {{Form::label('family', 'Plant Family')}}
    {{Form::text('family', $plant -> Family, ['class' => 'form-control', 'placeholder'=>'Family'])}}
 </div>   

   <div class="form-group">
     {{Form::label('other_name', 'Other Names (Optional)')}}
     {{Form::text('other_name', $plant -> Other_Name, ['class' => 'form-control', 'placeholder'=>' '])}}
   </div>

   
   <div class="form-group">   
    {{ Form::label('plant-group', 'Which plant group does this fall under?')}}<br>

    {{ Form::radio('plant-group', '1' , $plant -> GroupID == 1 ? 'checked' : '') }}    
    {{ Form::label('plant-group', 'Mosses and Liverworts')}} <br>

    {{ Form::radio('plant-group', '2' , $plant -> GroupID == 2 ? 'checked' : '') }} 
    {{ Form::label('plant-group', 'Ferns')}}<br>

    {{ Form::radio('plant-group', '3' , $plant -> GroupID == 3 ? 'checked' : '') }} 
    {{ Form::label('plant-group', 'Conifers (Gymnosperms)')}} <br>

    {{ Form::radio('plant-group', '4' , $plant -> GroupID == 4 ? 'checked' : '') }} 
    {{ Form::label('plant-group', 'Flowering Plants (Angiosperms)')}}<br>
  </div>

  <div class="form-group">   
      {{ Form::label('plant-group', 'If this is a flowering plant, which group does this plant fall under?')}}<br>
  
      {{ Form::radio('flowering', '1' , $plant -> FlowerID == 1 ? 'checked' : '') }}     
      {{ Form::label('flowering', 'Monocotyledons')}} <br>
  
      {{ Form::radio('flowering', '2' , $plant -> FlowerID == 2 ? 'checked' : '') }}
      {{ Form::label('flowering', 'Dicotyledons')}}<br>
  
      {{ Form::radio('flowering', '3' , $plant -> FlowerID == 3 ? 'checked' : '') }}
      {{ Form::label('flowering', 'Not a flowering plant')}} <br>

    </div>
    
    
   <div class="form-group">
      {{Form::label('plant_info', 'Plant Information')}}
      {{Form::textarea('plant_info', $plant -> Description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder'=>'Plant Information'])}}
  </div>


<--
  <div class="form-group">
      {{Form::label('photo', 'Upload Plant Image')}}
      {{Form::file('plant_image')}}
  </div>

-->

<!--
  <div class="form-group">
  <form class="form-horizontal" enctype="multipart/form-data" method="post" action="/details">
    {{Form::label('photo', 'Upload Plant Image(s)')}}
    <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
  </form>
  </div>

  -->
<!-- https://stackoverflow.com/questions/14853779/adding-input-elements-dynamically-to-form -->

  <div class="form-group">
      {{Form::label('links', 'If these images are not royalty-free, please put credit to owner here: ')}}
      {{Form::text('credit', $plant -> Credit_links, ['class' => 'form-control', 'placeholder'=>'Name of Organisation/Website, Link'])}}
      {{Form::button('+ Add More', ['class' => 'btn btn-primary'])}}
   </div>
  

   <div class="form-group">
      {{Form::label('links', 'Useful Links (Separate with semi-colon (;)')}}
      {{Form::text('links', $plant-> Useful_links, ['class' => 'form-control', 'placeholder'=>'Useful Websites'])}}
   </div>

   
  {{Form::hidden('_method', 'PUT')}} 
  {{Form::submit('Update Plant', ['class' => 'btn btn-primary'])}}

  {!! Form::close() !!}
@endsection