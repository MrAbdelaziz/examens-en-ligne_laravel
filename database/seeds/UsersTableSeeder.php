<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'MrAbdelaziz',
            'email' => 'test@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'cover' => null,
            'avatar' => null,
            'birthday' => null,
            'bio' => null,
            'address' => null,
            'city' => null,
            'country' => null,
            'competence' => null,
            'school' => null,
            'phone' => null,
            'gender' => 'm',
            'status' => '1',
            'role_id' => '1',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ]);
    }
}
