<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(1)->create([
            'name' => 'Luiz Cavalcanti',
            'email' => 'luizcdc@ufba.br',
            'email_verified_at' => now(),
            'remember_token' => null,
            'is_admin' => true,
        ]);
        User::factory(10)->create();
        User::factory(10)->create(
            [
                'remember_token' => null,
                'email_verified_at' => null,
            ]
        );
        User::factory(80)->create(
            [
                'remember_token' => null,
            ]
        );
    }
}
