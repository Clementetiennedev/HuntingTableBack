<?php

use App\Models\Hunt;
use App\Models\Specie;
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
        Schema::create('kills', function (Blueprint $table) {
            $table->id();
            $table -> integer('number');
            $table->timestamps();
            //Foreign key
            $table->foreignIdFor(Hunt::class);
            $table-> foreignIdFor(Specie::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kills');
    }
};
