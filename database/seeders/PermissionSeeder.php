<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'ver inmueble']);
        Permission::create(['name' => 'editar inmueble']);
        Permission::create(['name' => 'crear inmueble']);
        Permission::create(['name' => 'borrar inmueble']);

        Permission::create(['name' => 'ver perfil']);
        Permission::create(['name' => 'crear perfil']);
        Permission::create(['name' => 'editar perfil']);
        Permission::create(['name' => 'borrar perfil']);

        Permission::create(['name' => 'ver propietario']);
        Permission::create(['name' => 'crear propietario']);
        Permission::create(['name' => 'editar propietario']);
        Permission::create(['name' => 'borrar propietario']);

        Permission::create(['name' => 'ver usuario']);
        Permission::create(['name' => 'crear usuario']);
        Permission::create(['name' => 'editar usuario']);
        Permission::create(['name' => 'borrar usuario']);

        Permission::create(['name' => 'ver oferta']);
        Permission::create(['name' => 'crear oferta']);
        Permission::create(['name' => 'editar oferta']);
        Permission::create(['name' => 'borrar oferta']);
    }
}
