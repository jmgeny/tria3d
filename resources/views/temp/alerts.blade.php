@if (session('datos'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	   {{ session('datos') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif

@if (session('cancelar'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
	   {{ session('cancelar') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif

@if (session('eliminar'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	   {{ session('eliminar') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif

@if ($errors->any())
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<ul>
	@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>		
	@endforeach
	</ul>
	   {{ session('cancelar') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif