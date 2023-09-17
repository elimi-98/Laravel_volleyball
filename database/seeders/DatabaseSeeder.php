<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Equipo;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
           'name' => 'Eli',
           'email' => 'test@example.com',
           'password' => Hash::make(12345678),
         ]);

         User::factory(10)->create()->each(function ($usuario) {
          $usuario->equipos()->save(Equipo::factory()->make());
      });
  

         \App\Models\Equipo::factory(5)->create();

    }
}
