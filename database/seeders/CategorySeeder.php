<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::createOrFirst(
            [
                'name'=>'Telephone & Tablette',
                'emoji'=>'',
                'slug'=>Str::slug('Telephone & Tablette'),
                'description'=>''
            ],
        );
        Category::createOrFirst(
            [
                'name'=>'TV & HIGH TECH',
                'emoji'=>'',
                'slug'=>Str::slug('TV & HIGH TECH'),
                'description'=>''
            ],
        );
        Category::createOrFirst(
            [
                'name'=>'Informatique',
                'emoji'=>'',
                'slug'=>Str::slug('Informatique'),
                'description'=>''
            ],
        );
        Category::createOrFirst(
            [
                'name'=>'Maison, cuisine & bureau',
                'emoji'=>'',
                'slug'=>Str::slug('Maison, cuisine & bureau'),
                'description'=>''
            ],
        );
        Category::createOrFirst(
            [
                'name'=>'Electromenager',
                'emoji'=>'',
                'slug'=>Str::slug('Electromenager'),
                'description'=>''
            ],
        );
        Category::createOrFirst(
            [
                'name'=>'Vetements & Chaussures',
                'emoji'=>'',
                'slug'=>Str::slug('Telephone & Tablette'),
                'description'=>''
            ],
        );
        Category::createOrFirst(
            [
                'name'=>'Bebe & Jouets',
                'emoji'=>'',
                'slug'=>Str::slug('Bebe & Jouets'),
                'description'=>''
            ],
        );
        Category::createOrFirst(
            [
                'name'=>'Sports & Loisirs',
                'emoji'=>'',
                'slug'=>Str::slug('Sports & Loisirs'),
                'description'=>''
            ],
        );
        Category::createOrFirst(
            [
                'name'=>'Beaute & Sante',
                'emoji'=>'',
                'slug'=>Str::slug('Beaute & Sante'),
                'description'=>''
            ],
        );
        Category::createOrFirst(
            [
                'name'=>'Jeux videos & Consoles',
                'emoji'=>'',
                'slug'=>Str::slug('Jeux videos & Consoles'),
                'description'=>''
            ],
        );
    }
}
