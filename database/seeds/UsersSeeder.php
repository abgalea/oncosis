<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basicPermissions = [
            [
                'name' => 'can_access',
                'display_name' => 'Sólo Acceso',
                'description' => NULL
            ],
            [
                'name' => 'can_create',
                'display_name' => 'Acceder y Crear',
                'description' => NULL
            ],
            [
                'name' => 'can_manage',
                'display_name' => 'Acceder, Crear y Administrar',
                'description' => NULL
            ]
        ];

        $modules = [
            [
                'name' => 'users',
                'display_name' => 'Usuarios',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patients',
                'display_name' => 'Pacientes',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.background',
                'display_name' => 'Antecedentes',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.consultation',
                'display_name' => 'Consultas',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.pathology',
                'display_name' => 'Patología',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.location',
                'display_name' => 'Localización',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.physical',
                'display_name' => 'Físico',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.studies',
                'display_name' => 'Estudio',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.treatment',
                'display_name' => 'Tratamiento',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.relapse',
                'display_name' => 'Recaída',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.pending-payment',
                'display_name' => 'Pagos Pendientes',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'patient.clsoure',
                'display_name' => 'Cierre',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'protocols',
                'display_name' => 'Esquemas',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'practices',
                'display_name' => 'Prácticas',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'pathologies',
                'display_name' => 'Patologías',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'insurance_providers',
                'display_name' => 'Obras Sociales',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'providers',
                'display_name' => 'Instituciones',
                'permissions' => $basicPermissions
            ],
            [
                'name' => 'metrics',
                'display_name' => 'Métricas',
                'permissions' => $basicPermissions
            ]
        ];

        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador del Sistema',
            'description' => 'Administrador del Sistema, tiene todos los permisos'
            ]);

        $asistente = Role::create([
            'name' => 'asistente',
            'display_name' => 'Asistente',
            'description' => NULL
            ]);

        $enfermero = Role::create([
            'name' => 'enfermero',
            'display_name' => 'Enfermero',
            'description' => NULL
            ]);

        $secretaria = Role::create([
            'name' => 'secretaria',
            'display_name' => 'Secretaria',
            'description' => NULL
            ]);
        $visitante = Role::create([
            'name' => 'visitante',
            'display_name' => 'Visitante',
            'description' => NULL
            ]);

        foreach ($modules as $module)
        {
            foreach ($module['permissions'] as $permission)
            {
                Permission::create(['name' => $module['name'] . '-' . $permission['name'], 'display_name' => $permission['display_name'] . ' ' . $module['display_name']]);
            }
        }

        // User Admin
        factory(User::class, 1)->create([
            'first_name' => 'Abraham Andres',
            'last_name' => 'Galeano',
            'position' => 'Administrador',
            'username' => 'abraham',
            'email' => 'aagaleano@gmail.com',
            'password' => bcrypt('secret123'),
            'is_active' => 1,
            ])->attachRole($admin);

        // factory(User::class, 1)->create([
        //     'first_name' => 'Nora',
        //     'last_name' => 'Mohr de Krause',
        //     'position' => 'Administradora',
        //     'username' => 'nora',
        //     'email' => 'noramohr@gmail.com',
        //     'password' => bcrypt('secreto1234'),
        //     'is_active' => 1,
        //     ])->attachRole($admin);

        // factory(User::class, 1)->create([
        //     'first_name' => 'Roberto',
        //     'last_name' => 'Sens Hourcade',
        //     'position' => 'Administrador',
        //     'username' => 'roberto',
        //     'email' => 'robertosensh@gmail.com',
        //     'password' => bcrypt('secreto1234'),
        //     'is_active' => 1,
        //     ])->attachRole($admin);

        // factory(User::class, 50)->create();
    }
}
