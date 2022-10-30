@if($message = Session::get('message'))
<div class="alert alert-success" role="alert">
  {{$message}}
</div>
@endif