<?php
use Illuminate\Database\Seeder;
class RolesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'administrator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id' => '2',
            'name' => 'supervisor',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id' => '3',
            'name' => 'author',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id' => '4',
            'name' => 'member',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
