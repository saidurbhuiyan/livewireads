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
        Schema::create('offerwalls', static function (Blueprint $table) {
            $table->id();
            $table->string('display_name')->unique();
            $table->string('secret')->nullable();
            $table->string('api_key')->nullable();
            $table->unsignedTinyInteger('priority')->default(0)->comment('0 to 100');
            $table->unsignedTinyInteger('security_risk')->default(0)->comment('0 to 100');
            $table->text('frame_url')->nullable();
            $table->boolean('is_enable')->default(false);
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
        Schema::dropIfExists('offerwalls');
    }
};
