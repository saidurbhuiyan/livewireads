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
        Schema::create('ptc_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('timer');
            $table->double('ppv')->comment('ppv = price per view');
            $table->double('reward');
            $table->unsignedInteger('min_view');
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
        Schema::dropIfExists('ptc_options');
    }
};
