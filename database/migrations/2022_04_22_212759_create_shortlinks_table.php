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
        Schema::create('shortlinks', function (Blueprint $table) {
            $table->id();
            $table->string('display_name');
            $table->string('api_url');
            $table->string('api_token');
            $table->unsignedInteger('count_limit');
            $table->unsignedDecimal('site_cpm',4,2);
            $table->unsignedDecimal('actual_cpm',4,2);
            $table->unsignedTinyInteger('priority')->default(0)->comment('0 to 100');
            $table->unsignedInteger('time');
            $table->boolean('status')->default(false)->comment('0 = disable, 1 = enable');
            $table->text('disable_reason')->nullable();
            $table->string('tag')->nullable()->comment('hot, pop, adult');
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
        Schema::dropIfExists('shortwalls');
    }
};
