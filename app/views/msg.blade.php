@if(Session::has('alert.success'))
	<div class="alert alert-dismissable alert-success">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  {{ Session::get('alert.success') }}
	</div>
@endif          
@if(Session::has('alert.danger'))
	<div class="alert alert-dismissable alert-danger">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  {{ Session::get('alert.danger') }}
	</div>
@endif          
@if($errors->count() > 0)
	<div class="alert alert-dismissable alert-danger">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <ul>
	    @foreach($errors->getMessages() as $msg)
	    	<li>{{ $msg[0] }}</li>
	    @endforeach
	  </ul>
	</div>
@endif