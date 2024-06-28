<?php

namespace Database\Seeders;

use App\Models\Spatie\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            "event",
            "user",
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
