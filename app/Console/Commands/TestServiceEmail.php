<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Service;
use App\Mail\ServiceNotificationMail;
use Illuminate\Support\Facades\Mail;

class TestServiceEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:service-email {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test service notification email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Email tidak valid!');
            return 1;
        }
        
        // Get first service or create a dummy one
        $service = Service::first();
        
        if (!$service) {
            $this->error('Tidak ada layanan di database. Silakan tambah layanan terlebih dahulu.');
            return 1;
        }
        
        try {
            $this->info("Mengirim email test ke: {$email}");
            
            Mail::to($email)->send(new ServiceNotificationMail($service, $email));
            
            $this->info('Email berhasil dikirim!');
            $this->info("Cek inbox {$email} untuk melihat email notifikasi.");
            
        } catch (\Exception $e) {
            $this->error('Gagal mengirim email: ' . $e->getMessage());
            return 1;
        }
        
        return 0;
    }
}
