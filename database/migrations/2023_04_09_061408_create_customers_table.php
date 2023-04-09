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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->index();
            $table->string('email')->index();
            $table->string('ic_no')->index();
            $table->date('date_of_birth')->index();
            $table->unsignedInteger('age')->default(0)->index();
            $table->char('mobile_no')->index()->nullable();
            $table->char('phone_no')->index()->nullable();
            $table->char('state')->index()->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
