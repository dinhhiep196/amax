<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Post;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->string('thumbnailImage')->nullable();
            $table->string('type');
            $table->string('typeName');
            $table->boolean('showHomePage')->default(false);
            $table->string('username')->default('admin');// nguoi dang bai
            $table->string('seoTitle')->nullable();
            $table->string('metaKeywords')->nullable();
            $table->string('metaDescription')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
