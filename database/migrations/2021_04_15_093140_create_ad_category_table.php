<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_category', function (Blueprint $table) {
            $table->bigInteger('ad_id')->nullable()->unsigned();
                $table->foreign("ad_id")->references('id')->on("ads")->onDelete("cascade");
            $table->bigInteger('category_id')->nullable()->unsigned();
                $table->foreign("category_id")->references('id')->on("categories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_category');
    }
}
