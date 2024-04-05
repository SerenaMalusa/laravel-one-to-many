<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project();
        $project->title = 'Boolando';
        $project->description = "Create un nuovo progetto utilizzando Vite e Vue 3 e definite i componenti necessari per strutturare il layout.
                                    Non esagerate con i componenti: less is more.
                                    L'esercizio già lo conoscete (html-css-boolando), ma la sfida è suddividerlo in componenti e provare a sfruttare SASS per rendere il nostro stile più leggibile e flessibile (di quali variabili potreste avere bisogno?).";
        $project->repository = 'vite-boolando';
        $project->github_link = 'https://github.com/SerenaMalusa/vite-boolando';
        $project->creation_date = '2024-03-27';
        $project->last_commit = '2024-03-29';
        $project->save();
    }
}
