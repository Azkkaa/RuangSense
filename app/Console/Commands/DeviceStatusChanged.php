<?php

namespace App\Console\Commands;

use App\Models\Device;
use Illuminate\Console\Command;
use App\Events\DeviceStatusChanged as DeviceStatus;

class DeviceStatusChanged extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'device:check-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cheking for device status';

    /**
     * Execute the console command.
     */
public function handle()
{
    $treshold = now()->subSeconds(15);

    $offlineDevice = Device::where('last_seen', '<', $treshold)
                        ->orWhereNull('last_seen')
                        ->get();

    if ($offlineDevice->isEmpty()) {
        $this->info("Semua perangkat terpantau normal (Online).");
    }

    foreach ($offlineDevice as $device) {
        broadcast(new DeviceStatus($device, false));
        $this->info("");
    }

    return Command::SUCCESS;
}
}
