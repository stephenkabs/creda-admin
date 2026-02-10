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
    $table->string('name');
    $table->string('email')->unique();
    $table->string('slug')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->string('special_code')->nullable();
    $table->enum('status', ['active','suspended','pending'])->default('active');
    $table->boolean('active')->default(true);

    // SaaS essentials
    $table->unsignedBigInteger('organization_id')->nullable();
    $table->unsignedBigInteger('branch_id')->nullable();
$table->string('invitation_token')->nullable();
$table->timestamp('invited_at')->nullable();
$table->timestamp('password_set_at')->nullable();

    // $table->string('role')->default('owner'); // owner during onboarding
    $table->timestamp('onboarding_completed_at')->nullable();

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
