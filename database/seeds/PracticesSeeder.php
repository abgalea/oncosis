<?php

use App\Models\Practice;
use Illuminate\Database\Seeder;

class PracticesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'short_code' => 10101,
                'description' => 'GLUCEMIA',
                'fee' => 12.55,
            ],
            [
                'short_code' => 10102,
                'description' => 'CREATININA',
                'fee' => 20.15
            ],
            [
                'short_code' => 70720,
                'description' => 'QUIMIOTERPIA SIMPLE',
                'fee' => 48.00
            ],
            [
                'short_code' => 10101,
                'description' => 'PRACT MEDICUS',
                'fee' => 10.00,
            ],
            [
                'short_code' => 420101,
                'description' => 'CONSULTA',
                'fee' => 10.00
            ],
            [
                'short_code' => 230302,
                'description' => 'QUIMIOTERPIA SIMPLE',
                'fee' => 80.00
            ],
            [
                'short_code' => 230303,
                'description' => 'QUIMIOTERPIA COMPLEJA',
                'fee' => 110.00
            ],
            [
                'short_code' => 230301,
                'description' => 'VALORAC. ONCOG. INICIAL',
                'fee' => 25.00
            ],
            [
                'short_code' => 420101,
                'description' => 'CONSULTA ONCOLOGICA',
                'fee' => 7.50
            ],
            [
                'short_code' => 70730,
                'description' => 'QUIMIOTERPIA COMPLEJA',
                'fee' => 98.00
            ],
            [
                'short_code' => 420101,
                'description' => 'CONSULTA ONCOLOGICA',
                'fee' => 9.00
            ]
        ];

        foreach($items as $item)
        {
            Practice::create($item);
        }
    }
}
