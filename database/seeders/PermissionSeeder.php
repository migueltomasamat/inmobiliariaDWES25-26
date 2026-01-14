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
        Permission::create(['name' => 'ver innmueble']);
        Permission::create(['name' => 'editar innmueble']);
        Permission::create(['name' => 'crear innmueble']);
        Permission::create(['name' => 'borrar innmueble']);

        Permission::create(['name' => 'ver perfil']);
        Permission::create(['name' => 'crear perfil']);
        Permission::create(['name' => 'modificar perfil']);
        Permission::create(['name' => 'borrar perfil']);

        Permission::create(['name' => 'ver propietario']);
        Permission::create(['name' => 'crear propietario']);
        Permission::create(['name' => 'modificar propietario']);
        Permission::create(['name' => 'borrar propietario']);

        Permission::create(['name' => 'ver usuario']);
        Permission::create(['name' => 'crear usuario']);
        Permission::create(['name' => 'modificar usuario']);
        Permission::create(['name' => 'borrar usuario']);

        Permission::create(['name' => 'ver oferta']);
        Permission::create(['name' => 'crear oferta']);
        Permission::create(['name' => 'modificar oferta']);
        Permission::create(['name' => 'borrar oferta']);
    }
}
