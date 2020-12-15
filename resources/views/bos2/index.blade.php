@extends('layouts.layout')
@section('stylesection')

@endsection
@section('content')
<div class="container">

	<form name="IMPORTFORM" id="IMPORTFORM" enctype="multipart/form-data">
	@csrf		
	<div class="form-group row">
		<div class="col-lg-10 mx-auto">

			<div class="row">
				<div class="col-lg-12 mb-3">
					 <h4 class="mb-0 ml-3 mt-2"><b>BOS2 Clients</b></h4>
					 <a href="{{url('/')}}/api/v1/truncate_table?system=bos2" onclick="return confirm('Are you sure?')" class="btn btn-gray float-right"><i class="fa fa-plus"></i> Delete All</a> 
					 <a href="{{ route("bos2.create") }}" class="btn btn-gray mr-2 float-right"><i class="fa fa-plus"></i> Add New Client</a>
					 <br>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-body bg-light">
					<div class="">
						<div class="col-lg-12 form-group box1">
						<div class="table-wrapper-scroll-y style3">
								<table class="table table-bordered table-striped mb-0" id="bos2Table">
								<thead>
									<tr>
										{{-- <th>System ID</th> --}}
										<th>Action</th>									
										<th>Client Id</th>									
										<th>First Name</th>	
										<th>Last Name</th>	
										<th>DOB</th>
										<th>CRN</th>
										<th>Phone</th>
										<!-- <th>Mobile</th> -->
										
										
									</tr>
								</thead>
								{{-- <tbody> --}}
								{{-- @foreach ($bos1 as $user) --}}
									{{-- <tr> --}}
									{{-- <td>{{ $user->bos1_id }}</td> --}}
									{{-- <td><a href="{{ route("bos1.edit",$user->bos1_id) }}" class="btn btn-primary">Edit</a></td> --}}
									{{-- <td>{{ $user->client_id }}</td> --}}
									{{-- <td>{{ $user->name_first }}</td> --}}
									{{-- <td>{{ $user->name_last }}</td> --}}
									{{-- <td>{{ $user->dob }}</td> --}}
									{{-- <td>{{ $user->driver_license }}</td> --}}
									{{-- <td>{{ $user->crn }}</td> --}}
									{{-- <td>{{ $user->phone }}</td> --}}
									{{-- <td>{{ $user->mobile }}</td> --}}
									{{-- <td>{{ $user->email }}</td> --}}
									{{-- <td>{{ $user->passport }}</td> --}}
									
									{{-- </tr> --}}
									{{-- @endforeach --}}
								{{-- </tbody> --}}
								</table>

								</div>
							<div class="dadd">
							{{-- {{ $bos1->links() }} --}}
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