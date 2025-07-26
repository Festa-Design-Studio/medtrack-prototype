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
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('blood_pressure')->nullable(); // e.g., "120/80"
            $table->integer('blood_sugar')->nullable(); // mg/dL
            $table->decimal('weight', 5, 2)->nullable(); // In pounds (lbs)
            $table->string('mood')->nullable(); // Optional emoji or text
            $table->text('note')->nullable();
            $table->datetime('recorded_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitals');
    }
};
