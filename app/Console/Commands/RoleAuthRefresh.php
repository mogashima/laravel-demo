<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class RoleAuthRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:role-auth-refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the database role and auth relationships.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('db:seed --class=AuthCodeSeeder');
        Artisan::call('db:seed --class=RoleAuthRelationSeeder');

    }
}
