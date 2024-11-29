<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends  Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('job_title');
            $table->string('job_location')->nullable();
            $table->set('job_type', ['onsite', 'hybrid', 'remote']);
            $table->set('employment_type', ['full-time', 'part-time', 'temporary', 'contract']);
            $table->date('open_date')->nullable();
            $table->text('description')->nullable(); //This will contain detailed description in HTML format
            $table->text('requirements')->nullable();
            $table->text('responsibilities')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
