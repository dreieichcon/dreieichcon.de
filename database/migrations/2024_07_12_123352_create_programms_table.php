<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('programms', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid("event_id");
            $table->string('title');
            $table->string('description_short');
            $table->longText('description_long');
            $table->dateTime('start');
            $table->unsignedInteger('duration');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programms');
    }
};
