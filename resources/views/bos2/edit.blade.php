@extends('layouts.layout')
@section('stylesection')

@endsection
@section('content')
<div class="container">

	
	<div class="form-group row">
		<div class="col-lg-10 mx-auto">

			<div class="row">
				<div class="col-lg-12 ">
					 <h4 class="mb-0 ml-3"><b>BOS2</b></h4>
					 <br>
				</div>
			</div>

			<div class="alert-success" id="popup_notification" style="display:none;">
				Client Data Updated and Added in Queue Successfully , will be reflected shortly.
			</div>	

			<div class="card border-0">
				<div class="card-body bg-light">
					<div class="inner-bos-one ">
						<form name="bos2Form" id="bos2Form" enctype="multipart/form-data">
	@csrf
								<input type="hidden" name="system" value="{{$bos2[0]->system}}">
								<input type="hidden" name="bos2_id" value="{{$bos2[0]->bos2_id}}">
								@csrf
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Client id:</label>
												<input  type="text" class="form-control" name="client_id" placeholder="" readonly="" value="{{$bos2[0]->client_id}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Default type:</label>
												<input  type="text" class="form-control" name="default_type" placeholder="" value="{{$bos2[0]->default_type}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Crn:</label>
												<input  type="text" class="form-control" name="crn" placeholder="" value="{{$bos2[0]->crn}}" id="crn" >
												<div class="common-err-msg" style="display: none;color:red;">CRN or Driver license Or Passport or Medicare card is required</div>
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Date:</label>
												<input  type="date" class="form-control" name="date_joined" placeholder="" value="{{$bos2[0]->date_joined}}">
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
													<option>Select title.....</option>
													<option @if($bos2[0]->title == 'Mr.') selected @endif>Mr.</option>
													<option @if($bos2[0]->title == 'Mrs.') selected @endif>Mrs.</option>
													<option @if($bos2[0]->title == 'Miss.') selected @endif>Miss.</option>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>First name:</label>
												<input  type="text" class="form-control" name="name_first" placeholder="" value="{{$bos2[0]->name_first}}" id="name_first">
												<div class="namefirst-err-msg" style="display: none;color:red;">First Name is required</div>
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Middle name:</label>
												<input  type="text" class="form-control" name="name_middle" placeholder="" value="{{$bos2[0]->name_middle}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Last name:</label>
												<input  type="text" class="form-control" name="name_last" placeholder="" value="{{$bos2[0]->name_last}}" id="name_last">
												<div class="namelast-err-msg" style="display: none;color:red;">Last Name is required</div>
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Address:</label>
												<input  type="text" class="form-control" name="address" placeholder="" value="{{$bos2[0]->address}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address unit number:</label>
												<input  type="text" class="form-control" name="address_unit_number" placeholder="" value="{{$bos2[0]->address_unit_number}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address number:</label>
												<input  type="text" class="form-control" name="address_number" placeholder="" value="{{$bos2[0]->address_number}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Address name:</label>
												<input  type="text" class="form-control" name="address_name" placeholder="" value="{{$bos2[0]->address_name}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address city:</label>
												<input  type="text" class="form-control" name="address_city" placeholder="" value="{{$bos2[0]->address_city}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address state:</label>
												<input  type="text" class="form-control" name="address_state" placeholder="" value="{{$bos2[0]->address_state}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address postcode:</label>
												<input  type="text" class="form-control" name="address_postcode" placeholder="" value="{{$bos2[0]->address_postcode}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Address lat:</label>
												<input  type="text" class="form-control" name="address_lat" placeholder="" value="{{$bos2[0]->address_lat}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Address lng:</label>
												<input  type="text" class="form-control" name="address_lng" placeholder="" value="{{$bos2[0]->address_lng}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address municipality:</label>
												<input  type="text" class="form-control" name="address_municipality" placeholder="" value="{{$bos2[0]->address_municipality}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address region:</label>
												<input  type="text" class="form-control" name="address_region" placeholder="" value="{{$bos2[0]->address_region}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address zone:</label>
												<input  type="text" class="form-control" name="address_zone" placeholder="" value="{{$bos2[0]->address_zone}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Delivery Address:</label>
												<input  type="text" class="form-control" name="delivery_address" placeholder="" value="{{$bos2[0]->delivery_address}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address unit number:</label>
												<input  type="text" class="form-control" name="delivery_address_unit_number" placeholder="" value="{{$bos2[0]->delivery_address_unit_number}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address number:</label>
												<input  type="text" class="form-control" name="delivery_address_number" placeholder="" value="{{$bos2[0]->delivery_address_number}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Delivery address name:</label>
												<input  type="text" class="form-control" name="delivery_address_name" placeholder="" value="{{$bos2[0]->delivery_address_name}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address city:</label>
												<input  type="text" class="form-control" name="delivery_address_city" placeholder="" value="{{$bos2[0]->delivery_address_city}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address state:</label>
												<input  type="text" class="form-control" name="delivery_address_state" placeholder="" value="{{$bos2[0]->delivery_address_state}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address postcode:</label>
												<input  type="text" class="form-control" name="delivery_address_postcode" placeholder="" value="{{$bos2[0]->delivery_address_postcode}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address lat:</label>
												<input  type="text" class="form-control" name="delivery_address_lat" placeholder="" value="{{$bos2[0]->delivery_address_lat}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address lng:</label>
												<input  type="text" class="form-control" name="delivery_address_lng" placeholder="" value="{{$bos2[0]->delivery_address_lng}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address municipality:</label>
												<input  type="text" class="form-control" name="delivery_address_municipality" placeholder="" value="{{$bos2[0]->delivery_address_municipality}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address region:</label>
												<input  type="text" class="form-control" name="delivery_address_region" placeholder="" value="{{$bos2[0]->delivery_address_region}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address zone:</label>
												<input  type="text" class="form-control" name="delivery_address_zone" placeholder="" value="{{$bos2[0]->delivery_address_zone}}">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Phone:</label>
												<input type="tel" class="form-control" name="phone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" value="{{$bos2[0]->phone}}" >
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Mobile:</label>
												<input type="tel" class="form-control" name="mobile"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" value="{{$bos2[0]->mobile}}" id="mobile">
												<div class="mobile-err-msg" style="display: none;color:red;"> Mobile is required</div>
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Email:</label>
												<input  type="email" class="form-control" name="email" placeholder="" value="{{$bos2[0]->email}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Dob:</label>
												<input  type="date" class="form-control" name="dob" placeholder="" value="{{$bos2[0]->dob}}" id="dob">
												<div class="dob-err-msg" style="display: none;color:red;">Date of Birth is required</div>
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Driver license:</label>
												<input  type="text" class="form-control" name="driver_license" placeholder="" value="{{$bos2[0]->driver_license}}" id="driver_license">
												<div class="common-err-msg" style="display: none;color:red;">CRN or Driver license Or Passport or Medicare card is required</div>
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Driver license state code:</label>
												<input  type="text" class="form-control" name="driver_license_state_code" placeholder="" value="{{$bos2[0]->driver_license_state_code}}">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Passport:</label>
												<input  type="text" class="form-control" name="passport" placeholder="" value="{{$bos2[0]->passport}}" id="passport">
												<div class="common-err-msg" style="display: none;color:red;">CRN or Driver license Or Passport or Medicare card is required</div>
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Passport country code:</label>
												<input  type="text" class="form-control" name="passport_country_code" placeholder="" value="{{$bos2[0]->passport_country_code}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr name:</label>
												<input  type="text" class="form-control" name="nlr_name" placeholder="" value="{{$bos2[0]->nlr_name}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr name first:</label>
												<input  type="text" class="form-control" name="nlr_name_first" placeholder="" value="{{$bos2[0]->nlr_name_first}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr name last:</label>
												<input  type="text" class="form-control" name="nlr_name_last" placeholder="" value="{{$bos2[0]->nlr_name_last}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Nlr address:</label>
												<input  type="text" class="form-control" name="nlr_address" placeholder="" value="{{$bos2[0]->nlr_address}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address unit number:</label>
												<input  type="text" class="form-control" name="nlr_address_unit_number" placeholder="" value="{{$bos2[0]->nlr_address_unit_number}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address number:</label>
												<input  type="text" class="form-control" name="nlr_address_number" placeholder="" value="{{$bos2[0]->nlr_address_number}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address name:</label>
												<input  type="text" class="form-control" name="nlr_address_name" placeholder="" value="{{$bos2[0]->nlr_address_name}}">
											</div>
										</div>
									</div>
								</div>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address city:</label>
												<input  type="text" class="form-control" name="nlr_address_city" placeholder="" value="{{$bos2[0]->nlr_address_city}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address state:</label>
												<input  type="text" class="form-control" name="nlr_address_state" placeholder="" value="{{$bos2[0]->nlr_address_state}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address postcode:</label>
												<input  type="text" class="form-control" name="nlr_address_postcode" placeholder="" value="{{$bos2[0]->nlr_address_postcode}}">
											</div>
										</div>
									</div>
								</div>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr phone:</label>
												<input type="tel" class="form-control" name="nlr_phone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" value="{{$bos2[0]->nlr_phone}}" >
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr relationship:</label>
												<input  type="text" class="form-control" name="nlr_relationship" placeholder="" value="{{$bos2[0]->nlr_relationship}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Centrelink income:</label>
												<input  type="text" class="form-control" name="centrelink_income" placeholder="" value="{{$bos2[0]->centrelink_income}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Centrelink deductions:</label>
												<input  type="text" class="form-control" name="centrelink_deductions" placeholder="" value="{{$bos2[0]->centrelink_deductions}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Other income:</label>
												<input  type="text" class="form-control" name="other_income" placeholder="" value="{{$bos2[0]->other_income}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Other deduction:</label>
												<input  type="text" class="form-control" name="other_deduction" placeholder="" value="{{$bos2[0]->other_deduction}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Comment:</label>
												<input  type="text" class="form-control" name="comment" placeholder="" value="{{$bos2[0]->comment}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Customer status:</label>
												<input  type="text" class="form-control" name="customer_status" placeholder="" value="{{$bos2[0]->customer_status}}">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Adjustment:</label>
												<input  type="text" class="form-control" name="adjustment" placeholder="" value="{{$bos2[0]->adjustment}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card:</label>
												<input  type="text" class="form-control" name="medicare_card" placeholder="" value="{{$bos2[0]->medicare_card}}" id="medicare_card">
												<div class="common-err-msg" style="display: none;color:red;">CRN or Driver license Or Passport or Medicare card is required</div>

											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card reference:</label>
												<input  type="text" class="form-control" name="medicare_card_reference" placeholder="" value="{{$bos2[0]->medicare_card_reference}}">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card expiry:</label>
												<input  type="text" class="form-control" name="medicare_card_expiry" placeholder="" value="{{$bos2[0]->medicare_card_expiry}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card colour:</label>
												<input  type="text" class="form-control" name="medicare_card_colour" placeholder="" value="{{$bos2[0]->medicare_card_colour}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card middle name:</label>
												<input  type="text" class="form-control" name="medicare_card_middle_name" placeholder="" value="{{$bos2[0]->medicare_card_middle_name}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Defaulted:</label>
												<input  type="text" class="form-control" name="defaulted" placeholder="" value="{{$bos2[0]->defaulted}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Relationship:</label>
												<input  type="text" class="form-control" name="relationship" placeholder="" value="{{$bos2[0]->relationship}}">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Dependents:</label>
												<input  type="text" class="form-control" name="dependents" placeholder="" value="{{$bos2[0]->dependents}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Shared:</label>
												<input  type="text" class="form-control" name="shared" placeholder="" value="{{$bos2[0]->shared}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Living situation:</label>
												<input  type="text" class="form-control" name="living_situation" placeholder="" value="{{$bos2[0]->living_situation}}">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Partner income:</label>
												<input  type="text" class="form-control" name="partner_income" placeholder="" value="{{$bos2[0]->partner_income}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Statement value:</label>
												<input  type="text" class="form-control" name="statement_value" placeholder="" value="{{$bos2[0]->statement_value}}">	
											</div>
										</div>
										
									</div>
								</div>

								<div class="row">
									<div class="col-12 text-center">
										
										<button type="button" class="btn btn-light" onclick="addSystemData('bos2Form')">Submit</button>
										<button type="button" class="btn btn-none"><a href="{{ URL('/bos2') }}"> Cancel</a></button>

									</div>
								</div>

						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- ================================ -->
<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header customeheader">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close myclosee" data-dismiss="modal" aria-label="Close">
          <span class="timesymbol" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
        </button>
      </div>
      <div class="modal-body">
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
												<label>Nlr name:</label>
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
												<label>Nlr address unit number:</label>
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
										
									</div>
								</div>

								<div class="row">
									<div class="col-12 text-center">
									<button type="button" class="btn btn-none" >Cancle</button>
									<button type="button" class="btn btn-light" data-toggle="modal" data-target="#basicExampleModal1" data-dismiss="modal">Submit</button>
										

									</div>
								</div>

						</form>
					</div>
      </div>
    </div>
  </div>
</div>
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