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
        Schema::create('ads_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ads_id')->index();
            $table->foreignId('site_id')->index();
            $table->foreignId('network_id')->index();
            $table->unsignedInteger('time_taken');
            $table->boolean('clicked')->default(0)->comment('0 = no, 1 = yes');
            $table->timestamps();

            $table->foreign('ads_id')->references('id')->on('advertisements')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('site_id')->references('id')->on('site_apps')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('network_id')->references('id')->on('networks')
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
        Schema::dropIfExists('ads_histories');
    }
};