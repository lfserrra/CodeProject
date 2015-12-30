<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Model::unguard();

        $this->call(OAuthClientSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(ProjectNoteTableSeeder::class);
        $this->call(ProjectTaskTableSeeder::class);
        $this->call(ProjectFileTableSeeder::class);
        $this->call(ProjectMembersTableSeeder::class);

        Model::reguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
