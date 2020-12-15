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
				<div class="col-lg-12 ">
					 <h4 class="mb-0 ml-3"><b>BOS2</b></h4>
					 <br>
				</div>
			</div>

			<div class="card border-0">
				<div class="card-body bg-light">
					<div class="inner-bos-one ">
						<form>
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Client id:</label>
												<input  type="text" class="form-control" name="client_id" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Default type:</label>
												<input  type="text" class="form-control" name="default_type" placeholder="">
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
										<div class="col-12">
											<div class="form-group">
												<label>Title:</label>
												<select id="inputState" class="form-control" name="title">
													<option selected>Select title.....</option>
													<option>Mr.</option>
													<option>Mrs.</option>
													<option>Miss.</option>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Name:</label>
												<input  type="text" class="form-control" name="name" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>First name:</label>
												<input  type="text" class="form-control" name="name_first" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Middle name:</label>
												<input  type="text" class="form-control" name="name_middle" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Last name:</label>
												<input  type="text" class="form-control" name="name_last" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Address:</label>
												<input  type="text" class="form-control" name="address" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address unit number:</label>
												<input  type="text" class="form-control" name="address_unit_number" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address number:</label>
												<input  type="text" class="form-control" name="address_number" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Address name:</label>
												<input  type="text" class="form-control" name="address_name" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address city:</label>
												<input  type="text" class="form-control" name="address_city" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address state:</label>
												<input  type="text" class="form-control" name="address_state" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address postcode:</label>
												<input  type="text" class="form-control" name="address_postcode" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Address lat:</label>
												<input  type="text" class="form-control" name="address_lat" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Address lng:</label>
												<input  type="text" class="form-control" name="address_lng" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address municipality:</label>
												<input  type="text" class="form-control" name="address_municipality" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address region:</label>
												<input  type="text" class="form-control" name="address_region" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address zone:</label>
												<input  type="text" class="form-control" name="address_zone" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Delivery Address:</label>
												<input  type="text" class="form-control" name="delivery_address" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address unit number:</label>
												<input  type="text" class="form-control" name="delivery_address_unit_number" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address number:</label>
												<input  type="text" class="form-control" name="delivery_address_number" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Delivery address name:</label>
												<input  type="text" class="form-control" name="delivery_address_name" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address city:</label>
												<input  type="text" class="form-control" name="delivery_address_city" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address state:</label>
												<input  type="text" class="form-control" name="delivery_address_state" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address postcode:</label>
												<input  type="text" class="form-control" name="delivery_address_postcode" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address lat:</label>
												<input  type="text" class="form-control" name="delivery_address_lat" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address lng:</label>
												<input  type="text" class="form-control" name="delivery_address_lng" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address municipality:</label>
												<input  type="text" class="form-control" name="delivery_address_municipality" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address region:</label>
												<input  type="text" class="form-control" name="delivery_address_region" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address zone:</label>
												<input  type="text" class="form-control" name="delivery_address_zone" placeholder="">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Phone:</label>
												<input type="tel" class="form-control" name="phone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" >
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Mobile:</label>
												<input type="tel" class="form-control" name="mobile"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" >
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Email:</label>
												<input  type="email" class="form-control" name="email" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Dob:</label>
												<input  type="date" class="form-control" name="dob" placeholder="">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Driver license:</label>
												<input  type="text" class="form-control" name="driver_license" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Driver license state code:</label>
												<input  type="text" class="form-control" name="driver_license_state_code" placeholder="">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Passport:</label>
												<input  type="text" class="form-control" name="passport" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Passport country code:</label>
												<input  type="text" class="form-control" name="passport_country_code" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr name</label>
												<input  type="text" class="form-control" name="nlr_name" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr name first:</label>
												<input  type="text" class="form-control" name="nlr_name_first" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr name last:</label>
												<input  type="text" class="form-control" name="nlr_name_last" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Nlr address:</label>
												<input  type="text" class="form-control" name="nlr_address" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address unit number</label>
												<input  type="text" class="form-control" name="nlr_address_unit_number" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address number:</label>
												<input  type="text" class="form-control" name="nlr_address_number" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address name:</label>
												<input  type="text" class="form-control" name="nlr_address_name" placeholder="">
											</div>
										</div>
									</div>
								</div>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address city:</label>
												<input  type="text" class="form-control" name="nlr_address_city" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address state:</label>
												<input  type="text" class="form-control" name="nlr_address_state" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address postcode:</label>
												<input  type="text" class="form-control" name="nlr_address_postcode" placeholder="">
											</div>
										</div>
									</div>
								</div>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr phone:</label>
												<input type="tel" class="form-control" name="nlr_phone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" >
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr relationship:</label>
												<input  type="text" class="form-control" name="nlr_relationship" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Centrelink income:</label>
												<input  type="text" class="form-control" name="centrelink_income" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Centrelink deductions:</label>
												<input  type="text" class="form-control" name="centrelink_deductions" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Other income:</label>
												<input  type="text" class="form-control" name="other_income" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Other deduction:</label>
												<input  type="text" class="form-control" name="other_deduction" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Comment:</label>
												<input  type="text" class="form-control" name="comment" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Customer status:</label>
												<input  type="text" class="form-control" name="customer_status" placeholder="">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Adjustment:</label>
												<input  type="text" class="form-control" name="adjustment" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card:</label>
												<input  type="text" class="form-control" name="medicare_card" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card reference:</label>
												<input  type="text" class="form-control" name="medicare_card_reference" placeholder="">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card expiry:</label>
												<input  type="text" class="form-control" name="medicare_card_expiry" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card colour:</label>
												<input  type="text" class="form-control" name="medicare_card_colour" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card middle name:</label>
												<input  type="text" class="form-control" name="medicare_card_middle_name" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Defaulted:</label>
												<input  type="text" class="form-control" name="defaulted" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Relationship:</label>
												<input  type="text" class="form-control" name="relationship" placeholder="">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Dependents:</label>
												<input  type="text" class="form-control" name="dependents" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Shared:</label>
												<input  type="text" class="form-control" name="shared" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Living situation:</label>
												<input  type="text" class="form-control" name="living_situation" placeholder="">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Partner income:</label>
												<input  type="text" class="form-control" name="partner_income" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Statement value:</label>
												<input  type="text" class="form-control" name="statement_value" placeholder="">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>System:</label>
												<input  type="text" class="form-control" name="system" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12 text-center">
										
										<button type="submit" class="btn btn-light">Submit</button>
										<button type="submit" class="btn btn-none">Cancle</button>

									</div>
								</div>

						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection
@section('scriptsection')
@endsection