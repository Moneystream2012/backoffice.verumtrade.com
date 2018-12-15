@extends('unify.layouts.auth')
@push('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.5/js/intlTelInput-jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.5/js/utils.js"></script>
    <script src="{{asset('veneto/assets/plugins/jquery-select2/select2.min.js')}}"></script>

    <script>
        jQuery(function ($) {
            'use strict';
            // Select2
            $('select.form-select2').select2();

            var telInput = $("#mobile_number");
            telInput.intlTelInput({
                // nationalMode: true,
                separateDialCode: true,
                hiddenInput: 'mobile_number',
                placeholderNumberType: 'MOBILE',
                preferredCountries: ["ua", "ru"]
            });

            telInput.keyup(function () {
                if ($.trim(telInput.val())) {
                    if (telInput.intlTelInput("isValidNumber")) {
                        $('#btn-send-code').prop("disabled", false);
                    } else {
                        $('#btn-send-code').prop('disabled', true);
                    }
                }
            });
            $("#btn-send-code").click(function () {
                $('#btn-send-code').prop('disabled', true);
                var tel = telInput.intlTelInput("getNumber");
                $.get( "/api/sms-verification/" + tel, function( data ) {
                    telInput.prop('disabled', true);
                    alert( "Code send to: " + tel,  );
                });

            });

            /*$("form").submit(function () {
                // telInput.val(telInput.intlTelInput("getNumber"));
                $('#mobile_code').val(telInput.intlTelInput("getSelectedCountryData").iso2.toUpperCase());
            });*/
        });

    </script>
@endpush
@push('page-styles')
    <link rel="stylesheet" href="{{asset('veneto/css/plugins/jquery-select2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.5/css/intlTelInput.css"/>
    <style>
        .iti-flag {
            background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.5/img/flags.png");
        }

        .intl-tel-input {
            width: 100%;
        }

        .intl-tel-input .iti-flag .arrow {
            border: none;
        }
    </style>
@endpush
@section('page')

    <div class="panel-heading clearfix">
        <div class="pull-left">
            <i class="fa fa-plus-circle"></i> Sign up
        </div>
        <div class="pull-right">
            <a href="{{ route('personal-office.login') }}">
                <i class="fa fa-lock"></i> Sign in
            </a>
        </div>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" accept-charset="UTF-8"
              action="{{ route('personal-office.register.post') }}">
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('first_name') || $errors->has('last_name')  ? ' has-error' : '' }}">
                <label for="first_name">Name <span class="text-danger"> *</span></label>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" name="first_name" id="first_name"
                               value="{{ old('first_name') }}"
                               autocomplete="off"
                               placeholder="First Name" required>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                               placeholder="Last Name" autocomplete="off" required>
                    </div>
                </div>
                @if ($errors->has('first_name') || $errors->has('last_name'))
                    <span class="help-block">
                                <strong style="display: block">{{ $errors->first('first_name') }}</strong>
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username">Username <span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}"
                       placeholder="User Name" autocomplete="off" required>
                @if ($errors->has('username'))
                    <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-mail <span class="text-danger"> *</span></label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                       placeholder="E-mail Address" autocomplete="off" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                <input type="hidden" name="mobile_code" id="mobile_code" value="UA">
                <label for="mobile_number">Mobile Number Verification</label>
                <div class="row" id="send-sms-number">
                    <div class="col-xs-7">
                        <input type="tel" name="mobile_number" class="form-control" id="mobile_number"
                               value="{{ old('mobile_number') }}" autocomplete="off" required>
                    </div>
                    <div class="col-xs-5">
                        <button class="btn btn-primary btn-block" id="btn-send-code" type="button" disabled>Send Code
                        </button>
                    </div>
                </div>
                @if ($errors->has('mobile_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mobile_number') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('sms_code') ? ' has-error' : '' }}">
                <label for="sms_code">SMS Code <span class="text-danger"> *</span></label>
                <input type="text" name="sms_code" class="form-control" placeholder="SMS Code" id="sms_code"
                       value="{{ old('sms_code') }}" autocomplete="off" required>
                @if ($errors->has('sms_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sms_code') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('sponsor') ? ' has-error' : '' }}">
                <label for="sponsor">Sponsor <span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="sponsor" name="sponsor"
                       @if(old('sponsor')) value="{{ old('sponsor') }}" @else value="{{$sponsor}}"
                       @endif placeholder="Sponsor Name" autocomplete="off" required>
                @if ($errors->has('sponsor'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sponsor') }}</strong>
                    </span>
                @endif
            </div>

            <div
                class="form-group {{ $errors->has('password') || $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password">Password <span class="text-danger"> *</span></label>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Password" autocomplete="off" required>
                    </div>
                    <div class="col-xs-6">
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm Password" autocomplete="off" required>
                    </div>
                </div>
                @if ($errors->has('password') || $errors->has('password_confirmation'))
                    <span class="help-block">
                                <strong style="display: block">{{ $errors->first('password') }}</strong>
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="country" class="control-label">Country</label>
                <select class="form-control form-chosen form-select2" data-placeholder="Choose a Country..."
                        name="country"
                        id="country"
                        required>
                    @foreach ($countries as $key => $val)
                        <option value="{{ $key }}"
                                @if (old('country') == $key || (!old('country') && strtoupper(\App::getLocale() == 'uk' ?  'ua' : \App::getLocale()) == $key)) selected @endif>{{ $val }}</option>
                    @endforeach
                </select>
                @if ($errors->has('country'))
                    <span class="help-block">{{ $errors->first('country') }}</span>
                @endif
            </div>

            <div class="form-group  {{ $errors->has('terms') ? ' has-error' : '' }}">
                <div class="checkbox">
                    <label><input type="checkbox" name="terms"> I agree <a href="#terms" data-toggle="modal"
                                                                           data-target="#terms">terms and conditions</a></label>
                </div>
                @if ($errors->has('terms'))
                    <span class="help-block">
                                <strong>{{ $errors->first('terms') }}</strong>
                            </span>
                @endif
            </div>

            <div class="form-group  {{ $errors->has('18_years') ? ' has-error' : '' }}">
                <div class="checkbox">
                    <label><input type="checkbox" name="18_years"> I am 18 years of age or older</label>
                </div>
                @if ($errors->has('18_years'))
                    <span class="help-block">
                                <strong>{{ $errors->first('18_years') }}</strong>
                            </span>
                @endif
            </div>
            {{--<div class="form-group  {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                {!! Recaptcha::render(['lang'=> App::getLocale()])  !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
            </div>--}}

            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">
                    <i class="fa fa-save"></i> Create member
                </button>
            </div>
            {{--@captcha(App::getLocale())--}}
        </form>
    </div>

    <div id="terms" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    @include('terms_en')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
