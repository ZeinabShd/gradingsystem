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
    Schema::create('enrollment', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained()->cascadeOnDelete();
        $table->foreignId('subject_id')->constrained()->cascadeOnDelete();
        $table->enum('progress', ['enrolled','in_progress','passed','failed','incomplete', 'passed_equiv', 'pending', 'dropped'])->default('enrolled');
        $table->text('notes')->nullable();
        $table->date('date_success')->nullable(); // set when status becomes 'passed'
        $table->timestamps();

        $table->unique(['student_id','subject_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment');
    }
};
