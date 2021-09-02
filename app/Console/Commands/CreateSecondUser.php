<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateSecondUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:createSecond';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a second user for sample';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = 'demo1';
        $email = 'demo1@demo.com';
        $password = 'demo';
        $user = User::forceCreate(['name'=> $name,'email' => $email, 'password' => \Hash::make($password)]);
        $this->info("Created new user #{$user->id}");;
    }
}
