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
					 <h4 class="mb-0 ml-3 mt-2"><b>BOS1 Clients</b></h4>
					 <a href="{{url('/')}}/api/v1/truncate_table?system=bos1" onclick="return confirm('Are you sure?')" class="btn btn-gray float-right"><i class="fa fa-plus"></i> Delete All</a>
					 <a href="{{ route("bos1.create") }}" class="btn btn-gray mr-2 float-right"><i class="fa fa-plus"></i> Add New Client</a>
					 <br> 
				</div>
			</div>
			<div class="card border-0">
				<div class="card-body bg-light">
					<div class="">
						<div class="col-lg-12 form-group box1">
						<div class="table-wrapper-scroll-y style3">
								<table class="table table-bordered table-striped mb-0" id="bos1Table">
								<thead>
									<tr>
										{{-- <th>System ID</th> --}}
										<th>Action</th>									
										<th>Client Id</th>									
										<th>First Name</th>	
										<th>Last Name</th>	
										<th>DOB</th>
										<th>CRN</th>
										<th>Mobile</th>
										<!--<th>Email</th>
										<th>Passport</th> -->
										
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

		

<!-- =========================================== 

<div class="card border-0">
				<div class="card-body bg-light">
					<div class="">
						<div class="col-lg-12 form-group box1">
							<div>
								<div class="col-lg-12">(If any of the record is added or updated to the system, we will need to show success message along with this below table and this we need to store as well. by clicking on view details, one pop up will appear which will show the matched and unmatched fields.temporary if we are not storing this to DB then just shot the confidence percentage.)</div>
							</div>
						<div class="table-wrapper-scroll-y style3">
								<table class="table table-bordered table-striped mb-0" id="bos1Table">
								<thead>
									<tr>
										{{-- <th>System ID</th> --}}
										<th>firstname</th>									
										<th>Lastname</th>									
										<th>Client Id</th>	
										<th>System Name</th>	
										<th>Confidence(%)</th>
										<th>DOB</th>
										<th><button type="button" class="btn btn-light" data-toggle="modal" data-target="#basicExampleModal1" data-dismiss="modal">View Details</button></th>
										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>TestFirst</td>									
										<td>Testlast</td>									
										<td>12345</td>	
										<td>BOS1</td>	
										<td>89%</td>
										<td>10-10-1993</td>
										<td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#basicExampleModal1" data-dismiss="modal">View Details</button></td>
										
										
									</tr>
									<tr>
										<td>TestFirst</td>									
										<td>Testlast</td>									
										<td>45345</td>	
										<td>MIM</td>	
										<td>99%</td>
										<td>10-10-1993</td>
										<td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#basicExampleModal1" data-dismiss="modal">View Details</button></td>
										
										
									</tr>
									<tr>
										<td>TestFirst</td>									
										<td>Testlast</td>									
										<td>63345</td>	
										<td>RCS</td>	
										<td>65%</td>
										<td>10-10-1993</td>
										<td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#basicExampleModal1" data-dismiss="modal">View Details</button></td>
										
										
									</tr>
								</tbody>
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

