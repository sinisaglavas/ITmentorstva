<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $table = 'exchange_rates';

    protected $fillable = [
        'currency',
        'value',
    ];

    public static function getCurrencyForToday($currency)
    {
        return ExchangeRate::where('currency', $currency)
            ->whereDate('created_at', Carbon::today())
            ->first();
    }

}
