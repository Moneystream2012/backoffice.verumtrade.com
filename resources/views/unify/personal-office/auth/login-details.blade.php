@extends('unify.layouts.auth')
@section('page')
	<div class="panel-heading clearfix">
		<div class="pull-left">
			<i class="fa fa-plus-circle"></i> @lang('unify.personal-office.auth.login-details.title')
		</div>
		<div class="pull-right">
			<a href="{{ route('personal-office.login') }}">
				<i class="fa fa-lock"></i> @lang('unify.personal-office.auth.login-details.sign_in')
			</a>
		</div>
	</div>
	<div class="panel-body">
		<div class="alert alert-success alert-dismissible" role="alert">
			<strong>@lang('unify.personal-office.auth.login-details.registration')</strong>
			<ol style="margin: 0;padding-left: 13px;">
				<li>@lang('unify.personal-office.auth.login-details.email_confirm') <b>{{ $user->email }}</b></li>
				<li>@lang('unify.personal-office.auth.login-details.save')</li>
			</ol>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label for="id">@lang('unify.personal-office.auth.login-details.id')</label>
					<input type="text" class="form-control input-lg" id="id" value="{{ $user->id }}" readonly>
				</div>
				<div class="col-xs-6">
					<label for="username">@lang('unify.personal-office.auth.login-details.username')</label>
					<input type="text" class="form-control input-lg" id="username" value="{{ $user->username }}"
						   readonly>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label for="email">@lang('unify.personal-office.auth.login-details.email')</label>
					<input type="text" class="form-control input-lg" id="email" value="{{ $user->email }}" readonly>
				</div>
				<div class="col-xs-6">
					<label for="mobile-number">@lang('unify.personal-office.auth.login-details.mobile_number')</label>
					<input type="text" class="form-control input-lg" id="mobile-number"
						   value="{{ $user->mobile_number }}" readonly>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-xs-6">
					<label for="password">@lang('unify.personal-office.auth.login-details.password')</label>
					<input type="text" class="form-control input-lg" id="password" value="{{ $user->password }}"
						   readonly>
				</div>
				<div class="col-xs-6">
					<label for="transaction_password">@lang('unify.personal-office.auth.login-details.transaction_password')</label>
					<input type="text" class="form-control input-lg" id="transaction_password"
						   value="{{ $user->transaction_password }}" readonly>
				</div>
			</div>
		</div>

		<br>

		<div class="form-group">
			<a href="{{ route('personal-office.login') }}" class="btn btn-block btn-primary">
				<i class="fa fa-sign-in"></i> @lang('unify.personal-office.auth.login-details.login')
			</a>
		</div>
	</div>
@endsection
