<?php

use App\Models\Hunt;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hunters', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phone')->nullable();
            $table->string('statut')->default('on');
            $table->timestamps();
            //Foreign Keys
            $table-> foreignIdFor(User::class);
            $table -> foreignIdFor(Hunt::class)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hunters');
    }
};
