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
      
    @endforeach   
  @else
    <p> No posts found </p>
  @endif  
