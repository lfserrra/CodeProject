<?php

use Illuminate\Database\Seeder;

class ProjectMembersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \CodeProject\Entities\ProjectMembers::truncate();
        for ($project = 1; $project < 11; $project++)
        {
            for ($member = 1; $member < 11; $member++)
            {
                \CodeProject\Entities\ProjectMembers::create(['project_id' => $project, 'user_id' => $member]);
            }
        }
    }
}
