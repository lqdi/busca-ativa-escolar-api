<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\User;
use Illuminate\Console\Command;

class RegisterSuperUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:register_superuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registers a superuser';

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
     * @return mixed
     */
    public function handle()
    {

	    $name = $this->ask("Enter a name for the user:", "Engineering LQDI");
	    $email = $this->ask("Enter an email for the user:", "dev@lqdi.net");
	    $password = $this->ask("Enter a password for the user:", "demo");

	    $user = User::register([
	    	'name' => $name,
		    'email' => $email,
		    'password' => $password,

		    'type' => User::TYPE_SUPERUSER,
		    'tenant_id' => null,
		    'city_id' => null
	    ]);

	    $this->info("User created! ID: {$user->id}");

    }
}
