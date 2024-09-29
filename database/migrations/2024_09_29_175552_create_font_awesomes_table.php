<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('font_awesomes', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->string('class');
            $table->string('name');
            $table->string('category');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('font_awesomes');
    }
};
