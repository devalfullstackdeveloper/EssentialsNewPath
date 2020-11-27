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
					 <h4 class="mb-0"><b>Upload Data</b></h4>
					 <br>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-body bg-light">
					<div class="">
						<div class="col-lg-12 form-group box1">
							<label for="">Choose File</label>
							<input type="file" name="csvfile" id="csvfile"  class="w-100">
							<span class="text-info">.xlsx, .xls, .csv</span>
						</div>
						<div class="col-lg-12 form-group box1">
							<label for="">System</label>
							<select name="system" id="system"  class="form-control" style="cursor: pointer;">
									<option value="">--SELECT SYSTEM--</option>
									<option value="BOS1">BOS1</option>
									<option value="BOS2">BOS2</option>
									<option value="MIM">MIM</option>
									<option value="RCS">RCS</option>
							</select>
						</div>
					</div>
					<div class="">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-6">
									<label style="cursor: pointer;"><input type="radio" name="loadtype" id="loadtype" value="intial">&nbsp;&nbsp;Initial uploads</label>		
								</div>
								<div class="col-lg-6">
									<label style="cursor: pointer;"><input type="radio" name="loadtype" id="loadtype" value="update">&nbsp;&nbsp;Update Records</label>
								</div>
							</div>
							
						</div>
					</div>

					<div class="">
						<div class="col-lg-12">
							<button type="submit" name="submit" id="submit" class="btn btn-sm btn-basic btn1" style="">Submit</button>
							<button style="display: none;" type="button" class="btn btn-sm btn-link btn2"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Please Wait....</button>
							
							<button type="reset" name="reset" id="reset" class="btn btn-sm btn-link btn3">Cancel</button>
						</div>
					</div>
				</div>
			</div>
			

			<div class="row successdiv hidediv" style="display: none;">
				<div class="col-lg-12">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <strong>Success!</strong><p class="successmsg"></p> 
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
					</div>
				</div>
			</div>

			<div class="row errordiv hidediv" style="display: none;">
				<div class="col-lg-12">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <strong>Error!</strong><p class="errormsg"></p> 
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
					</div>
				</div>
			</div>

			<div class="row warningdiv hidediv" style="display: none;">
				<div class="col-lg-12">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <strong>Warning!</strong><p class="warningmsg"></p> 
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
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