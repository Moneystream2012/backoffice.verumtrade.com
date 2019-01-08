@extends('unify.layouts.auth')
@section('page')
    <div class="panel-heading clearfix">
        <div class="pull-left">
            <i class="fa fa-lock"></i> @lang('unify/personal-office/auth/login.sign_in')
        </div>
        <div class="pull-right">
            <a href="{{ route('personal-office.register') }}">
                <i class="fa fa-plus-circle"></i> @lang('unify/personal-office/auth/login.sign_up')
            </a>
        </div>
    </div>
    <div class="panel-body">
        @include('flash::message')

        <form novalidate="novalidate" role="form" method="POST" accept-charset="UTF-8"
              action="{{ route('personal-office.login.post') }}">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('username_or_uid') ? ' has-error' : '' }}">
                <label for="username_or_uid">@lang('unify/personal-office/auth/login.id')</label>
                <input type="text" autocomplete="off" autofocus="autofocus" class="form-control" name="username_or_uid"
                       id="username_or_uid"
                       autocomplete="off"
                       placeholder="Your username or member id">
                @if ($errors->has('username_or_uid'))
                    <span class="help-block">
						<strong>{{ $errors->first('username_or_uid') }}</strong>
					</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">@lang('unify/personal-office/auth/login.password') </label>
                <input type="password" autocomplete="off" class="form-control" name="password" id="password"
                       placeholder="******">

                @if ($errors->has('password'))
                    <span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
                @endif
            </div>
            <div class="form-group clearfix">
                <div class="pull-left">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> @lang('unify/personal-office/auth/.login.remember_me')
                        </label>
                    </div>
                </div>
                <div class="pull-right" style="margin-top: 10px">
                    <a href="{{route('personal-office.password-reset')}}">@lang('unify/personal-office/auth/login.forgot_password')</a>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-sign-in"></i> @lang('unify/personal-office/auth/login.title')
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <a href="/sign_up" class="btn btn-block btn-default">
                            <i class="fa fa-user"></i> @lang('unify/personal-office/auth/login.create_account')
                        </a>
                    </div>

                    <div class="col-xs-6 hidden">

                        {{--<div class="btn-group btn-group-justified">--}}
                            {{--<a href="{{route('personal-office.login.social', ['vkontakte'])}}" class="btn btn-link"><i--}}
                                        {{--class="fa fa-vk"></i></a>--}}
                            {{--<a href="{{route('personal-office.login.social', ['facebook'])}}" class="btn btn-link"><i--}}
                                        {{--class="fa fa-facebook"></i></a>--}}
                            {{--<a href="{{route('personal-office.login.social', ['instagram'])}}" class="btn btn-link"><i--}}
                                        {{--class="fa fa-instagram"></i></a>--}}
                            {{--<a href="{{route('personal-office.login.social', ['twitter'])}}" class="btn btn-link"><i--}}
                                        {{--class="fa fa-twitter"></i></a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            {{--@captcha(App::getLocale())--}}

            <div class="form-group" style="margin-top: 50px !important;">
                <div class="col-xs-6" style="margin-left: 0 !important;">
                    <p><a href="//www.free-kassa.ru/"><img src="//www.free-kassa.ru/img/fk_btn/7.png"></a></p>
                </div>
                <div class="col-xs-6">
                    <p><a href="https://www.fkwallet.ru"><img src="https://www.fkwallet.ru/assets/2017/images/btns/icon_wallet12.png" title="Обмен криптовалют"></a></p>
                </div>
            </div>
        </form>
    </div>
@endsection
