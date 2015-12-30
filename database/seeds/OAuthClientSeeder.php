<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OAuthClientSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('TRUNCATE TABLE oauth_clients');
        DB::insert('INSERT oauth_clients (id, secret, name) VALUES(?,?,?)', [
            'appid1',
            'secret',
            'AngularAPP'
        ]);
    }
}
