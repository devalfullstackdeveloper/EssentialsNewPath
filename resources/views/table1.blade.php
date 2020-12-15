@extends('layouts.layout')
@section('stylesection')

@endsection
@section('content')
<div class="container">

	<form name="IMPORTFORM" id="IMPORTFORM" enctype="multipart/form-data">
	@csrf		
	<div class="form-group row">
		<div class="col-lg-8 mx-auto">

			<div class="row">
				<div class="col-lg-12">
					 <h4 class="mb-0"><b>Table</b></h4>
					 <br>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-body bg-light">
					<div class="">
						<div class="col-lg-12 form-group box1">

						                                                            
									<div class="table-responsive">          
									<table class="table">
										<thead>
										<tr>
											<th>System ID</th>
											<th>Client Id</th>
											<th>CRN</th>
											<th>Driver Licence</th>
										</tr>
										</thead>
										<tbody>
										@foreach ($bos1 as $user)
											<tr>
											<td>{{ $user->bos1_id }}</td>
											<td>{{ $user->client_id }}</td>
											<td>{{ $user->crn }}</td>
											<td>{{ $user->driver_license }}</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									{{ $bos1->links() }}
									</div>

						</div>
						
					</div>
					
				</div>
			</div>
			</div>
		</div>

		


@endsection
@section('scriptsection')
<script type="text/javascript">
	var config = {
		routes: {
			import:"{{ route('importCsv') }}"
		}
	}
</script>
<script type="text/javascript" src="{{ asset('js/csvimport.js') }}"></script>
@endsection