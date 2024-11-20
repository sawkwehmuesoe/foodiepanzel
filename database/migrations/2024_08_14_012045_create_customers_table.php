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
            Schema::create('customers', function (Blueprint $table) {
                $table->id();
                $table->string('accountid')->unique();
                $table->string('firstname');
                $table->string('lastname');
                $table->string('slug');
                $table->string('email');
                $table->text('remark')->nullable();
                $table->text('address')->nullable();
                $table->unsignedBigInteger('status_id')->default(1);
                $table->unsignedBigInteger('user_id');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
