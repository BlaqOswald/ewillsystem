<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("audits", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user"); // Foreign key column
            $table->text("activity"); // Activity description
            $table->string("addedon", 20); // Added on date (string format)
            $table->timestamps(); // Laravel's created_at and updated_at fields

            // Foreign key constraint (optional)
            $table
                ->foreign("user")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("audits");
    }
};
