<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $usersRecord = [
            [
                'name'=> 'M Hannan', 'email'=>'admin@admin.com','password'=>Hash::make('12345678')
            ],


        ];
        DB::table('users')->insert($usersRecord);
    }
}
