<?php

use App\User;
use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rol= Role::create([
            'name' => 'Administrador',
            'slug' => 'Administrador',
            'description' => 'Rol que tiene todos los permisos']);

        $rol2= Role::create([
            'name' => 'Ejecutivo',
            'slug' => 'Ejecutivo',
            'description' => 'Acceso solo a la vista de reportes']);

        $user1 = User::find(1);
        $user2 = User::find(2);
        $user3 = User::find(3);
        //El cuarto es solo de ejemplo para probar el otro rol y los permismos
        $user4 = User::find(4);

        $user1->attachRole($rol->id);
        $user2->attachRole($rol->id);
        $user3->attachRole($rol->id);
        $user4->attachRole($rol2->id);

    }
}
