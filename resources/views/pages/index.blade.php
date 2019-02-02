@extends('layouts.app')

@section('content')
      <div class="jumbotron text-center">
      <h1>{{$title}}</h1>
      <p>This website (will eventually) contain detailed information on all plants used for landscaping at 
            <a href="http://www.sewanee.edu/"> Sewanee, the University of the South</a>. Thanks to Sewanee Facilities Management for list of plants. </p>
      <p>
                  <a class="btn btn-primary btn-lg" href="/login" role="button">Administrator Login</a>
      </p>
      </div>

      <div class="album py-5 bg-light">
                  <div class="container">
          
                    <div class="row">
                      <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                          <img class="card-img-top" src="images/my_fireball.jpg" alt="Emmanuel with fireball">
                          
                          <div class="card-body">
                              <h5> About Me </h5>
                            <p class="card-text">
                                  I'm a Sewanee computer science major (class of 2019).
                                  I'm involved in a lot of fields in computer science, including web development.
                                  Check out my website to learn more about me!
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm " onclick="location.href='https://icyblaze16.wixsite.com/emmaloto'">Visit Website</button>
                              </div>
                              <small class="text-muted"> </small>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                              <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="images/sewanee_campus.jpg" data-src="" alt="Card image cap" href="http://sewanee.edu">
                                <div class="card-body">
                                <h5> About Sewanee </h5>
                                  <p class="card-text">
                                        Learn more about Sewanee and the Domain containing beautiful views and bountiful flora.
                                  </p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                         <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='http://sewanee.edu'">Visit Website</button>          
                                    </div>
                                    <small class="text-muted"> </small>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                      <img class="card-img-top" src="images/pine_trees.jpg" data-src="" alt="Card image cap">
                                      <div class="card-body">
                                          <h5> Flora-tastic! </h5>
                                        <p class="card-text">
                                              Start exploring the plants at Sewanee! See how many you can recognize 
                                              and increase your knowledge of plant characteristics as well.
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                          <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-sm" onclick="location.href='/posts'">View Plants</button>
                                          </div>
                                          <small class="text-muted"> </small>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                    </div>
                  </div>
      </div>
      
@endsection
