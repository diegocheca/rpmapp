<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin\Category;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Roles
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);

        # Categorias
        Category::created([
            'id' => 1,
            'name' => 'admin',
            'description' => 'Roles y Permisos'
        ]);
        Category::created([
            'id' => 2,
            'name' => 'rpm',
            'description' => 'RPM'
        ]);
        Category::created([
            'id' => 3,
            'name' => 'formweb',
            'description' => 'Formularios Web'
        ]);
        Category::created([
            'id' => 4,
            'name' => 'web',
            'description' => 'Otras Catergorias Web'
        ]);
        Category::created([
            'id' => 5,
            'name' => 'teams',
            'description' => 'Categoria de teams'
        ]);

        # Permisos
        // Solicitudes
        Permission::create([
            'name' => 'web.solicitudes.index',
            'description' => 'Solicitudes',
            'category_id' => 3
        ])->syncRoles([$admin, $user]);

        Permission::create([
            'name' => 'web.solicitudes.create',
            'description' => 'Crear una Solicitud',
            'category_id' => 3
        ])->syncRoles([$admin, $user]);

        // Usuarios
        Permission::create([
            'name' => 'admin.users.index',
            'description' => 'Listado de Usuarios',
            'category_id' => 4
        ])->syncRoles([$admin, $user]);

        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Editar Usuario',
            'category_id' => 4
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.users.update',
            'description' => 'Actualizar Usuario',
            'category_id' => 4
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.users.destroy',
            'description' => 'Eliminar Usuario',
            'category_id' => 4
        ])->syncRoles([$admin]);


        // Roles
        Permission::create([
            'name' => 'admin.roles.index',
            'description' => 'Listar Roles',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);

        Permission::create([
            'name' => 'admin.roles.create',
            'description' => 'Crear Rol',
            'category_id' => 1
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.roles.edit',
            'description' => 'Editar Rol',
            'category_id' => 1
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.roles.show',
            'description' => 'Ver Rol',
            'category_id' => 1
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.roles.update',
            'description' => 'Actualizar Rol',
            'category_id' => 1
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.roles.destroy',
            'description' => 'Eliminar Rol',
            'category_id' => 1
        ])->syncRoles([$admin]);

        // Permisos
        Permission::create([
            'name' => 'admin.permisos.index',
            'description' => 'Listar Roles',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);

        Permission::create([
            'name' => 'admin.permisos.create',
            'description' => 'Crear Permiso',
            'category_id' => 1
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.permisos.edit',
            'description' => 'Editar Permiso',
            'category_id' => 1
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.permisos.show',
            'description' => 'Ver Permiso',
            'category_id' => 1
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'admin.permisos.update',
            'description' => 'Actualizar Permiso',
            'category_id' => 1
        ])->syncRoles([$admin]);

        Permission::create([
            'name' => 'teams.create',
            'description' => 'Creación de Teams',
            'category_id' => 5
        ])->syncRoles([$admin]);
    }
}
