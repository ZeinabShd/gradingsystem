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
        Schema::create('submissions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('enrollment_id')->constrained('enrollment')->cascadeOnDelete() ;

    // Use one or both of these depending on your grading style:
    $table->decimal('score', 5, 2)->nullable();   // e.g. 82.50 (0–100 or whatever you use)

    // Extra helpful flags
    $table->boolean('is_pass')->nullable();       // optional quick check (computed or saved)
    $table->date('date_submitted')->nullable();

    $table->timestamps();
    $table->index(['enrollment_id','date_submitted']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
