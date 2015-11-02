<?php

use Illuminate\Database\Seeder;


use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $peliculas=Permission::create([
            'name' => 'Peliculas',
            'slug' => 'Peliculas',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Peliculas', // optional
        ]);

        $realizadores=Permission::create([
            'name' => 'Realizadores',
            'slug' => 'Realizadores',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Realizadores', // optional
        ]);

        $traficos=Permission::create([
            'name' => 'Traficos',
            'slug' => 'Traficos',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Traficos', // optional
        ]);

        //
        $funcion=Permission::create([
            'name' => 'Funciones',
            'slug' => 'funciones',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Funciones', // optional
        ]);

        $programa=Permission::create([
            'name' => 'Programas',
            'slug' => 'Programas',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Programas', // optional
        ]);

        $festivales=Permission::create([
            'name' => 'Festivales',
            'slug' => 'Festivales',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Festivales', // optional
        ]);

        $sedes=Permission::create([
            'name' => 'Sedes',
            'slug' => 'Sedes',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Sedes', // optional
        ]);

        $integrantes=Permission::create([
            'name' => 'Integrantes',
            'slug' => 'Integrantes',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Integrantes', // optional
        ]);

        $caracteristicas=Permission::create([
            'name' => 'Caracteristicas',
            'slug' => 'Caracteristicas',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Caracteristicas', // optional
        ]);

        $paquetes=Permission::create([
            'name' => 'Paquetes',
            'slug' => 'Paquetes',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Paquetes', // optional
        ]);

        $patrocinadores=Permission::create([
            'name' => 'Patrocinadores',
            'slug' => 'Patrocinadores',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Patrocinadores', // optional
        ]);

        $reportes=Permission::create([
            'name' => 'Reportes',
            'slug' => 'Reportes',
            'description' => 'Agregar,Modificar,Consultar,Exportar,Eliminar Reportes', // optional
        ]);


        $roleAdministrador = Role::find(1);
        $roleEjectivo = Role::find(2);

        $roleAdministrador->attachPermission($peliculas);
        $roleAdministrador->attachPermission($realizadores);
        $roleAdministrador->attachPermission($traficos);


        $roleAdministrador->attachPermission($funcion);
        $roleAdministrador->attachPermission($programa);
        $roleAdministrador->attachPermission($festivales);
        $roleAdministrador->attachPermission($sedes);
        $roleAdministrador->attachPermission($integrantes);

        $roleAdministrador->attachPermission($caracteristicas);
        $roleAdministrador->attachPermission($paquetes);
        $roleAdministrador->attachPermission($patrocinadores);

        $roleAdministrador->attachPermission($reportes);

        $roleEjectivo->attachPermission($reportes);



    }
}
