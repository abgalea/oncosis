<?php

use Illuminate\Database\Seeder;

class ProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Provider::class, 1)->create([
            'short_name' => 'ACSM',
            'name' => 'Asociación de Clínicas y Sanatorios de Misiones',
            'is_active' => 1,
            ]);

        factory(App\Models\Provider::class, 1)->create([
            'short_name' => 'CAMIONEROS',
            'name' => 'Asociación de Camioneros',
            'is_active' => 1,
            ]);

        factory(App\Models\Provider::class, 1)->create([
            'short_name' => 'CMMZS',
            'name' => 'Círculo Médico de Misiones Zona Sur',
            'is_active' => 1,
            ]);

        factory(App\Models\Provider::class, 1)->create([
            'short_name' => 'CUIDARSALUD',
            'name' => 'Cuidar Salud',
            'is_active' => 1,
            ]);

        factory(App\Models\Provider::class, 1)->create([
            'short_name' => 'FMM',
            'name' => 'Federación Médica de Misiones',
            'is_active' => 1,
            ]);

        factory(App\Models\Provider::class, 1)->create([
            'short_name' => 'OSECAC',
            'name' => 'O.S.E.C.A.C.',
            'is_active' => 1,
            ]);

        factory(App\Models\Provider::class, 1)->create([
            'short_name' => 'OSPRERA',
            'name' => 'O.S.P.R.E.R.A.',
            'is_active' => 1,
            ]);

        factory(App\Models\Provider::class, 1)->create([
            'short_name' => 'BORATTI',
            'name' => 'Sanatorio Boratti S.R.L.',
            'is_active' => 1,
            ]);
    }
}
