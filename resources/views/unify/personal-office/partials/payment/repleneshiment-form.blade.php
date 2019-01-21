<form id="replenishment_in_layout" action="https://backoffice.verumtrade.com/personal-office/replenishment/layout" method="post">
    {{ csrf_field() }}
    <div class="replenish">
        <div class="replenish_title">
            @lang('personal-office/replenishment.balance_replenish')
        </div>

        <div class="summ">
            @lang('personal-office/replenishment.amount')
            <label>
                <input type="text" class="" placeholder="0.00" name="replenishment_amount" required autocomplete="off"/>
                <span>USD</span>
            </label>
        </div>

        <div class="method">
            <label for="replenishment_method" class="control-label">@lang('personal-office/replenishment.replenishment_method')</label>
            <select name="replenishment_method" id="replenishment_method" required>
                <option value="">@lang('personal-office/replenishment.select_option')</option>
                <option value="bitcoin">@lang('personal-office/replenishment.bitcoin')</option>
                <option value="perfect_money">@lang('personal-office/replenishment.perfect_money')</option>
                <option value="free_kassa">@lang('personal-office/replenishment.free_kassa')</option>
            </select>
        </div>

        <button class="btn btn_green" type="submit">
            @lang('personal-office/replenishment.title')
        </button>

    </div>
</form>