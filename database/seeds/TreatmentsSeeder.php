<?php

use Illuminate\Database\Seeder;

class TreatmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Treatment::class, 1)->create([
            'short_code' => 'I',
            'description' => 'Consulta',
            'fee' => 0,
            'is_active' => 1,
            ]);

        factory(App\Models\Treatment::class, 1)->create([
            'short_code' => 'II',
            'description' => 'Consulta Primera Vez',
            'fee' => 0,
            'is_active' => 1,
            ]);

        factory(App\Models\Treatment::class, 1)->create([
            'short_code' => 'III',
            'description' => 'Tratamiento de Hormonoterapia',
            'fee' => 0,
            'is_active' => 1,
            ]);

        factory(App\Models\Treatment::class, 1)->create([
            'short_code' => 'IV',
            'description' => 'Inmunoterapia y Quimioterapia de Baja Complejidad',
            'fee' => 0,
            'is_active' => 1,
            ]);

        factory(App\Models\Treatment::class, 1)->create([
            'short_code' => 'V',
            'description' => 'Inmunoterapia y Quimioterapia de Mediana Complejidad',
            'fee' => 0,
            'is_active' => 1,
            ]);

        factory(App\Models\Treatment::class, 1)->create([
            'short_code' => 'VI',
            'description' => 'Inmunoterapia y Quimioterapia de Alta Complejidad',
            'fee' => 0,
            'is_active' => 1,
            ]);

        factory(App\Models\Treatment::class, 1)->create([
            'short_code' => 'VII',
            'description' => '',
            'fee' => 0,
            'is_active' => 1,
            ]);
    }
}
