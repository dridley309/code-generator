<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    public function up(): void
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->boolean('allocated')->default(false);
            $table->timestamps();
        });

        Schema::table('codes', function (Blueprint $table) {
            $table->unique('value');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('codes');
    }
};
