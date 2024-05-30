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
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip');//->unique();
            $table->string('asn');
            $table->string('country');
            $table->string('isp');
            $table->unsignedTinyInteger('proxy_score')->default(0)->comment('0 to 100 | bad over 90');
            $table->boolean('expired')->default(false)->comment('0 = no, 1 = yes');
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
        Schema::dropIfExists('networks');
    }
};