-->
	<div class="modal fade " id="basicExampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
		aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header customeheaderone ">
					<div class="centerr">
					<h5 class="modal-title " id="exampleModalLabel1">View All Matches </h5>
					</div>
					<button type="button" class="close myclosee" data-dismiss="modal" aria-label="Close">
					<span class="timesymbol" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
					</button>
				</div>
				<div class="modal-body otherbody " id="style-2">
					<div class="inner-match">
						<div class="matches">
							
							<div class="row">

								<div class="col-lg-12">
								<label class="title-match">Fields Matched</label>
								</div>
							</div>
							<div class="row mt-3 mb-3">
									<div class="col-lg-6">
										<div class="headingmatch">
											<p class="mb-0">First Name</p>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="headingmatch">
										<p class="mb-0">Value</p>
										</div>
									</div>
							</div>

							<div class="row">
									<div class="col-lg-6">
										<div class="headingmatcho">
											<p class="mb-0">Title</p>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="headingmatcho">
										<p class="mb-0">Mr</p>
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col-lg-6">
										<div class="headingmatch">
											<p class="mb-0">Address</p>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="headingmatch">
										<p class="mb-0">110,mb title</p>
										</div>
									</div>
							</div>

							<div class="row">
									<div class="col-lg-6">
										<div class="headingmatcho">
											<p class="mb-0">Dilivery_Address</p>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="headingmatcho">
										<p class="mb-0">110,mb title</p>
										</div>
									</div>
							</div>

							<div class="row">
									<div class="col-lg-6">
										<div class="headingmatch">
											<p class="mb-0">DOB</p>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="headingmatch">
										<p class="mb-0">31/02/1203</p>
										</div>
									</div>
							</div>

							<div class="row">
									<div class="col-lg-6">
										<div class="headingmatcho">
											<p class="mb-0">Mobile</p>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="headingmatcho">
										<p class="mb-0">987456</p>
										</div>
									</div>
							</div>

							<div class="row">
									<div class="col-lg-6">
										<div class="headingmatch">
											<p class="mb-0">Phone</p>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="headingmatch">
										<p class="mb-0">857649</p>
										</div>
									</div>
							</div>
						</div>

						<div class="unmatches" style="margin-top: 25px;">
							<div class="row">
								<div class="col-lg-12">
								<label class="title-match">UnMatched Fields</label>
								</div>
							</div>

							<div class="row mt-3 mb-3">
									<div class="col-lg-4">
										<div class="headingmatch">
											<p class="mb-0">Field Name</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatch">
										<p class="mb-0">Contact Value</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatch">
										<p class="mb-0">System Value</p>
										</div>
									</div>
							</div>

							<div class="row">
									<div class="col-lg-4">
										<div class="headingmatcho">
											<p class="mb-0">Email</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatcho">
										<p class="mb-0">email@gmail.com</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatcho">
										<p class="mb-0">email@gmail.com</p>
										</div>
									</div>
							</div>

							<div class="row">
									<div class="col-lg-4">
										<div class="headingmatch">
											<p class="mb-0">Drivers licence</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatch">
										<p class="mb-0">857649</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatch">
										<p class="mb-0">857649</p>
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col-lg-4">
										<div class="headingmatcho">
											<p class="mb-0">Pasport</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatcho">
										<p class="mb-0">AB857649</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatcho">
										<p class="mb-0">AB857649</p>
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col-lg-4">
										<div class="headingmatch">
											<p class="mb-0">Medicare</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatch">
										<p class="mb-0">857649</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatch">
										<p class="mb-0">857649</p>
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col-lg-4">
										<div class="headingmatcho">
											<p class="mb-0">Medicare Refrence</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatcho">
										<p class="mb-0">CA</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatcho">
										<p class="mb-0">CA</p>
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col-lg-4">
										<div class="headingmatch">
											<p class="mb-0">BSB</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatch">
										<p class="mb-0">857649</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatch">
										<p class="mb-0">857649</p>
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col-lg-4">
										<div class="headingmatcho">
											<p class="mb-0">Account Number</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatcho">
										<p class="mb-0">857649</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="headingmatcho">
										<p class="mb-0">857649</p>
										</div>
									</div>
							</div>

							<div class="row" style="margin-top: 25px;">
									<div class="col-lg-6">
										<div class="ovverid " >
											<ul>
												<li><p class="ovverird">Override Match:</p></li>
												<li><div class="dropdown">
														<button class="btn btn-secondary dropdown-toggle mydrop text-left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															0%
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item" href="#">100%</a>
														</div>
														</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="savecanle">
										<button type="button" class="btn btn-none" >Cancle</button>
											<button type="button" class="btn btn-light" data-toggle="modal" data-target="#basicExampleModal1" data-dismiss="modal">Submit</button>
												
										</div>
									</div>
							</div>

							<div class="row" style="margin-top: 25px;">
									<div class="col-lg-12">
										<div class="savecanle">
										<button type="button" class="btn btn-light" >Back</button>
											<button type="button" class="btn btn-light" data-toggle="modal" data-target="#basicExampleModal1" data-dismiss="modal">Close</button>
												
										</div>
									</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- ============================================== -->


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

<!--======== here added-->

<style>
	.savecanle{
		text-align: center;
	}
	.ovverid .dropdown-toggle::after {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: .255em;
    vertical-align: .255em;
    content: "";
    border-top: .3em solid;
    border-right: .3em solid transparent;
    border-bottom: 0;
    border-left: .3em solid transparent;
    position: absolute;
    right: 7px;
    top: 16px;
    bottom: 0;
}
	.mydrop {
    min-width: 10rem;
}
	.ovverid ul li{
		list-style: none;
		display: inline-block;
		
	}
	.ovverid ul {
		padding: 0;
		text-align: center;
	}
	.headingmatch {
    text-align: center;
    background: #e0d6d6;
	padding: 8px 0;
	border-radius: 7px;
	color: #000;
}

.headingmatcho{
	text-align: center;
    background: #6c757d;
	padding: 8px 0;
	border-radius: 7px;
	color: #fff;
}

.matches {
    width: 600px;
    margin: 0 auto;
}

.title-match {
	display: flex;
	justify-content: center;
	background-color: #6c757d;
	text-align: center;
	padding: 8px 0;
	border-radius: 7px;
	color: #fff;
}
	.centerr {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    left: 42%;
}
	.custome-tablee.table th {
    padding: 6px 6px;
    vertical-align: middle;
    border-top: 1px solid #dee2e6;
}
.custome-tablee.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
    border: 1px solid #dddddd;
}
.custome-tablee tr{
	border: 1px solid gray;
}
.custome-tablee.table th {
    border: 1px solid #dddddd;
}
.custome-tablee.table td {
    border: 1px solid #dddddd;
}

#style-1::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar
{
	width: 12px;
    background-color: #F5F5F5;
    height: 5px;
}

#style-1::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #dddddd;
}
#style-2::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
    height: 5px;
}
#style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}
#style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #e0d6d6;
}


.timesymbol:focus{
	outline: none;
}
.myclosee:focus{
	outline: none;
}
.customeheader{
border-bottom: none !important;
}
.customefooter{
	border-top: none !important;
}
.customefooter {
    justify-content: end !important;
}

.modal-body.otherbody {
    overflow-y: auto;
    height: 700px;
}


@media (min-width: 992px){
.modal-lg {
    max-width: 1024px !important;
}
}
</style>
