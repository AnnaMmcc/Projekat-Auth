<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = $this->command->getOutput()->ask("Unesite Vase ime");

        if($name === null)
        {
            $this->command->getOutput()->error("Niste uneli ime");
            return;
        }


       $email = $this->command->getOutput()->ask("Unesite Vas email");

        if($email === null)
        {
            $this->command->getOutput()->error("Niste uneli email");
            return;
        }
        $email = User::where(['email' => $email])->first();
       if($email instanceof User)
       {
           $this->command->getOutput()->error("Vec postoji korisnik sa ovom email adresom");
           return;
       }
       $password = $this->command->getOutput()->ask("Unesite Vasu sifru");

       User::create([
           'name' => $name,
           'email' => $email,
           'password' => Hash::make($password)
       ]);
    }
}
