<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CheckUsers extends Command
{
    protected $signature = 'check:users';
    protected $description = 'Check all users and their verification status';

    public function handle()
    {
        $users = User::all();
        
        if ($users->isEmpty()) {
            $this->info('No users found in database.');
            return;
        }
        
        $this->info('Users in database:');
        $this->line('ID | Name | Email | Verified | Role');
        $this->line('---|------|-------|----------|-----');
        
        foreach ($users as $user) {
            $verified = $user->email_verified_at ? 'Yes' : 'No';
            $this->line("{$user->id} | {$user->name} | {$user->email} | {$verified} | {$user->role}");
        }
    }
}