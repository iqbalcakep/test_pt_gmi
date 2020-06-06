<?php

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
        //
        $user = new App\User;
        $user->name = "Iqbalcakep";
        $user->email = "admin@iqbalcakep.com";
        $user->password = password_hash('123456', PASSWORD_BCRYPT);
        $user->save();
        
    }
}
