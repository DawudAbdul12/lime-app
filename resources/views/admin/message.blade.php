@if(isset($success))

<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{$success}}</strong> 
 </div>

@elseif(isset($error))

<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{$error}}</strong> 
 </div>

@endif