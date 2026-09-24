<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;

class TestMail extends Command
{
    protected $signature = 'test:mail {email}';
    protected $description = 'Test mail functionality by sending an OTP email';

    public function handle()
    {
        $email = $this->argument('email');
        $otp = rand(100000, 999999);
        
        try {
            $this->info("Sending test OTP email to: {$email}");
            $this->info("OTP Code: {$otp}");
            
            Mail::to($email)->send(new SendOtpMail($otp));
            
            $this->info('✅ Email sent successfully!');
            $this->info("Check your email inbox for the OTP: {$otp}");
            
        } catch (\Exception $e) {
            $this->error('❌ Failed to send email: ' . $e->getMessage());
            $this->error('Stack trace: ' . $e->getTraceAsString());
        }
    }
}