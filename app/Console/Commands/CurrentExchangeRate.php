<?php

namespace App\Console\Commands;

use App\Models\ExchangeRate;
use Carbon\Carbon;
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
    protected $signature = 'app:current-exchange-rate';

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
        foreach (ExchangeRate::AVAILABLE_CURRENCIES as $currency)
        {
            $response = Http::get('https://kurs.resenje.org/api/v1/currencies/'.$currency.'/rates/today');
            $jsonResponse = $response->json();

            if (isset($jsonResponse['error']))
            {
                $this->output->error($jsonResponse['error']['message']);
                return;
            }

            $lastUpdate = ExchangeRate::getCurrencyForToday($currency);
            if ($lastUpdate !== null)
            {
                continue;
            }

            $value = $response->json()['exchange_middle'];
            ExchangeRate::create([
                'currency' => $currency,
                'value' => $value,
            ]);

        }
        $this->output->comment('All currencies are entered into the database!');
    }
}
