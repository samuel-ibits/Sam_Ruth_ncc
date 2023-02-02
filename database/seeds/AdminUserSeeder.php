<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Webpatser\Uuid\Uuid;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'firstname' => 'System',
        	'lastname' => 'Admin',
        	'email' => 'systemadmin@mailinator.com',
            'password' => bcrypt('123456'),
            'username' => 'systemadmin',
            'isAdmin' => true,
            'email_token' => Uuid::generate(),
            'email_verified_at' => new DateTime()
        ]);
        $role = Role::findByName("admin");
        $user->assignRole([$role->id]);
    }
}
