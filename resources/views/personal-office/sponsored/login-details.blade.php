@extends('layouts.personal-office')

@section('page')
	<div class="container-fluid-md">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="form-group">
					<div class="row">
						<div class="col-xs-6">
							<label for="id">@lang('personal-office/sponsored/login-details.id')</label>
							<input type="text" class="form-control" id="id" value="{{ $user->id }}" readonly>
						</div>
						<div class="col-xs-6">
							<label for="username">@lang('personal-office/sponsored/login-details.username')</label>
							<input type="text" class="form-control" id="username" value="{{ $user->username }}"
							       readonly>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-xs-6">
							<label for="email">@lang('personal-office/sponsored/login-details.email')</label>
							<input type="text" class="form-control" id="email" value="{{ $user->email }}" readonly>
						</div>
						<div class="col-xs-6">
							<label for="mobile-number">@lang('personal-office/sponsored/login-details.mobile_number')</label>
							<input type="text" class="form-control" id="mobile-number"
							       value="{{ $user->mobile_number }}" readonly>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-xs-6">
							<label for="password">@lang('personal-office/sponsored/login-details.password')</label>
							<input type="text" class="form-control" id="password" value="{{ $user->password }}"
							       readonly>
						</div>
						<div class="col-xs-6">
							<label for="transaction_password">@lang('personal-office/sponsored/login-details.transaction_password')</label>
							<input type="text" class="form-control" id="transaction_password"
							       value="{{ $user->transaction_password }}" readonly>
						</div>
					</div>
				</div>


			</div>
			<div class="panel-footer margin-lg-top hidden">
				<a href="" class="btn btn-round btn-default btn-sm">@lang('personal-office/sponsored/login-details.back')</a>
			</div>
		</div>

	</div>

@endsection