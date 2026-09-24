<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class FixUserRoles extends Command
{
    protected $signature = 'fix:user-roles';
    protected $description = 'Fix users who do not have roles assigned';

    public function handle()
    {
        $usersWithoutRoles = User::whereNull('role')->orWhere('role', '')->get();
        
        if ($usersWithoutRoles->count() === 0) {
            $this->info('✅ All users already have roles assigned.');
            return;
        }

        $this->info("Found {$usersWithoutRoles->count()} users without roles.");
        
        foreach ($usersWithoutRoles as $user) {
            $user->role = 'user';
            $user->save();
            $this->line("Fixed user: {$user->name} ({$user->email})");
        }

        $this->info('✅ All users now have roles assigned.');
    }
}