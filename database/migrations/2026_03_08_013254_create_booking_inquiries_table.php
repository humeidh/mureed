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
        Schema::create('booking_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();
            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedTinyInteger('adults')->default(1);
            $table->unsignedTinyInteger('children')->default(0);
            $table->text('special_requests')->nullable();
            $table->enum('status', ['new', 'contacted', 'confirmed', 'cancelled'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_inquiries');
    }
};
