<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metapop:MakeUserAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asigna el rol al administrador';


    public function __construct() {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email= $this->ask('Introducir el correo del usuario');
        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error('Usuario no encontrado');
            return;
        }
        $user->is_admin = true;
        $user->save();
        $this->info("El usuario $user->name ya es administrador");
    }
}
