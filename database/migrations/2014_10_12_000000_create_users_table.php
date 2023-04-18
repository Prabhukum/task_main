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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Employee_ID');
            $table->string('name')->nullable();
            $table->string('empDOB');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('empGender');
            $table->string('empAddress');
            $table->string('Country');
            $table->string('State');
            $table->string('City');
            $table->string('remember');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
