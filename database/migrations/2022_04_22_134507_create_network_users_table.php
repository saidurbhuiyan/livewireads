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
        Schema::create('network_users', function (Blueprint $table) {
            $table->foreignId('user_id')->index();
            $table->foreignId('network_id')->index();
            $table->boolean('whitelist')->default(false)->comment('0 = no, 1 = yes');
            $table->boolean('multi_accounts')->default(false)->comment('0 = no, 1 = yes');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('network_id')->references('id')->on('networks')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['network_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('network_users');
    }
};
