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
        Schema::create(table: 'stored_events',
            callback: function (Blueprint $table): void {
                $table->comment(comment: 'Хранилище событий');
                $table->uuid(column: 'id')->primary()->unique();

                $table->string(column: 'class')->index();
                $table->uuid(column: 'uuid')->index();
                $table->string(column: 'type');
                $table->json(column: 'data');

                $table->foreignUuid(column: 'user_id')->constrained(
                    table: 'users'
                )->onDelete(action: 'cascade');

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
        Schema::dropIfExists(table: 'stored_events');
    }
};
