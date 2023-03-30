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
        Schema::table('images', function (Blueprint $table) {
            $table->text('labels')->nullable();

            $table->text('adult')->nullable();
            $table->text('spoof')->nullable();
            $table->text('medical')->nullable();
            $table->text('violence')->nullable();
            $table->text('racy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
           $table->dropColumn(['labels', 'adult', 'spoof', 'medical', 'racy', 'violence']);
        });
    }
};
