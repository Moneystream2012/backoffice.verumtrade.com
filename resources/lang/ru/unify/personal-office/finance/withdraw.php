<?php

return [
    'title' => 'Снятие',
    'description' => 'Снятие остатков',
    'icon' => 'icon-monetization_on',

    'wallet_address' => 'Адрес бумажника',
    'txid' => 'Txid',
    'processed' => 'Обработано',

    'alert_info' => 'Заявка на снятие средств обрабатывается оператором до ' . config('mlm.withdraws.min_day') . ' рабочих дней.',
    'alert_danger' => 'Снятие запрещено без <a href="' . route('personal-office.verification.index') . '" class="btn-link"><strong>верификации аккаунта!</strong></a>',
    'error_msg' => 'Простите, только VMC адресныий вывод.',
    'success_msg' => 'Заявка на снятие отправлена.',
];
