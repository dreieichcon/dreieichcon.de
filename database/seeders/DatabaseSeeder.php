<?php

namespace Database\Seeders;

use App\Models\Spatie\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //generate Admin

        if(config("app.env") == "local"){
            $password = "password";
        }else{
            $password = Str::password(12);
        }

        $admin = User::create([
            "name" => "super-admin",
            "email" => "admin@example.org",
            "password" => Hash::make($password),
        ]);
        $this->command->info("  created super-admin $admin->email with password '$password'");
        $this->command->newLine();
        $super_admin_role = Role::create(["name" => "super-admin"]);

        $admin->assignRole($super_admin_role);



        $this->call([
            CategoriesSeeder::class,
            SocialSeeder::class,
            PermissionSeeder::class,
            NavigationSeeder::class,
        ]);
    }
}
