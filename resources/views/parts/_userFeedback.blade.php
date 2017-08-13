@if($errors->all())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{$error}} </div>
    @endforeach
@endif

@if(session()->get('msg'))
    <div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{session()->get('msg')}} </div>
@endif
@if(session()->get('err_msg'))
    <div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{session()->get('err_msg')}} </div>
@endif