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
				<div class="col-lg-12">
					 <h4 class="mb-0 ml-3"><b>MIM</b></h4>
					 <br>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-body bg-light">
				<div class="inner-bos-one ">
						<form>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>client id :</label>
												<input  type="text" class="form-control" name="client_id" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Order id:</label>
												<input  type="text" class="form-control" name="order_id" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Customer id:</label>
												<input  type="text" class="form-control" name="customer_id" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>First name :</label>
												<input  type="text" class="form-control" name="first_name" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Middle name:</label>
												<input  type="text" class="form-control" name="middle_name" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Last name :</label>
												<input  type="text" class="form-control" name="last_name" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label> Date of birth :</label>
												<input  type="date" class="form-control" name="date_of_birth" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Flat number:</label>
												<input  type="text" class="form-control" name="flat_number" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Street number :</label>
												<input  type="text" class="form-control" name="street_number" placeholder="">
											</div>
										</div>
									</div>
								</div>

											
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Street name :</label>
												<input  type="text" class="form-control" name="street_name" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Suburb:</label>
												<input  type="text" class="form-control" name="suburb" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Country :</label>
												<input  type="text" class="form-control" name="country" placeholder="">
											</div>
										</div>
									</div>
								</div>

												
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Licence number:</label>
												<input  type="text" class="form-control" name="licence_number" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Licence state:</label>
												<input  type="text" class="form-control" name="licence_state" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Terms conditions accepted :</label>
												<input  type="text" class="form-control" name="terms_conditions_accepted" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Entered:</label>
												<input  type="text" class="form-control" name="entered" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Entered user id:</label>
												<input  type="text" class="form-control" name="entered_user_id" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Verification status :</label>
												<input  type="text" class="form-control" name="verification_status" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Passport number:</label>
												<input  type="text" class="form-control" name="passport_number" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Passport country:</label>
												<input  type="text" class="form-control" name="passport_country" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Passport expiry :</label>
												<input  type="text" class="form-control" name="passport_expiry" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Status:</label>
												<input  type="text" class="form-control" name="status" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Last updated:</label>
												<input  type="text" class="form-control" name="last_updated" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Crn number :</label>
												<input  type="text" class="form-control" name="crn_number" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Home phone area code:</label>
												<input  type="text" class="form-control" name="home_phone_area_code" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Home phone:</label>
												<input  type="text" class="form-control" name="home_phone" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Mobile phone :</label>
												<input type="tel" class="form-control" name="mobile_phone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" >
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
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Address1:</label>
												<input  type="text" class="form-control" name="address1" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Address2	:</label>
												<input  type="text" class="form-control" name="address2	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Postcode :</label>
												<input  type="text" class="form-control" name="postcode	" placeholder="">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>State</label>
												<input  type="text" class="form-control" name="state" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Benefit id	:</label>
												<input  type="text" class="form-control" name="benefit_id	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Account no :</label>
												<input  type="text" class="form-control" name="account_no	" placeholder="">
											</div>
										</div>
									</div>
								</div>

								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Email optout</label>
												<input  type="text" class="form-control" name="email_optout" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Is newsletter unsubscribed	:</label>
												<input  type="text" class="form-control" name="is_newsletter_unsubscribed	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Unique id :</label>
												<input  type="text" class="form-control" name="unique_id	" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Is test account</label>
												<input  type="text" class="form-control" name="is_test_account" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Fortnightly income	:</label>
												<input  type="text" class="form-control" name="fortnightly_income	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Fortnightly expenses :</label>
												<input  type="text" class="form-control" name="fortnightly_expenses	" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Home phone area code 2nd:</label>
												<input  type="text" class="form-control" name="home_phone_area_code_2nd" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Home phone 2nd:</label>
												<input  type="text" class="form-control" name="home_phone_2nd	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Mobile phone 2nd:</label>
												<input type="tel" class="form-control" name="mobile_phone_2nd"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="" >
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Unit no:</label>
												<input  type="text" class="form-control" name="unit_no" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Street no:</label>
												<input  type="text" class="form-control" name="street_no	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> street type:</label>
												<input  type="text" class="form-control" name="street_type	" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Account type:</label>
												<input  type="text" class="form-control" name="account_type" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Frequency type:</label>
												<input  type="text" class="form-control" name="frequency_type	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Account holder name:</label>
												<input  type="text" class="form-control" name="account_holder_name	" placeholder="">
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
												<label>Bank account no:</label>
												<input  type="text" class="form-control" name="bank_account_no	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Ezidebit account no:</label>
												<input  type="text" class="form-control" name="ezidebit_account_no	" placeholder="">
											</div>
										</div>
									</div>
								</div>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Ezidebit Creation:</label>
												<input  type="text" class="form-control" name="ezidebit_creation" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Driver license no:</label>
												<input  type="text" class="form-control" name="driver_license_no" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> medicare_no:</label>
												<input  type="text" class="form-control" name="medicare_no	" placeholder="">
											</div>
										</div>
									</div>
								</div>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Passport no:</label>
												<input  type="text" class="form-control" name="passport_no" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Previous unit no:</label>
												<input  type="text" class="form-control" name="previous_unit_no	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Previous street no:</label>
												<input  type="text" class="form-control" name="previous_street_no	" placeholder="">
											</div>
										</div>
									</div>
								</div>
								
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Previous street name</label>
												<input  type="text" class="form-control" name="previous_street_name" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Previous street type:</label>
												<input  type="text" class="form-control" name="previous_street_type" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Previous postcode:</label>
												<input  type="text" class="form-control" name="previous_postcode" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Previous suburb:</label>
												<input  type="text" class="form-control" name="previous_suburb" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Previous state:</label>
												<input  type="text" class="form-control" name="previous_state" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Postis skip tally limitcode:</label>
												<input  type="text" class="form-control" name="is_skip_tally_limit" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Skip tally limit updated by:</label>
												<input  type="text" class="form-control" name="skip_tally_limit_updated_by" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Skip tally limit updated at:</label>
												<input  type="text" class="form-control" name="skip_tally_limit_updated_at" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Residency Status:</label>
												<input  type="text" class="form-control" name="residency_status" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Is consent privacy act:</label>
												<input  type="text" class="form-control" name="is_consent_privacy_act" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Is essential opt out:</label>
												<input  type="text" class="form-control" name="is_essential_opt_out	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Is essential opt out sms:</label>
												<input  type="text" class="form-control" name="is_essential_opt_out_sms	" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Customer password:</label>
												<input  type="text" class="form-control" name="customer_password" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Authorised person:</label>
												<input  type="text" class="form-control" name="authorised_person	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> Authorised relation:</label>
												<input  type="text" class="form-control" name="authorised_relation	" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Authorised dob:</label>
												<input  type="text" class="form-control" name="authorised_dob" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Marital status:</label>
												<input  type="text" class="form-control" name="marital_status" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label>Dependants:</label>
												<input  type="text" class="form-control" name="dependants" placeholder="">
											</div>
										</div>
									</div>
								</div>

								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Is qualify:</label>
												<input  type="text" class="form-control" name="is_qualify" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
										<div class="form-group">
												<label>Is no recent payment:</label>
												<input  type="text" class="form-control" name="is_no_recent_payment	" placeholder="">
											</div>
										</div>
										<div class="col-lg-4 col-ms-4 col-sm-12 col-12">
											<div class="form-group">
												<label> No recent payment at:</label>
												<input  type="text" class="form-control" name="no_recent_payment_at	" placeholder="">
											</div>
										</div>
									</div>
								</div>
								<div class="shadow pb0 mb0 bg-color rounded">
									<div class="row">
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
										<div class="form-group">
												<label>User id:</label>
												<input  type="text" class="form-control" name="user_id" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-ms-6 col-sm-12 col-12">
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