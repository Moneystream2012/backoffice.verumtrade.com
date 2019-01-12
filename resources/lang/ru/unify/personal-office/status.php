<?php

return [
    'deposit' => [
        0 => 'финальный',
        1 => 'активный',
    ],
    'withdraw' => [
        \App\Withdraw::STATUS_PROCESSING => 'обработка',
        \App\Withdraw::STATUS_SUCCESS => 'успех',
        \App\Withdraw::STATUS_REJECTION => 'отказ',
    ],
    'verification' => [
        \App\Verification::NOT_VERIFIED => 'не проверенный',
        \App\Verification::PROCESSING => 'обработка',
        \App\Verification::VERIFIED => 'проверенный',
    ],
    'trading' => [
        \App\Trading::ACTIVE => 'активный',
        \App\Trading::FINAL => 'финальный',
        \App\Trading::REFUND => 'возврат',
    ],
];
