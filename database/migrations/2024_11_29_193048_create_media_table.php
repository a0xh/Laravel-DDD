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
        Schema::create('media', function (Blueprint $table): void {
            $table->uuid(column: 'id')->primary()->unique();
            $table->uuid('model_id');
            $table->string('model_type');
            $table->string('file');
            $table->string('collection');
            $table->timestamps();
        });

        Schema::table('media', function (Blueprint $table): void {
            $table->index(['model_id', 'model_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
