@extends('layouts.personal-office')
@section('page')
    <div class="container-fluid-md">

        <div class="panel panel-default hidden">
            <div class="panel-heading">
                <p class="panel-title">@lang('personal-office/settings.payment_settings')</p>
            </div>
            <div class="panel-body">
                <p class="alert alert-info">@lang('personal-office/settings.text')</p>
                <form class="form-horizontal form-bordered" role="form"
                      action="{{route('personal-office.settings.payment.post')}}"
                      method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('perfectmoney') ? ' has-error' : '' }}">
                        <label for="input_perfectmoney" class="col-sm-4 control-label">@lang('personal-office/settings.perfectmoney')</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="perfectmoney" id="input_perfectmoney"
                                   value="{{$auth->getSetting('perfectmoney', old('perfectmoney'))}}"
                                   placeholder="U1234567"
                                   autocomplete="off" {{$auth->hasSetting('perfectmoney') ? 'disabled' : '' }}>
                            @if ($errors->has('perfectmoney'))
                                <p class="help-block">{{ $errors->first('perfectmoney') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('advcash') ? ' has-error' : '' }}">
                        <label for="input_advcash" class="col-sm-4 control-label">@lang('personal-office/settings.advcash')</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="advcash" id="input_advcash"
                                   value="{{$auth->getSetting('advcash', old('advcash'))}}"
                                   placeholder="U 1234 1234 1234"
                                   autocomplete="off" {{$auth->hasSetting('advcash') ? 'disabled' : '' }}>
                            @if ($errors->has('advcash'))
                                <p class="help-block">{{ $errors->first('advcash') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group no-margin-bottom">
                        <div class="col-sm-push-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">@lang('personal-office/settings.submit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="panel-title">@lang('personal-office/settings.password')</p>
            </div>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" role="form"
                      action="{{route('personal-office.settings.password.post')}}"
                      method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label col-sm-4">@lang('personal-office/settings.current_password')</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="******" autocomplete="off">
                            @if ($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                        <label for="new_password" class="control-label col-sm-4">@lang('personal-office/settings.new_password')</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="new_password" id="new_password"
                                   placeholder="******" autocomplete="off">
                            @if ($errors->has('new_password'))
                                <span class="help-block">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                        <label for="new_password_confirmation" class="control-label col-sm-4">@lang('personal-office/settings.confirmation')</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="new_password_confirmation"
                                   id="new_password_confirmation"
                                   placeholder="******" autocomplete="off">
                            @if ($errors->has('new_password_confirmation'))
                                <span class="help-block">{{ $errors->first('new_password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group no-margin-bottom">
                        <div class="col-sm-push-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">@lang('personal-office/settings.submit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="panel-title">@lang('personal-office/settings.transaction_password')</p>
            </div>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" role="form"
                      action="{{route('personal-office.settings.transaction_password.post')}}"
                      method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('transaction_password') ? ' has-error' : '' }}">
                        <label for="transaction_password" class="control-label col-sm-4">@lang('personal-office/settings.current_password')</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="transaction_password"
                                   id="transaction_password"
                                   placeholder="******" autocomplete="off">
                            @if ($errors->has('transaction_password'))
                                <span class="help-block">{{ $errors->first('transaction_password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('new_transaction_password') ? ' has-error' : '' }}">
                        <label for="new_transaction_password" class="control-label col-sm-4">@lang('personal-office/settings.new_password')</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="new_transaction_password"
                                   id="new_transaction_password"
                                   placeholder="******" autocomplete="off">
                            @if ($errors->has('new_transaction_password'))
                                <span class="help-block">{{ $errors->first('new_transaction_password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div
                        class="form-group {{ $errors->has('new_transaction_password_confirmation') ? ' has-error' : '' }}">
                        <label for="new_transaction_password_confirmation" class="control-label col-sm-4">@lang('personal-office/settings.confirmation')</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="new_transaction_password_confirmation"
                                   id="new_transaction_password_confirmation"
                                   placeholder="******" autocomplete="off">
                            @if ($errors->has('new_transaction_password_confirmation'))
                                <span
                                    class="help-block">{{ $errors->first('new_transaction_password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group no-margin-bottom">
                        <div class="col-sm-push-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">@lang('personal-office/settings.submit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="panel-title">@lang('personal-office/settings.title')</p>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-4">@lang('personal-office/settings.languages')</label>
                    <div class="col-sm-8">
                        <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="form-control">
                            <option value="?lang=en" @if(Lang::getLocale() == 'en') selected @else @endif>@lang('app.languages.en')</option>
                            <option value="?lang=ru" @if(Lang::getLocale() == 'ru') selected @else @endif>@lang('app.languages.ru')</option>
                        </select>
                    </div>
                </div>

            </div>

        </div>
@endsection
