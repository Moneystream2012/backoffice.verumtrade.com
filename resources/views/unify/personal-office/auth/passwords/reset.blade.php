@extends('unify.layouts.auth')
@section('page')
    <div class="panel-heading clearfix">
        <div class="pull-left">
            <i class="fa fa-key"></i> @lang('unify.personal-office.auth.passwords.reset.title')
        </div>
        <div class="pull-right">
            <a href="{{ route('personal-office.login') }}">
                <i class="fa fa-lock"></i> @lang('unify.personal-office.auth.passwords.reset.sign_in')
            </a>
        </div>
    </div>
    <div class="panel-body">
        @include('flash::message')
        <form novalidate="novalidate" role="form" method="POST" accept-charset="UTF-8"
              action="{{ route('personal-office.password-reset-token.post') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">@lang('unify.personal-office.auth.passwords.reset.email') <span class="text-danger"> *</span></label>
                <input type="email" class="form-control" name="email" id="email" autocomplete="off"
                       placeholder="E-mail Address">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div
                class="form-group {{ $errors->has('password') || $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password">@lang('unify.personal-office.auth.passwords.reset.password') <span class="text-danger"> *</span></label>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Password" autocomplete="off">
                    </div>
                    <div class="col-xs-6">
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm Password" autocomplete="off">
                    </div>
                </div>
                @if ($errors->has('password') || $errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group" style="margin-top: 25px">
                <button type="submit" class="btn btn-block btn-primary">
                    <i class="fa fa-random"></i> @lang('unify.personal-office.auth.passwords.reset.title')
                </button>
            </div>
        </form>
    </div>
@endsection
