<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ----- USERS -----
        Permission::firstOrCreate(['name' => 'view users']);
        Permission::firstOrCreate(['name' => 'create users']);
        Permission::firstOrCreate(['name' => 'edit users']);
        Permission::firstOrCreate(['name' => 'delete users']);
        Permission::firstOrCreate(['name' => 'ban users']);

        // ----- ROLES -----
        Permission::firstOrCreate(['name' => 'view roles']);
        Permission::firstOrCreate(['name' => 'create roles']);
        Permission::firstOrCreate(['name' => 'edit roles']);
        Permission::firstOrCreate(['name' => 'delete roles']);

        // ----- PERMISSIONS -----
        Permission::firstOrCreate(['name' => 'view permissions']);
        Permission::firstOrCreate(['name' => 'create permissions']);
        Permission::firstOrCreate(['name' => 'edit permissions']);
        Permission::firstOrCreate(['name' => 'delete permissions']);

        // ----- PRODUCTS -----
        Permission::firstOrCreate(['name' => 'view products']);
        Permission::firstOrCreate(['name' => 'create products']);
        Permission::firstOrCreate(['name' => 'edit products']);
        Permission::firstOrCreate(['name' => 'delete products']);
        Permission::firstOrCreate(['name' => 'manage product images']);
        Permission::firstOrCreate(['name' => 'manage product categories']);

        // ----- CATEGORIES -----
        Permission::firstOrCreate(['name' => 'view categories']);
        Permission::firstOrCreate(['name' => 'create categories']);
        Permission::firstOrCreate(['name' => 'edit categories']);
        Permission::firstOrCreate(['name' => 'delete categories']);

        // ----- ORDERS -----
        Permission::firstOrCreate(['name' => 'view orders']);
        Permission::firstOrCreate(['name' => 'update order status']);
        Permission::firstOrCreate(['name' => 'delete orders']);
        Permission::firstOrCreate(['name' => 'manage payments']);

        // ----- REPORTS -----
        Permission::firstOrCreate(['name' => 'view sales reports']);
        Permission::firstOrCreate(['name' => 'view user activity']);
        Permission::firstOrCreate(['name' => 'export reports']);

        // ----- SETTINGS -----
        Permission::firstOrCreate(['name' => 'manage settings']);
        Permission::firstOrCreate(['name' => 'manage shipping']);
        Permission::firstOrCreate(['name' => 'manage taxes']);

        // ----- Create Roles -----
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $employee = Role::firstOrCreate(['name' => 'employee']);
        $employee->givePermissionTo([
            'view users',
            'view products',
            'view orders',
            'update order status',
            'manage product images',
            'manage product categories',
        ]);

        $customer = Role::firstOrCreate(['name' => 'customer']);
    }
}
