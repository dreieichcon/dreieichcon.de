<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            "event",
            "admin.user",
            "admin.role",
            "biography",
            "pages"
        ];


        foreach($permissions as $perm){
            Permission::create([
                "name" => $perm,
                "guard_name" => "web",
            ]);
        }
    }
}
