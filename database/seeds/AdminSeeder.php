<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class)->create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
            'type' => 3
        ]);

        $manage_lecturers = Permission::create(['name' => 'manage_lecturers']);
        $manage_students = Permission::create(['name' => 'manage_students']);
        $manage_users = Permission::create(['name' => 'manage_users']);

        $admin = Role::create(['name' => 'admin']);

        $admin->givePermissionTo($manage_lecturers);
        $admin->givePermissionTo($manage_students);
        $admin->givePermissionTo($manage_users);

        $user->assignRole('admin');

    }
}
