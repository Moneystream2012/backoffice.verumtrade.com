@extends('layouts.personal-office')
@push('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script>
    $(".money").maskMoney({thousands: '', decimal: '.'});
</script>
@endpush
@section('page')
    <div class="container-fluid-md">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('personal-office/balance/withdraw.new_withdraw')</h3>
            </div>
            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="alert alert-info">
                    @lang('personal-office/balance/withdraw.request')
                </div>
                <div class="alert alert-no-border alert-warning">
                    <div class="row">
                        <div class="col-sm-3">
                            <strong>@lang('personal-office/balance/withdraw.tax')</strong> <br>
                            <p>{{$coefficient}}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>@lang('personal-office/balance/withdraw.min_amount')</strong> <br>
                            <p>@format_usd(50)</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{Form::open(['route'=> 'personal-office.balance.withdraw.post'])}}

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="amount" class="control-label">@lang('personal-office/balance/withdraw.amount') USD</label>
                            <input type="text" class="form-control money" placeholder="0.00" name="amount" autocomplete="off" required/>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="payment_method" class="control-label">@lang('personal-office/balance/withdraw.type')</label>
                            <select name="type_withdraw" class="form-control" required>
                                <option value="">@lang('personal-office/balance/withdraw.option')</option>
                                <option value="balance-btc">@lang('personal-office/balance/withdraw.balance') USD => BTC</option>
                                <option value="balance-vmc">@lang('personal-office/balance/withdraw.balance') USD => VMC</option>
                                <option value="mining_balance-btc">@lang('personal-office/balance/withdraw.balance') VMC => BTC</option>
                                <option value="mining_balance-vmc">@lang('personal-office/balance/withdraw.balance') VMC => VMC</option>
                                <option value="btc_balance-btc">@lang('personal-office/balance/withdraw.balance') BTC => BTC</option>
                                <option value="btc_balance-vmc">@lang('personal-office/balance/withdraw.balance') BTC => VMC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="wallet_address" class="control-label">@lang('personal-office/balance/withdraw.wallet_address')</label>
                            <input type="text" class="form-control" placeholder="@lang('wallet_address')" name="wallet_address"
                                   autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="transaction_password" class="control-label">@lang('personal-office/balance/withdraw.transaction_password')</label>
                            <input type="password" class="form-control" autocomplete="off" name="transaction_password"
                                   placeholder="******" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary"
                                {{Carbon\Carbon::now()->isMonday() ?: '_disabled'}} type="submit">@lang('personal-office/balance/withdraw.title')
                        </button>
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
                            <th>@lang('personal-office/balance/withdraw.title')</th>
                            <th>@lang('personal-office/balance/withdraw.amount')</th>
                            <th>@lang('personal-office/balance/withdraw.commission')</th>
                            <th>@lang('personal-office/balance/withdraw.wallet_address')</th>
                            <th>@lang('personal-office/balance/withdraw.txid')</th>
                            <th>@lang('personal-office/balance/withdraw.processing')</th>
                            <th>@lang('personal-office/balance/withdraw.creation')</th>
                            <th>@lang('personal-office/balance/withdraw.status')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>

                                <td>{{$item->from_method}} => {{$item->to_method}}</td>
                                <td>{{formatUSD($item->amount)}}</td>
                                <td>{{formatUSD($item->cost_amount)}}</td>

                                <td>
                                    <span style="font-size: 90%">
                                    {{$item->wallet_address}}
                                    </span>
                                </td>

                                <td>
                                    @if($item->tx)
                                        <a href="{{$item->link_tx}}" target="_blank"
                                           style="font-size: 90%">{{str_limit($item->tx, 10)}}</a>
                                    @else
                                        -
                                @endif
                                <td>
                                    @if($item->done_at)
                                        @format_date($item->done_at)
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    @format_date($item->created_at)
                                </td>
                                <td>
								<span
                                    class="label {{$item->status === 0 ? 'label-warning': ''}}  {{ $item->status === 1 ? 'label-success' : ''}}  {{$item->status === 2 ? 'label-danger': ''}} ">{{$item->status_text}}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <p class="text-center text-muted no-margin-bottom">@lang('personal-office.balance.withdraw.empty')</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
