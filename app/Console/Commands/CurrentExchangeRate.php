<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class CurrentExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:current-exchange-rate {currency=USD}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command calls the api and gets the current euro and dollar exchange rate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currency = 'EUR';
        //$currency = $this->argument('currency');
        $response = Http::get('https://kurs.resenje.org/api/v1/currencies/'.$currency.'/rates/today');
        dd($response->json()['exchange_middle']);

    }
}
