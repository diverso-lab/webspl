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
            
            # Settings
            $table->string('web_name');
            $table->string('admin_email');
            $table->string('theme');
            
            # Server
            $table->string('php');
            $table->string('storage');

            # Web
            $table->boolean('catalog');
            $table->string('search');
            $table->boolean('paypal_payment');
            $table->boolean('creditcard_payment');
            $table->boolean('mobile_payment');
            $table->boolean('cart');
            $table->string('security');
            $table->boolean('backup');
            $table->boolean('seo');
            $table->boolean('twitter_socials');
            $table->boolean('facebook_socials');
            $table->boolean('youtube_socials');

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
