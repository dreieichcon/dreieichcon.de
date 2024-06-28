<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->string('name');
            $table->uuid('target_internal')->nullable();
            $table->string('target_external')->nullable();
            $table->string('target_special')->nullable();
            $table->uuid('parent_id')->nullable();
            $table->boolean('enabled')->default(true);
            $table->integer("sort");
            $table->uuid('user_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navigations');
    }
};
