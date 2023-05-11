<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Tables to truncate
     * @var array
     */
    protected $tables = [
        'protocols',
        'payments',
        'orders',
        'patient_metrics',
        'metrics',
        'pathology_locations',
        'patient_treatments',
        'treatments',
        'patients',
        'practices',
        'pathologies',
        'insurance_providers',
        'providers',
        'permission_role',
        'role_user',
        'permissions',
        'roles',
        'users'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->cleanDatabase();
        $this->call(UsersSeeder::class);

        Model::reguard();
        // $this->call(ProvidersSeeder::class);
        // $this->call(InsuranceProvidersSeeder::class);
        // $this->call(PathologiesSeeder::class);
        // $this->call(PracticesSeeder::class);
        // $this->call(PatientsSeeder::class);
        // $this->call(TreatmentsSeeder::class);
        // $this->call(MetricsSeeder::class);
        // $this->call(ProtocolsSeeder::class);
    }

    /**
     * Cleans database
     * @return void
     */
    public function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
