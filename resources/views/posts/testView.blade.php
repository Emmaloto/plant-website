<h2> {{ $posts }} </h2>

    @if(count($posts) > 0)
    @foreach($posts as $plant)
      <div class="well">
      </div>
    @endforeach   

  @else
    <p> No posts found </p>
  @endif  

