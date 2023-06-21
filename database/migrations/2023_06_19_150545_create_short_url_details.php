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
        Schema::create('short_url_details', function (Blueprint $table) {
            $table->id();
            $table->string('device')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('operating_system')->nullable();
            $table->timestamp('visited_at');

            $table->foreignId('short_url_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_url_details');
    }
};
