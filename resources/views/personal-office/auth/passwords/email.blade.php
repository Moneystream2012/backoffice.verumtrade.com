@extends('layouts.auth')
@section('page')
    <div class="panel-heading clearfix">
        <div class="pull-left">
            <i class="fa fa-key"></i> @lang('personal-office/auth/passwords/email.title')
        </div>
        <div class="pull-right">
            <a href="{{ route('personal-office.login') }}">
                <i class="fa fa-lock"></i> @lang('personal-office/auth/passwords/email.sign_in')
            </a>
        </div>
    </div>
    <div class="panel-body">
        @include('flash::message')
        <form novalidate="novalidate" role="form" method="POST" accept-charset="UTF-8"
              action="{{ route('personal-office.password-reset.post') }}">
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">@lang('personal-office/auth/passwords/email.email') <span class="text-danger"> *</span></label>
                <input type="email" autofocus="autofocus" class="form-control" autocomplete="off" name="email"
                       id="email" placeholder="E-mail Address" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group" style="margin-top: 25px">
                <button type="submit" class="btn btn-block btn-primary">
                    <i class="fa fa-send"></i> @lang('personal-office/auth/passwords/email.reset_password')
                </button>
            </div>
        </form>
    </div>
@endsection
