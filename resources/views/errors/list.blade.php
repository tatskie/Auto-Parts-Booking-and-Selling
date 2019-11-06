{{-- resources\views\errors\list.blade.php --}}
@if (count($errors) > 0)

    	@foreach ($errors->all() as $error)
	        <span><b> {{ $error }} </b></span>
	        <br>
	    @endforeach
	

@endif