<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('permissions')->insert([
            ['name' => 'review_post'],
            ['name' => 'update_post'],
            ['name' => 'delete_post'],
            ['name' => 'restore_post'],
            ['name' => 'force_delete_post'],
        ]);
        
        DB::table('roles')->insert([
            ['name' => 'admin'],
        ]);
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('permission_role')->insert([
            ['permisssion_id' => 1, 'role_id' => 1],
            ['permisssion_id' => 2, 'role_id' => 1],
            ['permisssion_id' => 3, 'role_id' => 1],
            ['permisssion_id' => 4, 'role_id' => 1],
            ['permisssion_id' => 5, 'role_id' => 1],
        ]);
    }
}
