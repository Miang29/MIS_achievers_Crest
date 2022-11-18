@extends('layouts.admin')

@section('title', 'User Account')

@section('content')
<h2 class="text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{ route('user.index') }}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i>Users</a></h2>
<hr class="hr-thick" style="border-color: #707070;">

<div class="col-12 my-2 mx-auto">
	<div class="card mx-auto">
		<h5 class="card-header text-center text-white gbg-1"> Edit User Account</h5>

		<div class="card-body d-flex">
			<div class="form-group mx-auto w-75 ">

				<div class="row">
					<div class="col-6 col-lg-6 ">
						<div class="form-group">
							<label class="h7 important my-2 font-weight-bold text-1" for="firstname">First Name</label>
							<input class="form-control " type="text" name="first_name" />
						</div>

						<div class="form-group">
							<label class="h7 important  my-2 font-weight-bold  text-1" for="middlename">Middle Name</label>
							<input class="form-control " type="text" name="middle_name" />
                        </div>

                        <div class="form-group">
							<label class="h7 important  my-2 font-weight-bold text-1" for="lastname">Last Name</label>
							<input class="form-control " type="text" name="last_name" />
                        </div>

                        <div class="form-group">
							<label class="h7 important  my-2 font-weight-bold  text-1 " for="suffix">Suffix</label>
							<input class="form-control  " type="text" name="suffix" />
                        </div>
					</div>

					<div class="col-6 col-lg-6">
						<div class="form-group">
							<label class="h7  text-1 font-weight-bold  my-2 important " for="username">Username</label>
							<input class="form-control " type="text" name="username" />
                        </div>

                        <div class="form-group">
							<label class="form-label font-weight-bold my-2 important" for="password">Password</label>
							<div class="input-group floating-label-group">
								<input class="form-control  floating-label-input" type="password" name="password" id="password" aria-label="Password" aria-describedby="toggle-show-password" placeholder=" " />
								<button type="button" class="btn floating-eye-pass border-light " id="toggle-show-password" aria-label="Show Password" data-target="#password">
									<i class="fas fa-eye d-none" id="show"></i>
									<i class="fas fa-eye-slash" id="hide"></i>
								</button>
							</div>
                        </div>

                        <div class="form-group">
							<label class="form-label font-weight-bold my-2 important" for="password_confirmation">Confirm Password</label>
							<div class="input-group floating-label-group">
								<input class="form-control floating-label-input" type="password" name="password_confirmation" id="password_confirmation" aria-label="Password" aria-describedby="toggle-show-password"/>
								<button type="button" class="btn floating-eye-pass border-light " id="toggle-show-password" aria-label="Show Password" data-target="#password_confirmation">
									<i class="fas fa-eye d-none" id="show"></i>
									<i class="fas fa-eye-slash" id="hide"></i>
								</button>
							</div>
                        </div>

                        <div class="form-group">
							<label class="h7 font-weight-bold  my-2 important text-1" for="usertype">User Type</label>
							<div class="input-group mb-3">
								<select class="custom-select  text-1" id="inputGroupSelect01">
									<option selected name="usertype"></option>
								</select>
							</div>
                        </div>
					</div>
				</div>
			</div>
		</div>

		<div class="card-footer d-flex">
			<div class="col-6 mx-auto  text-center">
				<button class="btn btn-outline-info  btn-sm  w-25 "><a href="#"></a>Save</button>
				<a href="javascript:void(0);" onclick="confirmLeave('{{ route('user.index') }}');" class="btn btn-outline-danger btn-sm w-25">Cancel</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/util/confirm-leave.js') }}"></script>
@endsection