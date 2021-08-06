<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);
        // Solicitudes
        Permission::create([
            'name' => 'web.solicitudes.index',
            'description' => 'Solicitudes'
        ])->syncRoles([$admin, $user]);

        Permission::create([
            'name' => 'web.solicitudes.create',
            'description' => 'Crear una Solicitud'
        ])->syncRoles([$admin, $user]);

        // Usuarios
        Permission::create([
            'name' => 'admin.users.index',
            'description' => 'Listado de Usuarios'
        ])->syncRoles([$admin, $user]);

        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Editar Usuario'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.users.update',
            'description' => 'Actualizar Usuario'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.users.destroy',
            'description' => 'Eliminar Usuario'
        ])->syncRoles([$admin]);


        // Roles
        Permission::create([
            'name' => 'admin.roles.index',
            'description' => 'Listar Roles'
        ])->syncRoles([$admin, $user]);

        Permission::create([
            'name' => 'admin.roles.create',
            'description' => 'Crear Rol'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.roles.edit',
            'description' => 'Editar Rol'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.roles.show',
            'description' => 'Ver Rol'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.roles.update',
            'description' => 'Actualizar Rol'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.roles.destroy',
            'description' => 'Eliminar Rol'
        ])->syncRoles([$admin]);

        // Permisos
        Permission::create([
            'name' => 'admin.permisos.index',
            'description' => 'Listar Roles'
        ])->syncRoles([$admin, $user]);

        Permission::create([
            'name' => 'admin.permisos.create',
            'description' => 'Crear Permiso'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.permisos.edit',
            'description' => 'Editar Permiso'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.permisos.show',
            'description' => 'Ver Permiso'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.permisos.update',
            'description' => 'Actualizar Permiso'
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.permisos.destroy',
            'description' => 'Eliminar Permiso'
        ])->syncRoles([$admin]);
    }
}
