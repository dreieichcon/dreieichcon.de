<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('biography_categories', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid('biography_id');
            $table->uuid('category_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biography_categories');
    }
};
