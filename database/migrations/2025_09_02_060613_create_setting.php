<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('store_name');
            $table->string('slogan')->nullable();
            $table->text('bio');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('wa_number');
            $table->longText('term_and_condition');
            $table->longText('privacy_policy');
            $table->string('link_playstore');
            $table->string('link_appstore');
            $table->string('link_fb');
            $table->string('link_twitter');
            $table->string('link_ig');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};
