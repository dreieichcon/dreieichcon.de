<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('programms', function (Blueprint $table) {
            $table->datetime('end')->nullable();
            $table->unsignedInteger('duration')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('programms', function (Blueprint $table) {
            //
        });
    }
};
