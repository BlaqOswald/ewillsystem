<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create("feedbacks", function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->string("fullname");
            $table->text("message");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("feedbacks");
    }
};
