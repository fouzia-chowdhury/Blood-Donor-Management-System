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
        Schema::table('donors', function (Blueprint $table) {
        $table->string('image')->nullable();
        $table->integer('age')->nullable();
        $table->string('height')->nullable();
        $table->string('weight')->nullable();
        $table->date('last_donation')->nullable();
        $table->string('status')->default('Available'); // Available status
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donors', function (Blueprint $table) {
            //
        });
    }
};
