<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->uuid('user_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
