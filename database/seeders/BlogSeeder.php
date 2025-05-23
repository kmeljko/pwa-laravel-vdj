<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{

    public function run()
    {
        Blog::create([
            'naslov' => 'Blog',
            'sadrzaj' => 'aaaaa',
        ]);
    }

}
