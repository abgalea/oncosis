<?php

use App\Models\Patient;
use App\Models\InsuranceProvider;
use Illuminate\Database\Seeder;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen(storage_path('seed_data/pacientes.csv'), 'r')) !== FALSE)
        {
            $i = 0;
            while(($data = fgetcsv($handle, 0, ';', '"')) !== FALSE)
            {
                $i++;
                if ($i == 1)
                {
                    continue;
                }

                $insurance_provider_id = InsuranceProvider::orderByRaw('RAND()')->first()->id;

                $first_name = $last_name = '';

                $data[2] = trim($data[2]);
                $data[2] = str_replace(['.', '  '], ['', ' '], $data[2]);

                if (stristr($data[2], ',') === FALSE)
                {
                    $pos = stripos($data[2], ' ', 0);
                    if ($pos !== FALSE)
                    {
                        $data[2] = substr_replace($data[2], ',', $pos, 1);
                    }
                }

                $parts = explode(',', $data[2]);
                $first_name = end($parts);
                $last_name = reset($parts);

                $patient = [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'id_number' => (trim($data[3]) == '') ? '0' : trim($data[3]),
                    'date_of_birth' => trim($data[4]),
                    'insurance_id' => trim($data[11]),
                    'address' => trim($data[5]),
                    'city' => trim($data[6]),
                    'state' => 'Misiones',
                    'country' => 'Argentina',
                    'phone_number' => trim($data[7]),
                    'occupation' => trim($data[8]),
                    'is_active' => 1,
                    'antecedente_cantidad_tabaco' => (trim($data[18]) == '') ? null : (int)trim($data[18]),
                    'antecedente_tiempo_tabaco' => (trim($data[19]) == '') ? null : (int)trim($data[19]),
                    'antecedente_fumador_pasivo' => false,
                    'antecedente_cantidad_alcohol' => (trim($data[21]) == '') ? null : (int)trim($data[21]),
                    'antecedente_tiempo_alcohol' => (trim($data[22]) == '') ? null : (int)trim($data[22]),
                    'antecedente_drogas' => false,
                    'antecedente_menarca' => (trim($data[24]) == '') ? null : $data[24],
                    'antecedente_menospau' => (trim($data[25]) == '') ? null : $data[25],
                    'antecedente_aborto' => ((int)trim($data[28]) == 0) ? null : (int)$data[28],
                    'antecedente_embarazo' => ((int)trim($data[26]) == 0) ? null : (int)$data[26],
                    'antecedente_parto' => ((int)trim($data[27]) == 0) ? null : (int)$data[27],
                    'antecedente_lactancia' => (trim($data[29]) == '' OR trim($data[29]) == 'N') ? false : true,
                    'antecedente_anticonceptivos' => (trim($data[30]) == '' OR trim($data[30]) == 'N') ? false : true,
                    'antecedente_anticonceptivos_aplicacion' => NULL,
                    'antecedente_quirurgicos' => (trim($data[31]) == '') ? null : trim($data[31]),
                    'antecedente_familiar_oncologico' => (trim($data[32]) == '') ? null : trim($data[32]),
                    'c_cod' => (trim($data[0]) == '') ? null : trim($data[0])
                ];

                Patient::create($patient);
            }
        }
    }
}
