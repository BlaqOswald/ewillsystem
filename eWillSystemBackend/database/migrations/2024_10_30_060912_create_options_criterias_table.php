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
        Schema::create('options_criterias', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // For example, 'gender' or 'marital_status'
            $table->string('value'); // Dropdown option text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options_criterias');
    }
};