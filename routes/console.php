<?php

use App\Jobs\SendPaymentReminderEmail;
use App\Models\Pemesanan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('send:payment-reminders', function () {
    $unpaidOrders = Pemesanan::where('status', 'Unpaid')
        // ->where('created_at', '<=', now()->subHours(2))
        ->get();

    foreach ($unpaidOrders as $order) {
        SendPaymentReminderEmail::dispatch($order);
    }
})->everyMinute();
