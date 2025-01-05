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
        Schema::create(table: 'role_user',
            callback: function (Blueprint $table) {
                $table->foreignUuid(
                    column: 'user_id'
                )->constrained(
                    table: 'users'
                )->onDelete(
                    action: 'cascade'
                );

                $table->foreignUuid(
                    column: 'role_id'
                )->constrained(
                    table: 'roles'
                )->onDelete(
                    action: 'cascade'
                );
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'role_user');
    }
};
