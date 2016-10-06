<?php

use Delivery\Entities\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Winston Hanun Júnior',
            'email' => 'hanunjunior@gmail.com',
            'password' => bcrypt('Linux1009'),
            'role' => 'admin',
            'remember_token' => str_random(10),
        ]);

        factory(User::class)->create([
            'name' => 'Entregador',
            'email' => 'entregador@entregador.com',
            'password' => bcrypt('Linux1009'),
            'role' => 'entregador',
            'remember_token' => str_random(10),
        ]);

        factory(User::class)->create([
            'name' => 'Usuario',
            'email' => 'user@user.com',
            'password' => bcrypt('Linux1009'),
            'role' => 'cliente',
            'remember_token' => str_random(10),
        ]);
    }
}
