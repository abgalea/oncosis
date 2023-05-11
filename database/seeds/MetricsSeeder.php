<?php

use Illuminate\Database\Seeder;

class MetricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metrics = [
            'Peso',
            'Altura',
            'Talla',
            'Toxicidad'
            ];

        foreach($metrics as $metric)
        {
            factory(App\Models\Metric::class, 1)->create([
                'name' => $metric,
                'is_active' => 1,
                ]);
        }
    }
}
