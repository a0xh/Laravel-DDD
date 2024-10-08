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
        Schema::create('roles', function (Blueprint $table) {
            $table->uuid(column: 'id')->primary();
            $table->string('name', 44);
            $table->string('slug', 65)->unique();
            $table->string('description', 65);
            $table->timestamps(precision: 0);
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->comment('Роли');
            $table->index(columns: 'created_at');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
