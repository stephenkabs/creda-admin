<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();

            // Core identity
            $table->string('name');
            $table->string('type'); // Microfinance, SACCO, Payroll, etc.

            // Contact
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
        $table->string('special_code')->nullable();
            $table->string('slug')->unique();
            // Localization
            $table->string('country')->default('Zambia');
            $table->string('currency')->default('ZMW');
            $table->foreignId('created_by')->nullable()->constrained('users');

            // Status
            $table->boolean('active')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
