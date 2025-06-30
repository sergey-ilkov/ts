<?php

use App\Models\Plan;
use App\Models\User;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->unique()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Plan::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            // $table->timestamp('starts_at');
            // $table->timestamp('ends_at');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};