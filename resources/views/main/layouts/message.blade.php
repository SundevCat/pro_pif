@section('message')

    @if( Session::has('success') || Session::has('danger') )
		<div class="row"> 
			<div class="col-sm-2"></div>
			<div class="col-sm-8 col-sm-offset-1">
				@if( Session::has('success') )
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ Session::pull('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@elseif(Session::has('danger'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{{ Session::pull('danger') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
			</div>
			<div class="col-sm-2"></div>
		</div>
    @endif

	@if(Session::has('message'))
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8 col-sm-offset-1">    
			<div class="alert alert-block alert-dark">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				{{ Session::pull('message') }}
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
	@endif

	{{-- @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}

@show