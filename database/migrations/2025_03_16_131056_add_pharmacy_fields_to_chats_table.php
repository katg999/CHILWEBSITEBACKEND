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
        Schema::table('chats', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chats', function (Blueprint $table) {
            //
             $table->string('pharmacy_name')->after('id'); // Add after a specific column
            $table->string('pharmacy_email')->after('pharmacy_name');
            $table->string('pharmacy_contact')->after('pharmacy_email');
        });
    }
};
