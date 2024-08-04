<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('section_images', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->string('section_id');
            $table->string('original_file_name');
            $table->string('file_name');
            $table->string('alt');
            $table->string('copyright')->nullable();
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section_images');
    }
};
