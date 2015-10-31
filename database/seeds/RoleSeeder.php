<?php

use App\User;
use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;


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
        //
        Role::create([
            'name' => 'Funciones',
            'slug' => 'funciones',
            'description' => 'Agregar,Modificar,Eliminar Funciones']);

        $user = User::find(1);
        $rolFuncion = Role::where('name','=','Funciones')->get();

        $user->attachRole($rolFuncion[0]->id);

    }


}
