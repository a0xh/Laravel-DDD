<?php declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'media',
            callback: function (Blueprint $table): void {
                $table->comment(comment: 'Медиа');

                $table->string(column: 'entity_type')->index();
                $table->uuid(column: 'entity_id')->index();
                $table->string(column: 'file');
                $table->timestampsTz(precision: 0);

                $table->index(columns: ['created_at']);
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'media');
    }
};
