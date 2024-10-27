<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('biography_images', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid('biography_id');
            $table->boolean("is_primary")->default(false);
            $table->string('original_file_name');
            $table->string('file_name');
            $table->string('alt');
            $table->string('copyright')->nullable();
            $table->timestamps();

            $table->foreign('biography_id')->references('id')->on('biographies');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biography_images');
    }
};
