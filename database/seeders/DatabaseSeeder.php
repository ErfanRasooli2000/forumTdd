<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Thread::factory()->count(50)->create()->each(function ($item){
           Reply::factory()->count(10)->for($item)->create();
        });
    }
}
