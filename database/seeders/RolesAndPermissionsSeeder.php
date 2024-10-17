<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create branch']);
        Permission::create(['name' => 'edit branch']);
        Permission::create(['name' => 'delete branch']);
        Permission::create(['name' => 'view branch']);

        // Item Permissions
        Permission::create(['name' => 'create item']);
        Permission::create(['name' => 'edit item']);
        Permission::create(['name' => 'delete item']);
        Permission::create(['name' => 'view item']);

        // Stock Permissions
        Permission::create(['name' => 'view stock']);
        Permission::create(['name' => 'adjust stock']);
        Permission::create(['name' => 'transfer stock']);

        // Sales Permissions
        Permission::create(['name' => 'create sale']);
        Permission::create(['name' => 'view sale']);
        Permission::create(['name' => 'edit sale']);
        Permission::create(['name' => 'delete sale']);

        // Customer Permissions
        Permission::create(['name' => 'create customer']);
        Permission::create(['name' => 'view customer']);
        Permission::create(['name' => 'edit customer']);
        Permission::create(['name' => 'delete customer']);

        // Coupon Permissions
        Permission::create(['name' => 'create coupon']);
        Permission::create(['name' => 'view coupon']);
        Permission::create(['name' => 'edit coupon']);
        Permission::create(['name' => 'delete coupon']);

        // Create roles and assign permissions
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $adminRole = Role::create(['name' => 'Admin']);
        $cashierRole = Role::create(['name' => 'Cashier']);


        // Assign all permissions to Super Admin
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign relevant permissions to Admin
        $adminRole->givePermissionTo([
            'create branch', 'edit branch', 'view branch',
            'create item', 'edit item', 'view item',
            'view stock', 'adjust stock', 'transfer stock',
            'create sale', 'view sale',
            'create customer', 'view customer', 'edit customer',
            'create coupon', 'view coupon', 'edit coupon'
        ]);

        // Assign permissions to Cashier
        $cashierRole->givePermissionTo([
            'create sale', 'view sale',
            'create customer', 'view customer', 'edit customer'
        ]);
    }
}
