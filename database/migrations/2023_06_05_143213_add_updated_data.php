<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            DB::statement('ALTER TABLE password_reset_tokens DROP PRIMARY KEY');
            $table->timestamp('updated_at', 0)->nullable();
            $table->string('status')->after('token')->default('in-active');
            $table->id()->first();
            // $table->string('email')->primary()->first();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });
    }
};
