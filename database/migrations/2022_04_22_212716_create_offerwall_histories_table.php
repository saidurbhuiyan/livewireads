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
        Schema::create('offerwall_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_app_id')->index();
            $table->foreignId('offerwall_id')->index();
            $table->foreignId('network_id')->index();
            $table->unsignedBigInteger('sub_id')->index();
            $table->string('unique_id');
            $table->string('offer_name')->default(null);
            $table->decimal('usd_amount', 10, 8)->default(0);
            $table->decimal('currency_amount',10,8)->default(0);
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = pending, 1 = completed, 2 = reversed');
            $table->timestamps();

            $table->foreign('offerwall_id')->references('id')->on('offerwalls')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('site_app_id')->references('id')->on('site_apps')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('network_id')->references('id')->on('networks')->onUpdate('cascade')->onDelete('no action');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offerwall_histories');
    }
};
