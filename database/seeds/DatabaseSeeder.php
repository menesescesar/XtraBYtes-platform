<?php

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create default permissions
        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }
        $this->command->info('Default Permissions added.');

        // Confirm roles needed
        if ($this->command->confirm('Create Roles for user, default is admin and user? [y|N]', true)) {
            // Ask for roles from input
            $input_roles = $this->command->ask('Enter roles in comma separate format.', 'Admin,User');
            // Explode roles
            $roles_array = explode(',', $input_roles);
            // add roles
            foreach($roles_array as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);
                if( $role->name == 'Admin' ) {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Admin granted all the permissions');
                } else {
                    // for others by default only read access
                    $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
                }
                // create one user for each role
                $this->createUser($role);
            }
            $this->command->info('Roles ' . $input_roles . ' added successfully');
        }
    }

	private function createUser($role)
    {
        $user = factory(User::class)->create();
        $user->assignRole($role->name);
        if( $role->name == 'Admin' ) {
            $this->command->info('Here is your admin details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "secret"');
        }
    }
}
