<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Str;






class PermissionSeeder extends Seeder
{
      /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'create brands']);
        Permission::create(['name' => 'update brands']);
        Permission::create(['name' => 'delete brands']);
        Permission::create(['name' => 'view brands']);
        Permission::create(['name' => 'edit brands']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'view roles']);
         Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'create coloroptions']);
        Permission::create(['name' => 'update coloroptions']);
        Permission::create(['name' => 'delete coloroptions']);
        Permission::create(['name' => 'view coloroptions']);
        Permission::create(['name' => 'edit coloroptions']);
        Permission::create(['name' => 'create sizeptions']);
        Permission::create(['name' => 'update sizeptions']);
        Permission::create(['name' => 'delete sizeptions']);
        Permission::create(['name' => 'view sizeptions']);
        Permission::create(['name' => 'edit sizeptions']);
        Permission::create(['name' => 'create weightptions']);
        Permission::create(['name' => 'update weightptions']);
        Permission::create(['name' => 'delete weightptions']);
        Permission::create(['name' => 'view weightptions']);
        Permission::create(['name' => 'edit weightptions']);


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('view brands');
        $role1->givePermissionTo('view coloroptions');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('create users');
        $role2->givePermissionTo('update users');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'is_admin'=> '0',


        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'is_admin'=> '1',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'is_admin'=> '1',
        ]);
        $user->assignRole($role3);
   
}
}
