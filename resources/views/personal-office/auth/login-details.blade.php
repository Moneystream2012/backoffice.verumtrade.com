@extends('layouts.auth')
@section('page')
	<div class="panel-heading clearfix">
		<div class="pull-left">
			<i class="fa fa-plus-circle"></i> @lang('personal-office/auth/login.title')
		</div>
		<div class="pull-right">
			<a href="{{ route('personal-office.login') }}">
				<i class="fa fa-lock"></i> @lang('personal-office/auth/login.sign_in')
			</a>
		</div>
	</div>
	<div class="panel-body">
		<div class="alert alert-success alert-dismissible" role="alert">
			<strong>@lang('personal-office/auth/login.registration')</strong>
			<ol style="margin: 0;padding-left: 13px;">
				<li>@lang('personal-office/auth/login.email_confirm'): <b>{{ $user->email }}</b></li>
				<li>@lang('personal-office/auth/login.save')</li>
			</ol>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label for="id">@lang('personal-office/auth/login.id'):</label>
					<input type="text" class="form-control input-lg" id="id" value="{{ $user->id }}" readonly>
				</div>
				<div class="col-xs-6">
					<label for="username">@lang('personal-office/auth/login.username'):</label>
					<input type="text" class="form-control input-lg" id="username" value="{{ $user->username }}"
						   readonly>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label for="email">@lang('personal-office/auth/login.email'):</label>
					<input type="text" class="form-control input-lg" id="email" value="{{ $user->email }}" readonly>
				</div>
				<div class="col-xs-6">
					<label for="mobile-number">@lang('personal-office/auth/login.mobile_number'):</label>
					<input type="text" class="form-control input-lg" id="mobile-number"
						   value="{{ $user->mobile_number }}" readonly>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label for="password">@lang('personal-office/auth/login.password'):</label>
					<input type="text" class="form-control input-lg" id="password" value="{{ $user->password }}"
						   readonly>
				</div>
				<div class="col-xs-6">
					<label for="transaction_password">@lang('personal-office/auth/login.transaction_password'):</label>
					<input type="text" class="form-control input-lg" id="transaction_password"
						   value="{{ $user->transaction_password }}" readonly>
				</div>
			</div>
		</div>

		<br>

		<div class="form-group">
			<a href="{{ route('personal-office.login') }}" class="btn btn-block btn-primary">
				<i class="fa fa-sign-in"></i> @lang('personal-office/auth/login.title')
			</a>
		</div>
	</div>
@endsection
