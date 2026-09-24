<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class VerifyUser extends Command
{
    protected $signature = 'verify:user {email}';
    protected $description = 'Manually verify a user by email';

    public function handle()
    {
        $email = $this->argument('email');
        
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            $this->error("User with email {$email} not found.");
            return;
        }
        
        $user->email_verified_at = now();
        $user->save();
        
        $this->info("User {$user->name} ({$user->email}) has been verified successfully!");
    }
}