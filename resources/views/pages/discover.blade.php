@extends('layouts.app')

@section('header')
   <div class="header-image"  style="background-image: url('/storage/header_images/home-bg-2.jpg');">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="site-heading">
                    <a class="h1">Discover Categories</a>
                    <span>
                        <p>Discover all the available Categories and subscribe onto them.</p>
                    </span>
                  @include('inc.messages')

                  <div class="site-heading-buttons mt-4">
                     @guest
                        <a href="/login" class="col-md-2 btn btn-primary mr-3">Sign In <i class="fa fa-sign-in"></i></a>
                        <a href="/register" class="col-md-2 btn btn-success">Sign Up <i class="fa fa-user-plus"></i></a>
                     @endguest
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
@endsection

@section('content')
   <div class="row justify-content-center">
      <div class="col-md-8 col-sm-12 " >
         <ul class="list-unstyled">
            @if(count($categories) > 0)
                @foreach ($categories as $category)
                <div class="card shadow border bg-light p-3 mb-3">
                    <div class="col">
                    <div class="media-heading row">
                        <a class="h4">{{$category->display_name}}</a>
                        <span class="ml-auto">
                            {{-- <form action="" method="post"> --}}
                                <button value="{{$category->id}}" type="button" id="btnSubscribe{{$category->id}}" class="btnSubscribe btn btn-primary">Subscribe <i class="fa fa-rss"></i></button>
                            {{-- </form> --}}
                        </span>
                    </div>
                    <div class="media-body row mt-3">
                        <p>{{$category->description}}</p>
                    </div>
                    </div>
                </div>
            @endforeach 

                  {{-- <span class="row justify-content-center"> {{$posts->links()}} </span> --}}
               @else
                  <div class="card">
                     <div class="card-header">
                        <p class="h5 m-0 text-center">
                           <i class="fa fa-exclamation-circle text-danger"></i> Oops!
                        </p>
                     </div>
                     <div class="card-body">
                        <p class="text-center">
                           No Categories have been found.
                        </p>  
                     </div>
                  </div> 
               @endif
         </ul>
      </div>
    
      
      <div class="col-md-3 card">
            @include('inc.sidebar-right')
      </div>
   
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        function subscribe(callback) {
        callback();
        }
    
        $('#btnSubscribe{{$category->id}}').on('click', function() {
        save this to var
        var thisContext = this;
        console.log(thisContext);
    
        $('#btnSubscribe{{$category->id}}').html('wait <i class="fa fa-sync fa-spin"></i>');
        
        subscribe(function() {
            callback("4", thisContext);
            console.log(thisContext);
        });
        });
    
        function callback(id, context) {
        console.log(id);
        var serverURL = "/echo/json/";
        
        $.ajax({
            url: {{route('discover.subscribe', )}},
            type: "POST",
            success: function(result) {
            
            setTimeout(function() {
                $('#btnSubscribe{{$category->id}}').removeClass('btn-primary').addClass('btn-success').html('Subscribed <i class="fa fa-check"></i>');
            }, 1000);
            },
            error: function(error) {
                $('#btnSubscribe{{$category->id}}').removeClass('btn-primary').addClass('btn-danger').html('Error <i class="fa fa-exclamation"></i>');
            }
        });
        };
    });
</script>   
@endsection