<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Customer;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //USER MODEL
        $userPermission1 = Permission::create(['name' => 'read:user', 'description' => 'read user']);
        $userPermission2 = Permission::create(['name' => 'write:user', 'description' => 'write user']);
        $userPermission3 = Permission::create(['name' => 'create:user', 'description' => 'create user']);
        $userPermission4 = Permission::create(['name' => 'delete:user', 'description' => 'delete user']);

        //ROLE MODEL
        $rolePermission1 = Permission::create(['name' => 'read:role', 'description' => 'read role']);
        $rolePermission2 = Permission::create(['name' => 'write:role', 'description' => 'write role']);
        $rolePermission3 = Permission::create(['name' => 'create:role', 'description' => 'create role']);
        $rolePermission4 = Permission::create(['name' => 'delete:role', 'description' => 'delete role']);

        //ADMIN MODEL
        $adminPermission1 = Permission::create(['name' => 'read:admin', 'description' => 'read admin']);
        $adminPermission2 = Permission::create(['name' => 'write:admin', 'description' => 'write admin']);
        $adminPermission3 = Permission::create(['name' => 'create:admin', 'description' => 'create admin']);
        $adminPermission4 = Permission::create(['name' => 'delete:admin', 'description' => 'delete admin']);

        //PERMISSION MODEL
        $Permission1 = Permission::create(['name' => 'read:permission', 'description' => 'read permission']);
        $Permission2 = Permission::create(['name' => 'write:permission', 'description' => 'write permission']);
        $Permission3 = Permission::create(['name' => 'create:permission', 'description' => 'create permission']);
        $Permission4 = Permission::create(['name' => 'delete:permission', 'description' => 'delete permission']);

        $adminRole = Role::create(['name'=>'admin']);
        $staffRole = Role::create(['name'=>'staff']);
        $authorRole = Role::create(['name'=>'author']);
        $contributorRole = Role::create(['name'=>'contributor']);
        $userRole = Role::create(['name'=>'user']);

        $adminRole->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $adminPermission1,
            $adminPermission2,
            $adminPermission3,
            $adminPermission4,
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4,
        ]);
        $staffRole->syncPermissions([
            $Permission2,
        ]);
        $authorRole->syncPermissions([
            $Permission1,
        ]);
        $contributorRole->syncPermissions([
            $Permission2,
        ]);
        $userRole->syncPermissions([
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4,
        ]);

        $admin = User::create([
            'name' => 'admin',
            'is_admin' => 1,
            'email' => 'admin2@gmail.com',
            'email_verified_at' => now(),
            'password' => Has::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $staff = User::create([
            'name' => 'staff',
            'is_admin' => 0,
            'email' => 'staff@gmail.com',
            'email_verified_at' => now(),
            'password' => Has::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $author = User::create([
            'name' => 'author',
            'is_admin' => 0,
            'email' => 'author@gmail.com',
            'email_verified_at' => now(),
            'password' => Has::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $contributor = User::create([
            'name' => 'contributor',
            'is_admin' => 0,
            'email' => 'contributor@gmail.com',
            'email_verified_at' => now(),
            'password' => Has::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'name' => 'user',
            'is_admin' => 0,
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Has::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $admin->syncRoles([$adminRole])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $adminPermission1,
            $adminPermission2,
            $adminPermission3,
            $adminPermission4,
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4,
        ]);
        $staff->syncRoles([$staffRole])->syncPermissions([
            $Permission2,
        ]);
        $author->syncRoles([$authorRole])->syncPermissions([
            $Permission1,
        ]);
        $contributor->syncRoles([$contributorRole])->syncPermissions([
            $Permission2,
        ]);
        $user->syncRoles[$userRole];
    }
}
