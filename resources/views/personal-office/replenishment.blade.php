@extends('layouts.personal-office')
@push('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script>
        $( document ).ready(function() {
            $(".money").maskMoney({thousands: '', decimal: '.'});
            $("#replenishment_balance").on('change', function () {
                var currency = this.value.split('_')[0];
                $('#amount_currency').text(currency.toUpperCase());
                if (currency == 'btc') {
                    $(".money").maskMoney({thousands: '', decimal: '.', precision: 4}).attr('placeholder', '0.0000');
                } else {
                    $(".money").maskMoney({thousands: '', decimal: '.', precision: 2}).attr('placeholder', '0.00');
                }
            });

            $("#replenishment_method").on('change', function () {
                if ( this.value == 'advcash' ||  this.value == 'perfect_money' ||  this.value == 'verumcoin') {
                    $("#replenishment_balance option").each(function () {
                        if (this.value == 'usd_mining_balance') {
                            $(this).prop('selected', true);
                            $(this).change();
                            return;
                        }
                        $(this).prop('disabled', 'disabled');
                    });
                }else{
                    $("#replenishment_balance option").each(function () {
                        $(this).removeAttr('disabled')
                    });
                }
            });
        });
    </script>
@endpush
@section('page')
    <div class="container-fluid-md">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('personal-office.replenishment.new_replenishment')</h3>
            </div>

            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="alert alert-no-border alert-warning">

                    {{--<div class="row">--}}
                        {{--<div class="col-sm-12 hidden">--}}
                            {{--<div class="pull-left margin-lg-bottom">--}}
                                {{--<strong>PAYVMC Address:</strong> <br>--}}
                                {{--<span style="color: #357ebd;"><a--}}
                                        {{--href="verumcoin:1BsUVzLKEEACx2vRtu8iPAvUHUVUnJMqAY?amount=100">{{$auth->address}}</a></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="row">
                        <div class="col-sm-3">
                            <strong>@lang('personal-office.replenishment.min_value')</strong> <br>
                            <span id="min">{{$min}}</span>
                        </div>
                        <div class="col-sm-3">
                            <strong>@lang('personal-office.replenishment.tax') </strong> <br>
                            <span id="percent">{{$coefficient}}</span>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    {{Form::open(['route'=> 'personal-office.replenishment.post'])}}

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="amount" class="control-label">@lang('personal-office.replenishment.amount') <span id="amount_currency"></span></label>
                            <input type="text" class="form-control money" placeholder="0.00" name="amount" required autocomplete="off"/>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="replenishment_method" class="control-label">@lang('personal-office.replenishment.replenishment_method')</label>
                            <select name="replenishment_method" id="replenishment_method" class="form-control" required>
                                <option value="">@lang('personal-office.replenishment.select_option')</option>
                                <option value="bitcoin">@lang('personal-office.replenishment.bitcoin')</option>
                                <option value="perfect_money">@lang('personal-office.replenishment.perfect_money')</option>
                                <option value="free_kassa">@lang('personal-office.replenishment.free_kassa')</option>
                                {{--<option value="yandex-money">Yandex Money (Visa/MasterCard)</option>--}}
                                {{--<option value="verumcoin">Verumcoin</option>--}}
                                {{--<option value="advcash">AdvCash</option>--}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="replenishment_method" class="control-label">@lang('personal-office.replenishment.type_balance')</label>
                            <select name="replenishment_balance" class="form-control" id="replenishment_balance" required>
                                <option value="">@lang('personal-office.replenishment.select_option')</option>
                                <option value="usd_balance">@lang('personal-office.replenishment.balance') USD</option>
                                <option value="usd_mining_balance">@lang('personal-office.replenishment.balance') VMC</option>
                                <option value="btc_balance">@lang('personal-office.replenishment.balance') BTC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit">@lang('personal-office.replenishment.title')</button>
                    </div>

                    {{Form::close()}}
                </div>

            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('personal-office.replenishment.title')</th>
                            <th>@lang('personal-office.replenishment.amount')</th>
                            <th>@lang('personal-office.replenishment.commission')</th>
                            <th>@lang('personal-office.replenishment.currency')</th>
                            <th>@lang('personal-office.replenishment.status')</th>
                            <th>@lang('personal-office.replenishment.date')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>
                                    <a href="{{$item->payment_url}}" target="_blank">{{$item->id}}</a>
                                </td>
                                <td>{{$item->method}} => {{$item->to}}</td>
                                <td>{{$item->amount_format}}</td>
                                <td>{{$item->cost_amount_format}}</td>
                                <td>{{$item->currency}}</td>
                                <td>{{$item->status}}</td>
                                <td><a href="javascript:;" data-toggle="tooltip" data-placement="top"
                                       data-original-title="{{$item->created_at->format('d/m/Y H:i:s')}}">{{$item->created_at->format('d/m/Y')}}</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <p class="text-center text-muted no-margin-bottom">@lang('personal-office.replenishment.empty')</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
