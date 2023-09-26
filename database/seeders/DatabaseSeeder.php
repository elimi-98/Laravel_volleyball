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
         $usuario1= User::factory()->create([
           'name' => 'Eli',
           'email' => 'test@example.com',
           'password' => Hash::make(12345678),
         ]);

         User::factory(10)->create();
      
         $equipos = [];

        $nombresEquipos = ['WWOMAN', 'VICTORY', 'LOLAS', 'WEBER', 'PHANTERS', 'BEACHVOLLEY', 'YMCA'];
        $ciudadesEquipos = ['Barcelona', 'Paris', 'Cali', 'Sao Paulo', 'Liverpool', 'Florencia', 'Bogotá'];

        for ($i = 0; $i < 10; $i++) {
            $equipos[] = [
                'nombre' => $nombresEquipos[$i],
                'ciudad' => $ciudadesEquipos[$i],
                'jugadores' => 10,
                'division' => 1,
                'user_id' => $usuario1->id,
            ];
        }

        Equipo::insert($equipos);

    }
}
