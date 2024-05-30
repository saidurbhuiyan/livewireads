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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->foreignId('ptc_id')->index()->nullable();
            $table->foreignId('banner_id')->index()->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('url');
            $table->unsignedInteger('time')->default(0);
            $table->string('geo_filter')->nullable();
            $table->string('target_geo')->nullable();
            $table->string('banner_path', 2048);
            $table->double('daily_rate')->default(0);
            $table->unsignedInteger('days_view')->default(0);
            $table->unsignedInteger('days_viewed')->default(0);
            $table->unsignedInteger('click')->default(0);
            $table->double('cpm')->default('0');
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('viewed')->default(0);
            $table->boolean('active')->default(0);
            $table->boolean('new_tab')->default(0);
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = pending, 1 = approved, 2 = rejected');
            $table->string('reason')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
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
        //
    }
};
