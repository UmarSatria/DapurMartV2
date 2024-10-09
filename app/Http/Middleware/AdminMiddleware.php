<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create role
        $roleAdmin = Role::create(['name' => 'Admin']);

        // Create user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Assign role to user
        $admin->assignRole($roleAdmin);
    }
}
