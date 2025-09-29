<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    const CURRENCY_EUR = 'eur';
    const CURRENCY_USD = 'usd';
    const CURRENCY_RUB = 'rub';

    const AVAILABLE_CURRENCIES = [
        self::CURRENCY_EUR,
        self::CURRENCY_USD,
        self::CURRENCY_RUB,
    ];

    protected $table = 'exchange_rates';

    protected $fillable = [
        'currency',
        'value',
    ];

    public static function getCurrencyForToday($currency)
    {
        return self::where('currency', $currency)
            ->whereDate('created_at', Carbon::today())
            ->first();
    }

}
