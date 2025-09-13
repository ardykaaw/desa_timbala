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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('request_number')->unique();
            $table->string('full_name');
            $table->string('nik', 16);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->text('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('job')->nullable();
            $table->text('purpose')->nullable();
            $table->text('additional_info')->nullable();
            $table->json('attachments')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
