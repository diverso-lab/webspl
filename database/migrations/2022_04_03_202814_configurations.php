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
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', ['LOADING', 'READY', 'PAUSED'])->default('LOADING');
            
            # Settings
            $table->string('web_name')->unique();
            $table->string('admin_email')->default('test@admin.com');
            $table->string('theme')->default('go');
            
            # Server
            $table->string('php')->default('7.4');
            $table->enum('storage', ['LOW', 'ENOUGH'])->default('LOW');

            # Web
            $table->boolean('catalog')->default('1');
            $table->boolean('cart')->default('1');
            $table->enum('search', ['BASIC', 'ADVANCED'])->default('BASIC');
            $table->boolean('paypal_payment')->default('1');
            $table->boolean('creditcard_payment')->default('0');
            $table->boolean('mobile_payment')->default('0');
            $table->enum('security', ['HIGH', 'STANDARD'])->default('STANDARD');
            $table->boolean('backup')->default('0');
            $table->boolean('seo')->default('0');
            $table->boolean('twitter_socials')->default('0');
            $table->boolean('facebook_socials')->default('0');
            $table->boolean('youtube_socials')->default('0');
            $table->string('assigned_port')->default('64999');

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
        //
    }
};
