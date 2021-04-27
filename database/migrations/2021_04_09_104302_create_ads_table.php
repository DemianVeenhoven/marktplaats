<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string("seller");
            $table->string("title");
            $table->text("body");
            $table->string("image_path")->nullable();
            $table->boolean("premium_ad")->default(0);
            $table->boolean("sold")->default(0);
            $table->float("fee")->default(0.00);
            $table->bigInteger('user_id')->nullable()->unsigned();
                $table->foreign("user_id")->references('id')->on("users")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
