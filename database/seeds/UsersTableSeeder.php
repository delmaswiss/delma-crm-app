<?php
    
    namespace Database\Seeds;
    
    use Illuminate\Database\Seeder;
    
    class UsersTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $userRole    = config('roles.models.role')::where('name', '=', 'User')->first();
            $adminRole   = config('roles.models.role')::where('name', '=', 'Admin')->first();
            $permissions = config('roles.models.permission')::all();
            
            /*
             * Add Users
             *
             */
            if (config('roles.models.defaultUser')::where('email', '=', 'admin@admin.com')->first() === NULL) {
                $newUser = config('roles.models.defaultUser')::create([
                                                                          'name'     => 'Admin',
                                                                          'email'    => 'admin@admin.com',
                                                                          'password' => bcrypt('password'),
                                                                      ]);
                
                $newUser->attachRole($adminRole);
                foreach ($permissions as $permission) {
                    $newUser->attachPermission($permission);
                }
            }
            
            if (config('roles.models.defaultUser')::where('email', '=', 'user@user.com')->first() === NULL) {
                $newUser = config('roles.models.defaultUser')::create([
                                                                          'name'     => 'User',
                                                                          'email'    => 'user@user.com',
                                                                          'password' => bcrypt('password'),
                                                                      ]);
                
                $newUser;
                $newUser->attachRole($userRole);
            }
            
            # Create Admin User Dario
            if (config('roles.models.defaultUser')::where('email', '=', 'dario@delma.swiss')->first() === NULL) {
                $newUser = config('roles.models.defaultUser')::create([
                                                                          'name'     => 'Dario De Lucia',
                                                                          'email'    => 'dario@delma.swiss',
                                                                          'password' => bcrypt('Uhcd31wowa'),
                                                                      ]);
                
                $newUser->attachRole($adminRole);
                foreach ($permissions as $permission) {
                    $newUser->attachPermission($permission);
                }
            }
        }
    }
