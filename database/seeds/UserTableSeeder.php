<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \CodeProject\Entities\User::truncate();
        factory(\CodeProject\Entities\User::class)->create([
            'name'           => 'Luis Fernando',
            'email'          => 'luis_serra@hotmail.com',
            'password'       => bcrypt(123456),
            'remember_token' => str_random(10)
        ]);
        factory(\CodeProject\Entities\User::class, 9)->create();
    }
}
