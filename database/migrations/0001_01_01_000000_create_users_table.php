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
        Schema::create(table: 'users',
            callback: function (Blueprint $table): void {
                $table->comment(comment: 'Пользователи');
                $table->uuid(column: 'id')->primary()->unique();

                $table->string(column: 'first_name', length: 18);
                $table->string(column: 'last_name', length: 17);
                $table->string(column: 'patronymic', length: 19)->nullable();
                $table->string(column: 'phone', length: 20)->unique()->nullable();
                $table->string(column: 'email', length: 255)->unique();
                $table->timestamp(
                    column: 'email_verified_at', precision: 0)->nullable();
                $table->string(column: 'password', length: 255);
                $table->boolean(column: 'is_active')->default(mixed: true);
                $table->rememberToken();

                $table->timestampsTz(precision: 0);
                $table->index(columns: 'created_at');
            }
        );

        Schema::create(table: 'password_reset_tokens',
            callback: function (Blueprint $table): void {
                $table->string(column: 'email')->primary();
                $table->string(column: 'token');
                $table->timestamp(column: 'created_at', precision: 0)->nullable();
            }
        );

        Schema::create(table: 'sessions',
            callback: function (Blueprint $table): void {
                $table->string(column: 'id')->primary();

                $table->foreignUuid('user_id')->nullable()->index();
                $table->string(column: 'ip_address', length: 45)->nullable();
                $table->text(column: 'user_agent')->nullable();
                $table->longText(column: 'payload');

                $table->integer(
                    column: 'last_activity', autoIncrement: false, unsigned: true
                )->index();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'users');
        Schema::dropIfExists(table: 'password_reset_tokens');
        Schema::dropIfExists(table: 'sessions');
    }
};
