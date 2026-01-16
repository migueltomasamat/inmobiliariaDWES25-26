<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(["name"=>'Admin']);
        Role::create(['name' => 'Usuario']);
        Role::create(['name' => 'Propietario']);
        Role::create(['name' => 'Agente']);

        $admin = Role::findByName('Admin');
        $admin->givePermissionTo(Permission::all());

            /*[
            'ver inmueble',
            'crear inmueble',
            'modificar inmueble',
            'borrar inmueble',
            'ver perfil',
            'crear perfil',
            'modificar perfil',
            'borrar perfil',
            'ver propietario',
            'crear propietario',
            'modificar propietario',
            'borrar propietario',

        ]);*/

        $usuario = Role::findByName('Usuario');
        $usuario->givePermissionTo([
            'ver inmueble',
            'ver perfil',
            'crear propietario'
        ]);

        $usuario = Role::findByName('Propietario');
        $usuario->givePermissionTo([
            'ver inmueble',
            'crear inmueble',
            'editar inmueble',
            'borrar inmueble',
            'ver perfil',
            'crear perfil',
            'editar perfil',
            'borrar perfil',
            'ver propietario',
            'editar propietario',
            'borrar propietario',
            'ver usuario',
            'crear usuario',
            'editar usuario',
            'borrar usuario'
        ]);


        $usuario = Role::findByName('Agente');
        $usuario->givePermissionTo([
            'ver inmueble',
            'crear inmueble',
            'editar inmueble',
            'borrar inmueble',
            'ver perfil',
            'crear perfil',
            'editar perfil',
            'borrar perfil',
            'ver propietario',
            'crear propietario',
            'editar propietario',
            'borrar propietario',
            'ver usuario',
        ]);



    }
}
