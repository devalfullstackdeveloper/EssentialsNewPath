@extends('layouts.layout')
@section('stylesection')

@endsection
@section('content')
<div class="container">

			
	<div class="form-group row">
		<div class="col-lg-10 mx-auto">

			<div class="row">
				<div class="col-lg-12 ">
					 <h4 class="mb-0 ml-3"><b>BOS1</b></h4>
					 <br>
				</div>
			</div>
				
			<div class="alert-success" id="popup_notification" style="display:none;">
				Client Data Updated and Added in Queue Successfully , will be reflected shortly.
			</div>		

			<div class="card border-0">
				<div class="card-body bg-light">
					<div class="inner-bos-one ">
						<form name="bos1Form" id="bos1Form" enctype="multipart/form-data">
	@csrf
								<input type="hidden" name="system" value="{{$bos1[0]->system}}">
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Client id:</label>
												<input  type="text" class="form-control" name="client_id" placeholder="" readonly="" value="{{$bos1[0]->client_id}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Default type:</label>
												<input  type="text" class="form-control" name="default_type" placeholder="" value="{{$bos1[0]->default_type}}" >
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Crn:</label>
												<input  type="text" class="form-control" name="crn" placeholder="" value="{{$bos1[0]->crn}}" id="crn" >
												<div class="common-err-msg" style="display: none;color:red;">CRN or Driver license Or Passport or Medicare card is required</div>
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Date:</label>
												<input  type="date" class="form-control" name="date_joined" placeholder="" value="{{$bos1[0]->date_joined}}">
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
													<option @if($bos1[0]->title == 'Mr.') selected @endif>Mr.</option>
													<option @if($bos1[0]->title == 'Mrs.') selected @endif>Mrs.</option>
													<option @if($bos1[0]->title == 'Miss.') selected @endif>Miss.</option>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<!--div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Name:</label>
												<input  type="text" class="form-control" name="name" placeholder="" value="{{$bos1[0]->name}}">
											</div>
										</div-->
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>First name:</label>
												<input  type="text" class="form-control" name="name_first" placeholder="" value="{{$bos1[0]->name_first}}" id="name_first">
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
												<input  type="text" class="form-control" name="name_middle" placeholder="" value="{{$bos1[0]->name_middle}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Last name:</label>
												<input  type="text" class="form-control" name="name_last" placeholder="" value="{{$bos1[0]->name_last}}" id="name_last">
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
												<input  type="text" class="form-control" name="address" placeholder="" value="{{$bos1[0]->address}}"  >
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address unit number:</label>
												<input  type="text" class="form-control" name="address_unit_number" placeholder="" value="{{$bos1[0]->address_unit_number}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address number:</label>
												<input  type="text" class="form-control" name="address_number" placeholder="" value="{{$bos1[0]->address_number}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Address name:</label>
												<input  type="text" class="form-control" name="address_name" placeholder="" value="{{$bos1[0]->address_name}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address city:</label>
												<input  type="text" class="form-control" name="address_city" placeholder="" value="{{$bos1[0]->address_city}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address state:</label>
												<input  type="text" class="form-control" name="address_state" placeholder="" value="{{$bos1[0]->address_state}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address postcode:</label>
												<input  type="text" class="form-control" name="address_postcode" placeholder="" value="{{$bos1[0]->address_postcode}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Address lat:</label>
												<input  type="text" class="form-control" name="address_lat" placeholder="" value="{{$bos1[0]->address_lat}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Address lng:</label>
												<input  type="text" class="form-control" name="address_lng" placeholder="" value="{{$bos1[0]->address_lng}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Address municipality:</label>
												<input  type="text" class="form-control" name="address_municipality" placeholder="" value="{{$bos1[0]->address_municipality}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address region:</label>
												<input  type="text" class="form-control" name="address_region" placeholder="" value="{{$bos1[0]->address_region}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Address zone:</label>
												<input  type="text" class="form-control" name="address_zone" placeholder="" value="{{$bos1[0]->address_zone}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Delivery Address:</label>
												<input  type="text" class="form-control" name="delivery_address" placeholder="" value="{{$bos1[0]->delivery_address}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address unit number:</label>
												<input  type="text" class="form-control" name="delivery_address_unit_number" placeholder="" value="{{$bos1[0]->delivery_address_unit_number}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address number:</label>
												<input  type="text" class="form-control" name="delivery_address_number" placeholder="" value="{{$bos1[0]->delivery_address_number}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Delivery address name:</label>
												<input  type="text" class="form-control" name="delivery_address_name" placeholder="" value="{{$bos1[0]->delivery_address_name}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address city:</label>
												<input  type="text" class="form-control" name="delivery_address_city" placeholder="" value="{{$bos1[0]->delivery_address_city}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address state:</label>
												<input  type="text" class="form-control" name="delivery_address_state" placeholder="" value="{{$bos1[0]->delivery_address_state}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address postcode:</label>
												<input  type="text" class="form-control" name="delivery_address_postcode" placeholder="" value="{{$bos1[0]->delivery_address_postcode}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address lat:</label>
												<input  type="text" class="form-control" name="delivery_address_lat" placeholder="" value="{{$bos1[0]->delivery_address_lat}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address lng:</label>
												<input  type="text" class="form-control" name="delivery_address_lng" placeholder="" value="{{$bos1[0]->delivery_address_lng}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address municipality:</label>
												<input  type="text" class="form-control" name="delivery_address_municipality" placeholder="" value="{{$bos1[0]->delivery_address_municipality}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address region:</label>
												<input  type="text" class="form-control" name="delivery_address_region" placeholder="" value="{{$bos1[0]->delivery_address_region}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Delivery address zone:</label>
												<input  type="text" class="form-control" name="delivery_address_zone" placeholder="" value="{{$bos1[0]->delivery_address_zone}}">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Phone:</label>
												<input type="tel" class="form-control" name="phone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" value="{{$bos1[0]->phone}}" >
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Mobile:</label>
												<input type="tel" class="form-control" name="mobile"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" value="{{$bos1[0]->mobile}}" id="mobile">
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
												<input  type="email" class="form-control" name="email" placeholder="" value="{{$bos1[0]->email}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Dob:</label>
												<input  type="date" class="form-control" name="dob" placeholder="" value="{{$bos1[0]->dob}}" id="dob">
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
												<input  type="text" class="form-control" name="driver_license" placeholder="" value="{{$bos1[0]->driver_license}}" id="driver_license">
												<div class="common-err-msg" style="display: none;color:red;">CRN or Driver license Or Passport or Medicare card is required</div>
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Driver license state code:</label>
												<input  type="text" class="form-control" name="driver_license_state_code" placeholder="" value="{{$bos1[0]->driver_license_state_code}}">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Passport:</label>
												<input  type="text" class="form-control" name="passport" placeholder="" value="{{$bos1[0]->passport}}" id="passport">
												<div class="common-err-msg" style="display: none;color:red;">CRN or Driver license Or Passport or Medicare card is required</div>
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Passport country code:</label>
												<input  type="text" class="form-control" name="passport_country_code" placeholder="" value="{{$bos1[0]->passport_country_code}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr name:</label>
												<input  type="text" class="form-control" name="nlr_name" placeholder="" value="{{$bos1[0]->nlr_name}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr name first:</label>
												<input  type="text" class="form-control" name="nlr_name_first" placeholder="" value="{{$bos1[0]->nlr_name_first}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr name last:</label>
												<input  type="text" class="form-control" name="nlr_name_last" placeholder="" value="{{$bos1[0]->nlr_name_last}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Nlr address:</label>
												<input  type="text" class="form-control" name="nlr_address" placeholder="" value="{{$bos1[0]->nlr_address}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address unit number:</label>
												<input  type="text" class="form-control" name="nlr_address_unit_number" placeholder="" value="{{$bos1[0]->nlr_address_unit_number}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address number:</label>
												<input  type="text" class="form-control" name="nlr_address_number" placeholder="" value="{{$bos1[0]->nlr_address_number}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address name:</label>
												<input  type="text" class="form-control" name="nlr_address_name" placeholder="" value="{{$bos1[0]->nlr_address_name}}">
											</div>
										</div>
									</div>
								</div>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address city:</label>
												<input  type="text" class="form-control" name="nlr_address_city" placeholder="" value="{{$bos1[0]->nlr_address_city}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address state:</label>
												<input  type="text" class="form-control" name="nlr_address_state" placeholder="" value="{{$bos1[0]->nlr_address_state}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr address postcode:</label>
												<input  type="text" class="form-control" name="nlr_address_postcode" placeholder="" value="{{$bos1[0]->nlr_address_postcode}}">
											</div>
										</div>
									</div>
								</div>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr phone:</label>
												<input type="tel" class="form-control" name="nlr_phone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" value="{{$bos1[0]->nlr_phone}}" >
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Nlr relationship:</label>
												<input  type="text" class="form-control" name="nlr_relationship" placeholder="" value="{{$bos1[0]->nlr_relationship}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Centrelink income:</label>
												<input  type="text" class="form-control" name="centrelink_income" placeholder="" value="{{$bos1[0]->centrelink_income}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Centrelink deductions:</label>
												<input  type="text" class="form-control" name="centrelink_deductions" placeholder="" value="{{$bos1[0]->centrelink_deductions}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Other income:</label>
												<input  type="text" class="form-control" name="other_income" placeholder="" value="{{$bos1[0]->other_income}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Other deduction:</label>
												<input  type="text" class="form-control" name="other_deduction" placeholder="" value="{{$bos1[0]->other_deduction}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Comment:</label>
												<input  type="text" class="form-control" name="comment" placeholder="" value="{{$bos1[0]->comment}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Customer status:</label>
												<input  type="text" class="form-control" name="customer_status" placeholder="" value="{{$bos1[0]->customer_status}}">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Adjustment:</label>
												<input  type="text" class="form-control" name="adjustment" placeholder="" value="{{$bos1[0]->adjustment}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card:</label>
												<input  type="text" class="form-control" name="medicare_card" placeholder="" value="{{$bos1[0]->medicare_card}}" id="medicare_card">
												<div class="common-err-msg" style="display: none;color:red;">CRN or Driver license Or Passport or Medicare card is required</div>
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card reference:</label>
												<input  type="text" class="form-control" name="medicare_card_reference" placeholder="" value="{{$bos1[0]->medicare_card_reference}}">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card expiry:</label>
												<input  type="text" class="form-control" name="medicare_card_expiry" placeholder="" value="{{$bos1[0]->medicare_card_expiry}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card colour:</label>
												<input  type="text" class="form-control" name="medicare_card_colour" placeholder="" value="{{$bos1[0]->medicare_card_colour}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Medicare card middle name:</label>
												<input  type="text" class="form-control" name="medicare_card_middle_name" placeholder="" value="{{$bos1[0]->medicare_card_middle_name}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Defaulted:</label>
												<input  type="text" class="form-control" name="defaulted" placeholder="" value="{{$bos1[0]->defaulted}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Relationship:</label>
												<input  type="text" class="form-control" name="relationship" placeholder="" value="{{$bos1[0]->relationship}}">	
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Dependents:</label>
												<input  type="text" class="form-control" name="dependents" placeholder="" value="{{$bos1[0]->dependents}}">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Shared:</label>
												<input  type="text" class="form-control" name="shared" placeholder="" value="{{$bos1[0]->shared}}">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
											<div class="form-group">
												<label>Living situation:</label>
												<input  type="text" class="form-control" name="living_situation" placeholder="" value="{{$bos1[0]->living_situation}}">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Partner income:</label>
												<input  type="text" class="form-control" name="partner_income" placeholder="" value="{{$bos1[0]->partner_income}}">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Statement value:</label>
												<input  type="text" class="form-control" name="statement_value" placeholder="" value="{{$bos1[0]->statement_value}}">	
											</div>
										</div>
										
										<input type="hidden" name="bos1_id" value="{{$bos1[0]->bos1_id}}">
										
										
									</div>
								</div>

								<div class="row">
									<div class="col-12 text-center">
										
										<button type="button" class="btn btn-light" onclick="addSystemData('bos1Form')">Submit</button>
										<button type="button" class="btn btn-none"><a href="{{ URL('/bos1') }}"> Cancel</a></button>

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

<!-- ============================================== -->
@endsection
@section('scriptsection')
@endsection