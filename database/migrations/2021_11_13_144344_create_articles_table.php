<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('user_id')->index()->constrained('users');
            $table->string('kicker')->nullable();
            $table->string('reporter')->nullable();
            $table->string('title')->index();
            $table->string('slug')->unique()->index();
            $table->foreignId('thumbnail_id')->nullable()->constrained('media');
            $table->text('teaser')->nullable();
            $table->longText('content')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->foreignId('publisher_id')->nullable()->constrained('users');
            // $table->boolean('pinned')->default(false);
            $table->string('status')->default('draft')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
