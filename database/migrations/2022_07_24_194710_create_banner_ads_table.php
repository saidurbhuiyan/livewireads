<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_ads', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->index();
            $table->foreignId('option_id')->index();
            $table->string('title');
            $table->string('url');
            $table->string('banner_path', 2048);
            $table->string('geo_filter')->nullable();
            $table->string('target_geo')->nullable();
            $table->double('daily_rate');
            $table->unsignedInteger('days_view')->default(0);
            $table->unsignedInteger('days_viewed')->default(0);
            $table->unsignedInteger('click')->default(0);
            $table->unsignedBigInteger('viewed')->default(0);
            $table->boolean('active')->default(0);
            $table->boolean('new_tab')->default(0);
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = pending, 1 = approved, 2 = rejected');
            $table->string('reason')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('banner_options')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_ads');
    }
};
