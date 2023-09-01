<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemindMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remind-members';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind members to book a call';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $members =User::where('role','member')->whereDoesntHave('bookings',function ($query){
            
        })
        //
    }
}
