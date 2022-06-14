@section('body')
<div class="container mb-auto mt-md-3 pt-3 pl-md-5 pr-md-5 pb-md-5">
    @if('post')
     <div class="card bg-card-body border-secondary text-white mb-5 mt-0 ml-md-5 mr-md-5">

       <div class="card-header pt-4 bg-card-header">
             <h6 class="text-justify font-weight-bold">{{$post->title}}</h6>
       </div>

       <img class="card-img-top rounded mx-auto mt-1 pl-lg-2 pr-lg-2" style=" object-fit: cover;" src="{{'/res/'.$post->title_image}}">

       <div class="card-body d-none d-md-block font-weight-normal text-left text-md-justify pl-md-4 pr-md-4" id="bg-card-body">
         <p class="card-text ">{!! $post->body !!}</p>
       </div>
       <div class="card-body d-block d-md-none font-weight-light text-left text-md-justify pl-md-4 pr-md-4" id="bg-card-body">
         <p class="card-text">{!! $post->body !!}</p>
       </div>

       <div class="card-footer p-1 bg-card-header">
         <div class="d-flex">
           <div class="col-6 p-2">
            @if('user')
                  <small class="text-muted">{{$user->first_name}} {{$user->last_name}}</small>
            @endif
           </div>
           <div class="col-6 text-right p-2">
             <small class="text-muted">{{$post->created_at}}</small>
           </div>
         </div>
       </div>

     </div>
    @endif
</div>
@endsection
