<?php declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'pgsql';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'personal_access_tokens',
            callback: function (Blueprint $table): void {
                $table->comment(comment: 'Токены Sanctum');
                $table->uuid(column: 'id')->primary()->unique();

                $table->uuidMorphs(name: 'tokenable');
                $table->string(column: 'name');
                $table->string(column: 'token', length: 64)->unique();
                $table->text(column: 'abilities')->nullable();
                $table->timestamp(column: 'last_used_at')->nullable();
                $table->timestamp(column: 'expires_at')->nullable();

                $table->timestamps(precision: 0);
                $table->index(columns: 'created_at');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'personal_access_tokens');
    }
};
