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
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->boolean('is_secure')->default(false)->comment('false = no (http), true = yes (https)');
            $table->string('domain_name');
            $table->unsignedBigInteger('monthly_traffic')->default(0);
            $table->unsignedTinyInteger('analytic_source')->default(0)->comment('0 = google analytics, 1 = similar_web, 2 = yandex metrics, 3 = other');
            $table->string('category')->default('none');
            $table->string('disable_category')->nullable();
            $table->string('verification_code')->nullable();
            $table->timestamp('domain_verified_at')->nullable();
            $table->string('status')->default('pending')->comment('pending, active, inactive, rejected');
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
        Schema::dropIfExists('websites');
    }
};
