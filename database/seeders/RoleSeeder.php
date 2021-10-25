<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        # ELIMINAR TABLAS
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('categories')->truncate();

        # ROLES
        $admin = Role::create(['name' => 'Administrador']);
        $user = Role::create(['name' => 'User']);
        $autoridad = Role::create(['name' => 'Autoridad']);
        $productor = Role::create(['name' => 'Productor']);

        # CATEGORIAS #
        Category::create([
            'id' => 1,
            'name' => 'admin',
            'description' => 'Roles y Permisos'
        ]);
        Category::create([
            'id' => 2,
            'name' => 'rpm',
            'description' => 'RPM'
        ]);
        Category::create([
            'id' => 3,
            'name' => 'formweb',
            'description' => 'Formularios Web'
        ]);
        Category::create([
            'id' => 4,
            'name' => 'web',
            'description' => 'Otras Catergorias Web'
        ]);
        Category::create([
            'id' => 5,
            'name' => 'teams',
            'description' => 'Categoria de teams'
        ]);
        Category::create([
            'id' => 6,
            'name' => 'dev',
            'description' => 'Desarrollo'
        ]);

        # PERMISOS #
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
            'category_id' => 1
        ])->syncRoles([$admin, $autoridad, $user]);
        Permission::create([
            'name' => 'admin.users.create',
            'description' => 'Crear Usuario',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Editar Usuario',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.users.update',
            'description' => 'Actualizar Usuario',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.users.destroy',
            'description' => 'Eliminar Usuario',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.users.store',
            'description' => 'Almacenar Usuario',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.users.show',
            'description' => 'Ver Usuario',
            'category_id' => 1
        ])->syncRoles([$admin, $autoridad, $user]);


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
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.roles.edit',
            'description' => 'Editar Rol',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.roles.show',
            'description' => 'Ver Rol',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.roles.update',
            'description' => 'Actualizar Rol',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.roles.destroy',
            'description' => 'Eliminar Rol',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.roles.store',
            'description' => 'Almacenar Rol',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);

        // Permisos
        Permission::create([
            'name' => 'admin.permisos.index',
            'description' => 'Listar Permiso',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.permisos.create',
            'description' => 'Crear Permiso',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.permisos.edit',
            'description' => 'Editar Permiso',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.permisos.show',
            'description' => 'Ver Permiso',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.permisos.update',
            'description' => 'Actualizar Permiso',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.permisos.destroy',
            'description' => 'Eliminar Permiso',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.permisos.store',
            'description' => 'Almacenar Permiso',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);


        // Team
        Permission::create([
            'name' => 'teams.create',
            'description' => 'Creación de Teams',
            'category_id' => 5
        ])->syncRoles([$admin, $user]);

        // Categorias
        Permission::create([
            'name' => 'admin.categorias.index',
            'description' => 'Listar Categorías',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.categorias.create',
            'description' => 'Creación de Categorías',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.categorias.store',
            'description' => 'Almacenar categoría',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.categorias.edit',
            'description' => 'Editar Categoria',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.categorias.update',
            'description' => 'Actualizar Categoria',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.categorias.destroy',
            'description' => 'Eliminar Categoria',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'admin.categorias.show',
            'description' => 'Ver Categorías',
            'category_id' => 1
        ])->syncRoles([$admin, $user]);

        // Formularios Web
        Permission::create([
            'name' => 'formweb.solicitudes.index',
            'description' => 'Listar Solicitudes',
            'category_id' => 3
        ])->syncRoles([$admin, $autoridad, $user]); 
        Permission::create([
            'name' => 'formweb.solicitudes.edit',
            'description' => 'Editar Solicitud',
            'category_id' => 3
        ])->syncRoles([$admin, $user]); 
        Permission::create([
            'name' => 'formweb.solicitudes.create',
            'description' => 'Crear Solicitud',
            'category_id' => 3
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'formweb.solicitudes.destroy',
            'description' => 'Eliminar Solicitud',
            'category_id' => 3
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'formweb.formulariosweb.show',
            'description' => 'Mostrar botón Formularios WEB',
            'category_id' => 3
        ])->syncRoles([$admin, $user]);

        // Mostrar Botones
        Permission::create([
            'name' => 'rpm.dashboard.show',
            'description' => 'Mostrar boton Dashboard',
            'category_id' => 2
        ])->syncRoles([$admin, $autoridad, $user]);
        Permission::create([
            'name' => 'rpm.borradores.show',
            'description' => 'Mostrar botón Borradores',
            'category_id' => 2
        ])->syncRoles([$admin, $autoridad, $user]);
        Permission::create([
            'name' => 'rpm.pagos.show',
            'description' => 'Mostrar botón Pagos',
            'category_id' => 2
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'rpm.reinscripciones.show',
            'description' => 'Mostrar botón Reinscripciones',
            'category_id' => 2
        ])->syncRoles([$admin, $autoridad, $user]);
        Permission::create([
            'name' => 'rpm.producto.show',
            'description' => 'Mostrar botón Producto',
            'category_id' => 2
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'rpm.iiasydias.show',
            'description' => 'Mostrar botón IIASyDIAS',
            'category_id' => 2
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'rpm.prodmina.show',
            'description' => 'Mostrar botón ProdMIna',
            'category_id' => 2
        ])->syncRoles([$admin, $user]);
        Permission::create([
            'name' => 'rpm.productores.show',
            'description' => 'Mostrar botón Productores',
            'category_id' => 2
        ])->syncRoles([$admin, $user]);

        // Modo Desarrollo
        Permission::create([
            'name' => 'dev.dev.show',
            'description' => 'Mostrar detalles de desarrollo',
            'category_id' => 6
        ])->syncRoles([$admin, $user]);
    }
}