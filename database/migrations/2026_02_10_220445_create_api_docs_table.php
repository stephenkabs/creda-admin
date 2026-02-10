<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('api_docs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();

            // Grouping
            $table->string('module'); // Organization, Clients, Loans, Payments
            $table->string('title');  // e.g. "Fetch Loans"
            $table->string('slug');

            // API details
            $table->string('method'); // GET, POST
            $table->string('endpoint'); // /api/v1/loans

            // Content
            $table->longText('description')->nullable();
            $table->longText('request_example')->nullable();
            $table->longText('response_example')->nullable();
            $table->longText('notes')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['organization_id', 'module']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('api_docs');
    }
};
