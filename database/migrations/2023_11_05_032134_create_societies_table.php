<?php

use App\Models\Federation;
use App\Models\User;
use App\Models\Hunt;
use App\Models\Season;
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
        Schema::create('societies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('statut')->default('on');
            $table->timestamps();

            //Foreign key
            $table->foreignIdFor(Federation::class);
            $table-> foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table-> foreignIdFor(Season::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('societies');
    }
};
