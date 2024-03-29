<?php
    
    use Illuminate\Database\Seeder;
    use Illuminate\Database\Eloquent\Model;
    use Database\Seeds\PermissionsTableSeeder;
    use Database\Seeds\RolesTableSeeder;
    use Database\Seeds\ConnectRelationshipsSeeder;
    use Database\Seeds\UsersTableSeeder;
    
    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            // $this->call(UsersTableSeeder::class);
            
            Model::unguard();
            
//            $this->call('PermissionsTableSeeder');
//            $this->call('RolesTableSeeder');
//            $this->call('ConnectRelationshipsSeeder');
            
            
            $this->call(PermissionsTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(ConnectRelationshipsSeeder::class);
            $this->call(UsersTableSeeder::class);
            Model::reguard();
            
        }
    }