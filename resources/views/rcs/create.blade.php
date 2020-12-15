@extends('layouts.layout')
@section('stylesection')

@endsection
@section('content')
<div class="container">

	{{-- <form name="IMPORTFORM" id="IMPORTFORM" enctype="multipart/form-data"> --}}
			
	<div class="form-group row">
		<div class="col-lg-10 mx-auto">

			<div class="row">
				<div class="col-lg-12 ">
					 <h4 class="mb-0 ml-3"><b>RCS</b></h4>
					 <br>
				</div>
			</div>
			<div class="alert-success" id="popup_notification" style="display:none;">
				Client Data Added in Queue Successfully , will be reflected shortly.
			</div> 

			<div class="card border-0">
				<div class="card-body bg-light">
					<div class="inner-bos-one ">
						<form id="rcsForm">
							<input type="hidden" name="system" value="RCS">

							@csrf
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Client id:</label>
												<input  type="text" class="form-control" name="client_id" placeholder="">
											</div>
										</div>
										
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Crn:</label>
												<input  type="text" class="form-control" name="crn" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Date:</label>
												<input  type="date" class="form-control" name="date_joined" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>First name:</label>
												<input  type="text" class="form-control" name="name_first" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Last name:</label>
												<input  type="text" class="form-control" name="name_last" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Middle name:</label>
												<input  type="text" class="form-control" name="name_middle" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
										<div class="form-group">
												<label>address:</label>
												<input  type="text" class="form-control" name="address" placeholder="">
											</div>
										</div>
									</div>
								</div>

											
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
										<div class="form-group">
												<label>Delivery address:</label>
												<input  type="text" class="form-control" name="delivery_address" placeholder="">
											</div>
										</div>
									</div>
								</div>


								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Dob:</label>
												<input  type="date" class="form-control" name="dob" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Mobile:</label>
												<input type="tel" class="form-control" name="mobile"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" >
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Phone:</label>
												<input type="tel" class="form-control" name="phone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" >
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Email:</label>
												<input  type="email" class="form-control" name="email" placeholder="">
											</div>
										</div>
										<!--div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Crn:</label>
												<input  type="text" class="form-control" name="crn" placeholder="">
											</div>
										</div-->
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Driver license:</label>
												<input  type="text" class="form-control" name="driver_license" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Passport:</label>
												<input  type="text" class="form-control" name="passport" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label> Medicare card:</label>
												<input  type="text" class="form-control" name="medicare_card" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card reference:</label>
												<input  type="text" class="form-control" name="medicare_card_reference" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Green id passport:</label>
												<input  type="text" class="form-control" name="green_id_passport" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label> Green id medicare:</label>
												<input  type="text" class="form-control" name="green_id_medicare" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Green id driving license:</label>
												<input  type="text" class="form-control" name="green_id_driving_license" placeholder="">
											</div>
										</div>
									</div>
								</div>

							<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Bsb:</label>
												<input  type="text" class="form-control" name="bsb" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label> Account number:</label>
												<input  type="text" class="form-control" name="account_number" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Contract id:</label>
												<input  type="text" class="form-control" name="contract_id" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12 text-center">
										
										<button type="button" class="btn btn-light" onclick="addSystemData('rcsForm')">Submit</button>
										<button type="button" class="btn btn-none">Cancel</button>

									</div>
								</div>

						</form>
					</div>
				</div>
			</div>

			
			<!-- =========================================== -->
			
			<!-- =========================================== -->
		</div>
	</div>
</div>

<!-- ================================ -->
<!-- modal -->

<!-- Modal -->

<!-- ================================== -->
<!-- =========================================== -->
	<div class="modal fade " id="basicExampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
		aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header customeheaderone ">
					<div class="centerr">
					<h5 class="modal-title " id="exampleModalLabel1">View All Matches</h5>
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
										<button type="button" class="btn btn-light">Submit</button>
												
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
@endsection

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