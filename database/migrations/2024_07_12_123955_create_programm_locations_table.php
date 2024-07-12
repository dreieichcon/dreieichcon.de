<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('programm_locations', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid('programm_id');
            $table->uuid('location_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programm_locations');
    }
};
