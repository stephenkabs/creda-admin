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
Schema::create('organization_preferences', function (Blueprint $table) {
    $table->id();
    $table->foreignId('organization_id')->constrained()->cascadeOnDelete();

    // Loan rules
    $table->string('interest_type')->default('reducing'); // flat | reducing
    $table->integer('grace_period_days')->default(0);
    $table->decimal('penalty_rate', 5, 2)->default(0);

    // Security flags (saved only, enforced later)
    $table->boolean('email_otp_enabled')->default(false);
    $table->boolean('temp_password_enabled')->default(false);


    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_preferences');
    }
};
