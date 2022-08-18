<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateOrganizationUser extends Command
{

    protected $signature = 'create:organization-user {name} {email} {cpf} {password}';


    protected $description = 'Cria novo usuário para a organização';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $name= $this->argument('name');
        $email = $this->argument('email');
        $cpf = $this->argument('cpf');
        $password = $this->argument('password');


        // $this->info($name);
        // $this->info($email);
        // $this->info($cpf);
        // $this->info($password);

        User::create([
            'name'=>$name,
            'email'=>$email,
            'cpf'=>$cpf,
            'password'=>$password,
            'role'=> 'organization'
        ]);

        $this->info('Usuároi criado com sucesso');
    }
}
