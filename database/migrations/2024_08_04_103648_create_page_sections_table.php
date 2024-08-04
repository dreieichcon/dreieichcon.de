<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('page_sections', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid('page_id');
            $table->uuid('section_id');
            $table->integer('order');
            $table->timestamps();


            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
