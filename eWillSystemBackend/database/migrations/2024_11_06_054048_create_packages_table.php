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
        Schema::create('subpackages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the package
            $table->decimal('price', 8, 3); // Subscription price
            $table->string('description')->nullable(); // Description for the package
            $table->integer('document_limit')->nullable(); // Document limit for each tier
            $table->string('support_level')->default('Basic'); // Support level (e.g., Basic, Priority)
            $table->boolean('consultation_included')->default(false); // Whether consultation is included
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
