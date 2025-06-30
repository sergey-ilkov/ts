<?php

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
        Schema::create('secrets', function (Blueprint $table) {
            $table->id();

            // $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->text('text');
            $table->string('key')->unique();
            $table->string('hash');
            $table->string('passphrase')->nullable();
            $table->string('email_notification')->nullable();
            $table->integer('ttl');
            $table->timestamp('deleted_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secrets');
    }
};
