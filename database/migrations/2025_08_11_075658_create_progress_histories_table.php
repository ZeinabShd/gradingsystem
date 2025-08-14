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
        Schema::create('progress_history', function (Blueprint $table) {
        $table->id();
        $table->foreignId('enrollment_id')->constrained('enrollment')->cascadeOnDelete();
        $table->enum('from_status', ['enrolled','in_progress','passed','failed','incomplete', 'passed_equiv', 'pending', 'dropped'])->nullable();
        $table->enum('to_status', ['enrolled','in_progress','passed','failed','incomplete', 'passed_equiv', 'pending', 'dropped']);
        $table->timestamp('changed_at')->useCurrent();
        $table->text('reason')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_histories');
    }
};
