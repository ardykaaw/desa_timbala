<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearServicesCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'services:clear-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear services cache to ensure fresh data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Clearing services cache...');
        
        // Clear specific cache keys
        Cache::forget('services_list');
        Cache::forget('active_services');
        
        // Clear all cache
        Cache::flush();
        
        $this->info('Services cache cleared successfully!');
        
        return 0;
    }
}
