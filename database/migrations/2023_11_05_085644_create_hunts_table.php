<?php

use App\Models\Hunter;
use App\Models\Society;
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
        Schema::create('hunts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('title');
            $table->string('description');
            $table->string('statut')->default('on');
            $table->timestamps();

            //Foreign key
            $table-> foreignIdFor(Hunter::class)->nullable()->constrained()->cascadeOnDelete();
            $table-> foreignIdFor(Society::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hunts');
    }
};
