<?php

use Illuminate\Database\Seeder;

class ProjectFileTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\CodeProject\Entities\ProjectFile::all() as $file){
            \Illuminate\Support\Facades\Storage::delete($file->id . '.' . $file->extension);
        }
        \CodeProject\Entities\ProjectFile::truncate();
    }
}
