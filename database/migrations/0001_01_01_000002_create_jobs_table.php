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
        Schema::create(table: 'jobs', callback: function (Blueprint $table): void {
            $table->uuid(column: 'id')->primary()->unique();
            $table->string(column: 'queue')->index();
            $table->longText(column: 'payload');
            $table->unsignedTinyInteger(column: 'attempts', autoIncrement: false);
            $table->unsignedInteger(column: 'reserved_at', autoIncrement: false)->nullable();
            $table->unsignedInteger(column: 'available_at', autoIncrement: false);
            $table->unsignedInteger(column: 'created_at', autoIncrement: false);
        });

        Schema::create(table: 'job_batches', callback: function (Blueprint $table): void {
            $table->string(column: 'id')->primary();
            $table->string(column: 'name');
            $table->integer(column: 'total_jobs', autoIncrement: false, unsigned: true);
            $table->integer(column: 'pending_jobs', autoIncrement: false, unsigned: true);
            $table->integer(column: 'failed_jobs', autoIncrement: false, unsigned: true);
            $table->longText(column: 'failed_job_ids');
            $table->mediumText(column: 'options')->nullable();
            $table->integer(column: 'cancelled_at', autoIncrement: false, unsigned: true)->nullable();
            $table->integer(column: 'created_at', autoIncrement: false, unsigned: true);
            $table->integer(column: 'finished_at', autoIncrement: false, unsigned: true)->nullable();
        });

        Schema::create(table: 'failed_jobs', callback: function (Blueprint $table): void {
            $table->uuid(column: 'id')->primary()->unique();
            $table->string(column: 'uuid')->unique();
            $table->text(column: 'connection');
            $table->text(column: 'queue');
            $table->longText(column: 'payload');
            $table->longText(column: 'exception');
            $table->timestamp(column: 'failed_at', precision: 0)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'jobs');
        Schema::dropIfExists(table: 'job_batches');
        Schema::dropIfExists(table: 'failed_jobs');
    }
};
