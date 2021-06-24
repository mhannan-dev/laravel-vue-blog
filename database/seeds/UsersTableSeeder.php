<?php

use App\Models\User;
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
                'id'=> 1, 'name'=> 'M Hannan','email'=>'admin@admin.com', 'type'=>'admin','bio'=>'Bio data','password'=>Hash::make('12345678'), 'photo'=>'default.png'
            ]

        ];
        DB::table('users')->insert($usersRecord);
    }
}
