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
        Schema::create("courses", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->date('prefer_date');
            $table->foreignId('course_id')->constrained('courses', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->timestamps();
        });
        Schema::create("reviews", function (Blueprint $table) {
            $table->id();
            $table->string("text");
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('application_id')->constrained('applications', 'id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('reviews');
    }
};
