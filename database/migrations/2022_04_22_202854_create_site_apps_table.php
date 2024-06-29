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
        Schema::create('site_apps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->index();
            $table->string('public_key')->unique();
            $table->string('private_key')->unique();
            $table->string('currency_name');
            $table->decimal('conversion_rate')->default(1)->comment('1 usd to currency');
            $table->boolean('is_allow_decimal')->default(true);
            $table->longText('postback_url');
            $table->timestamps();
            $table->foreign('site_id')->references('id')->on('websites')
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
        Schema::dropIfExists('site_apps');
    }
};
