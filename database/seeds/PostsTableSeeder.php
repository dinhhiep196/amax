<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for( $i = 0; $i <5 ; $i++){
            $time = new DateTime();
            $post = new Post();
            $post->title = $faker->sentence;
            $post->slug = str_slug($post->title)."-".$time->getTimestamp();
            $post->content = $faker->paragraph(20);
            $post->type = "dich-vu";
            $post->typeName = "Dịch vụ";
            $post->username = 'admin';
            $post->save();
        }
        for( $i = 0; $i <5 ; $i++){
            $time = new DateTime();
            $post = new Post();
            $post->title = $faker->sentence;
            $post->slug = str_slug($post->title)."-".$time->getTimestamp();
            $post->content = $faker->paragraph(20);
            $post->type = "du-an";
            $post->typeName = "Dự án";
            $post->username = 'admin';
            $post->save();
        }
        for( $i = 0; $i <5 ; $i++){
            $time = new DateTime();
            $post = new Post();
            $post->title = $faker->sentence;
            $post->slug = str_slug($post->title)."-".$time->getTimestamp();
            $post->content = $faker->paragraph(20);
            $post->type = "doi-tac";
            $post->typeName = "Đối tác";
            $post->username = 'admin';
            $post->save();
        }
        for( $i = 0; $i <5 ; $i++){
            $time = new DateTime();
            $post = new Post();
            $post->title = $faker->sentence;
            $post->slug = str_slug($post->title)."-".$time->getTimestamp();
            $post->content = $faker->paragraph(20);
            $post->type = "tuyen-dung";
            $post->typeName = "Tuyển dụng";
            $post->username = 'admin';
            $post->save();
        }
        for( $i = 0; $i <5 ; $i++){
            $time = new DateTime();
            $post = new Post();
            $post->title = $faker->sentence;
            $post->slug = str_slug($post->title)."-".$time->getTimestamp();
            $post->content = $faker->paragraph(20);
            $post->type = "tin-tuc";
            $post->typeName = "Tin tức";
            $post->username = 'admin';
            $post->save();
        }
    }
}
