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
        Schema::table('users', function (Blueprint $table) {
            $table->string('otp')->nullable();
            $table->string('mobile')->nullable();
            $table->string('full_name')->nullable();
            $table->string('national_id')->nullable();
            $table->string('number_of_motorcycles')->default(0);
            $table->string('receipt')->nullable();
            $table->string('otp_validation')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Users', function (Blueprint $table) {
            //
        });
    }
};
