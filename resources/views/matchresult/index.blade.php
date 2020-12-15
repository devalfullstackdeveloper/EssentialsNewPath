@extends('layouts.layout')
@section('stylesection')

@endsection
@section('content')
<div class="container">

	<div class="form-group row">
		<div class="col-lg-10 mx-auto">

			<div class="row">
				<div class="col-lg-12 mb-3">
					<h4 class="mb-0 ml-3 mt-2"><b>Match Results</b></h4>
					 <a href="{{url('/')}}/api/v1/truncate_table?system=matchresult" onclick="return confirm('Are you sure?')" class="btn btn-gray float-right"><i class="fa fa-plus"></i> Delete All</a>
					<br>
				</div>
			</div>

			

			<div class="card border-0">
				<div class="card-body bg-light">
					<div class="">
						<div class="col-lg-12 form-group box1">
							<div class="table-wrapper-scroll-y style3">
								<table class="table table-bordered table-striped mb-0" id="matchResultTable" style="overflow: overlay;display: block;"> 
									<thead>
										<tr>
											<th>Requested Client Id</th>
											<th>Requested System</th>
											<th>Requested Title</th>
											<th>Requested First Name</th>
											<th>Requested Middle Name</th>
											<th>Requested Last Name</th>
											<th>Requested Address</th>
											<th>Requested Delivery Address</th>
											<th>Requested Dob</th>
											<th>Requested Phone</th>
											<th>Requested Mobile</th>
											<th>Requested Email</th>
											<th>Requested Crn</th>
											<th>Requested Driver Licence</th>
											<th>Requested Passport</th>
											<th>Requested Medicare Card No</th>
											<th>Requested Medicare Card Referencee</th>
											<th>Matched Client Id</th>
											<th>Matched System</th>
											<th>Matched Title</th>
											<th>Matched First Name</th>
											<th>Matched Middle Name</th>
											<th>Matched Last Name</th>
											<th>Matched Address</th>
											<th>Matched Delivery Address</th>
											<th>Matched Dob</th>
											<th>Matched Phone</th>
											<th>Matched Mobile</th>
											<th>Matched Email</th>
											<th>Matched Crn</th>
											<th>Matched Driver Licence</th>
											<th>Matched Passport</th>
											<th>Matched Medicare Card No</th>
											<th>Matched Medicare Card Reference</th>
											<th>Confidence %</th>

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